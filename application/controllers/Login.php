<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function index(){
   $error['error']='';
//logged by admin
  if($this->session->userdata('is_logged_in') and $this->session->userdata('level')==admin ){
    redirect('Admin/dashboard');
  }
  //log by user
  elseif ($this->session->userdata('is_logged_in') and $this->session->userdata('level')==admin) {
    redirect('User/dashboard');
  }
  else{
    $this->load->view('login',$error);
  }
  }

public function log(){
    $this->load->library('form_validation');
    $this->form_validation->set_rules('username','Username','trim|callback_check_user_login');
    $this->form_validation->set_rules('password','Password','trim|md5');
      if($this->form_validation->run()==False){
      $this->index();
      }
      else{

        //level is admin
        if($this->session->userdata('level')=='admin'){
          redirect('Admin/dashboard');
        }
        elseif ($this->session->userdata('level')=='user') {
            redirect('User/dashboard');
        }

      }

  }


  public function check_user_login(){
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $this->load->model('model_user');
      $result=$this->model_user->is_logged_in($username,$password);
  // Correct user name and Password
  if($result){
    foreach($result as $user){
      $data = array();
      $data['is_logged_in']=1;
      $data['id']=$user->user_id;
      $data['firstname']=$user->firstname;
      $data['username']=$user->username;
      $data['password']=$user->password;
      $data['level']=$user->user_role;
      $this->session->set_userdata($data);
    }

  }
  // incoredct user name & pwd
  else{
    $this->form_validation->set_message('check_user_login','Incorrect User name and Password');
    return false;
  }

  }

  public function logout(){
    $this->session->sess_destroy();
    redirect('Login/index');

  }
}
