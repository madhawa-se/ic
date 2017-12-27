<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index(){
       $error['error']='';
    //logged by admin
          if($this->session->userdata('is_logged_in') and $this->session->userdata('level')==admin ){
            redirect('admin/dashboard');
          }
      //log by user
          elseif ($this->session->userdata('is_logged_in') and $this->session->userdata('level')==admin) {
            redirect('user/dashboard');
          }
          else{
            $this->load->view('login',$error);
          }
      }

      public function dashboard(){
          if($this->session->userdata('is_logged_in') and $this->session->userdata('level')=='admin' ){
            $this->load->view('admin/index');
          }
          elseif ($this->session->userdata('is_logged_in') and $this->session->userdata('level')=='user') {
            redirect('User/dashboard');
          }
          else{
            $error['error']="You do not have permission and please complete sername & password";
            $this->load->view('login',$error);
          }
      }


      function userListing()
      {
        $config = array();
        $config["base_url"] = base_url() . "admin/userListing";
        $this->load->model('model_user');
        $total_row = $this->model_user->record_count();
        $config["total_rows"] = $total_row;
        $config["per_page"] = 5;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = $total_row;
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        if($this->uri->segment(3)){
        $page = ($this->uri->segment(3)) ;
        }
        else{
        $page = 1;
        }
        $data["userRecords"] = $this->model_user->userListing($config["per_page"], $page);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );

        // View data according to array.
        $this->load->view("admin/userlisting", $data);
        }



      function addNewuser()
      {
         if (!empty($_POST)) {
              $firstname=$this->input->post("fname");
              $lastname=$this->input->post("lname");
              $email=$this->input->post("email");
              $username=$this->input->post("uname");
              $password=md5($this->input->post("pname"));
              $user_role=$this->input->post("user_role");

              $insert_data = array(
                  'firstname'=>$firstname,
                  'lastname'=>$lastname,
                  'email'=>$email,
                  'username'=>$username,
                  'password'=>$password,
                  'user_role'=>$user_role
                );

              $this->load->model('model_user');
              $res = $this->model_user->userAdd($insert_data);
              if($res==true){
                $this->session->set_flashdata('success', "Successfully added user!");
                redirect('admin/userListing');
              }else{
                $this->session->set_flashdata('error', "Unable to add user Please check");
                $this->load->view('admin/userListing');
                redirect('admin/userListing');
              }

          }
          else{
          $this->load->view('admin/adduser');
          }
        }




        function userDelete($user_id){

          $id=$this->uri->segment(3);
          $this->load->model('model_user');
          $result=$this->model_user->userDelete($user_id);
          if($result==true){
            $this->session->set_flashdata('success', "Successfully deleted  user!");
            redirect('admin/userListing');
          }else{
            $this->session->set_flashdata('error', "Unable to delete user Please check");
            $this->load->view('admin/userListing');
            redirect('admin/userListing');
          }
        }

        function edit(){
          $id=$this->uri->segment(3);
          $this->load->model('model_user');
          $row = $this->model_user->userEdit($id);
          $data['users'] = $row;
          $this->load->view('admin/edituser',$data);
        }

        function userUpdate(){
        //  $id=$this->uri->segment(3);
          if (!empty($_POST)) {
               $firstname=$this->input->post("fname");
               $lastname=$this->input->post("lname");
               $email=$this->input->post("email");
               $username=$this->input->post("uname");
               $password=md5($this->input->post("pname"));
               $user_role=$this->input->post("user_role");
               $user_id=$this->input->post("user_id");
               if(empty($password))
               {
                 $update_data = array(
                      'user_id'=>$user_id,
                     'firstname'=>$firstname,
                     'lastname'=>$lastname,
                     'email'=>$email,
                     'username'=>$username,

                     'user_role'=>$user_role
                   );
               }else{
                 $update_data = array(
                      'user_id'=>$user_id,
                     'firstname'=>$firstname,
                     'lastname'=>$lastname,
                     'email'=>$email,
                     'username'=>$username,
                     'password'=>$password,
                     'user_role'=>$user_role
                   );

               }



               $this->load->model('model_user');
               $res = $this->model_user->userUpdate($update_data);
               if($res==true){
                 $this->session->set_flashdata('success', "Successfully updated!");
                 redirect('admin/userListing');
               }else{
                 $this->session->set_flashdata('error', "Unable to update  user Please check");
                 $this->load->view('admin/userListing');
                 redirect('admin/userListing');
               }

           }
        }

}
