<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Xcountry extends Crud_Controller {
    protected $table_name = 'country';
    protected $primary_key = 'id';
    protected $column_names=['country_id','country'];
    
    public function Index() {
      $this->load->model('Model_countryx');
      $data_set=$this->Model_countryx->get_all();
      $this->PreviewTable($data_set,$this->primary_key);
    }
}