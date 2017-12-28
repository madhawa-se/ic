<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Xuser extends Crud_Controller {
    protected $table_name = 'users';
    protected $primary_key = 'user_id';
    protected $column_names=['firstname','lastname','email','username','user_role'];
    
    public function Index() {
      $this->load->model('Model_userx');
      $data_set=$this->Model_userx->get_all();
      $this->PreviewTable($data_set,$this->primary_key);
    }
}