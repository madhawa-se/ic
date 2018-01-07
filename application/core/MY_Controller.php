<?php

class MY_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

}

class Crud_Controller extends MY_Controller {

    protected $table_name = '';
    protected $primary_key = '';
    protected $display_column = '';
    protected $model_name = '';
    protected $column_names = [];
    protected $controller_name = '';

    function __construct() {
        parent::__construct();
        $this->model_name = (!empty($this->model_name)) ? $this->model_name : "Model_{$this->table_name}";
        $this->controller_name = $this->router->fetch_class();
    }

    public function Index() {
        $this->preview();
    }

    function loadForm($form, $view_mode) {
        
    }

    function loadMasterTemplate($form, $data = NULL) {
        $this->load->view('admin/inc/header');
        $this->load->view('admin/templates/preview_form_wrapper', array("form" => $this->load->view($form, $data, TRUE)));
        $this->load->view('admin/inc/footer');
    }

    //crud functions

    function PreviewTable($data_set, $view) {
        $data['table_name'] = $this->table_name;
        $data['primary_key'] = $this->primary_key;
        $data['column_names'] = $this->column_names;
        $data['data_set'] = $data_set;
        $data['controller_name'] = $this->router->fetch_class();
        //$data['column_names']=$column_names;
        $this->loadMasterTemplate($view, $data);
    }

    function genarateTable() {
        
    }

    ////crud

    function preview() {
        $this->load->model($this->model_name);
        $data_set = $this->{$this->model_name}->get_all();
        $this->PreviewTable($data_set, $this->primary_key);
    }

    function edit_row($view, $id, $data = NULL) {
        $this->load->model($this->model_name);
        $table_data = $this->{$this->model_name}->get($id);
        $data['table_data'] = $table_data;
        $data['primary_key'] = $id;
        $this->loadMasterTemplate($view, $data);
    }

    public function update_row($view, $rules, $msg = NULL) {
        if (!empty($_POST)) {
            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() == FALSE) {
                $this->load->view($view);
            } else {
                $update_data = array();
                $id = $this->input->post($this->primary_key);
                foreach ($this->column_names as $column) {
                    $update_data[$column] = $this->input->post($column);
                }

                $this->load->model($this->model_name);
                $res = $this->{$this->model_name}->update($update_data, $id);
                echo $this->db->last_query();
                if ($res == true) {
                    $this->session->set_flashdata('success', "Successfully updated {$this->table_name}!");
                    redirect($this->controller_name);
                } else {
                    $this->session->set_flashdata('error', "Unable to update {$this->table_name} , Please check");
                    $this->load->view($this->controller_name);
                }
            }
        } else {
            redirect($this->controller_name);
        }
    }

//    function add($rules) {
//
//        if (!empty($_POST)) {
//            $this->form_validation->set_rules($rules);
//            if ($this->form_validation->run() == FALSE) {
//                $this->load->view("admin/add_{$this->table_name}x", $data);
//            } else {
//                $insert_data = array();
//                foreach ($this->column_names as $column) {
//                    $insert_data[$column] = $this->input->post($column);
//                }
//                $this->load->model($this->model_name);
//                $res = $this->{$this->model_name}->add($insert_data);
//                if ($res == true) {
//                    $this->session->set_flashdata('success', "Successfully added Country!");
//                    redirect('Country');
//                } else {
//                    $this->session->set_flashdata('error', "Unable to add Country, Please check");
//                    redirect('Country/addCountry');
//                }
//            }
//        } else {
//            $this->load->view("admin/add{$this->table_name}x", $data);
//        }
//    }


    function add_row($view, $rules, $data = NULL, $ajax = FALSE) {

        $data['ajax'] = $ajax;
        if (!empty($_POST)) {
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == FALSE) {
                ($ajax) ? $this->load->view($view, $data) : $this->loadMasterTemplate($view, $data);
            } else {
                $insert_data = array();
                foreach ($this->column_names as $column) {
                    $insert_data[$column] = $this->input->post($column);
                }
                $this->load->model($this->model_name);
                $res = $this->{$this->model_name}->insert($insert_data);
                $status = $this->db->affected_rows() > 0;
                $msg_success = "Successfully added {$this->table_name}!";
                $msg_fail = "Unable to add {$this->table_name}, Please check";

                if ($ajax) {
                    if ($status === true) {
                        $this->ajax_return(true, $res, $msg_success);
                    } else {
                        $this->ajax_return(false, '', $msg_fail);
                    }
                } else {
                    if ($status === true) {
                        $this->session->set_flashdata('success', $msg_success);
                        redirect($this->controller_name);
                    } else {
                        $this->session->set_flashdata('error', $msg_fail);
                        redirect("{$this->controller_name}/add");
                    }
                }
            }
        } else {
            ($ajax) ? $this->load->view($view, $data) : $this->loadMasterTemplate($view, $data);
        }
    }

    function delete_row($id) {
        $this->load->model($this->model_name);

        $result = $this->{$this->model_name}->delete($id);
        if ($result === true) {
            $this->session->set_flashdata('success', "Successfully deleted {$this->table_name}!");
        } else {
            $this->session->set_flashdata('error', "Unable to delete {$this->table_name} Please check");
            //$this->load->view('admin/country');
        }
        redirect($this->controller_name);
    }

    protected function get_add_data() {
        
    }

    protected function ajax_return($status, $insert_id, $msg) {
        $data=array("status"=>$status,"msg"=>$msg);
        if($status) {
            $this->load->model($this->model_name);
            $column_data = $this->{$this->model_name}->get_all();
            $options = array();
            foreach ($column_data as $column) {
                $options[$column->{$this->primary_key}] = $column->{$this->display_column};
            }
            $dropdown = form_dropdown('new', $options, $insert_id);
            $data['dropdown']=$dropdown;
        }
        $this->serve_json($data);
    }

    private function serve_json($data) {
        $json_data=json_encode($data);
        header('Content-Type: application/json');
        echo $json_data;
        
    }

}
