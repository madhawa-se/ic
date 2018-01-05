<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends Crud_Controller {

    protected $table_name = 'model';
    protected $primary_key = 'id';
    protected $column_names = ['model_id', 'model_name'];

    public function Index() {
        $this->load->model('Model_model');
        $data_set = $this->Model_model->get_all();
        $this->PreviewTable($data_set, 'admin/model_preview');
    }

    public function edit($id) {
        parent::edit_row('admin/model_edit', $id);
    }

    public function add() {
        //$view,$rules,$msg
        $rules = array(
            array('field' => 'model_id', 'label' => 'Model ID', 'rules' => 'required'),
            array('field' => 'model_name', 'label' => 'Model name', 'rules' => 'required')
        );
        parent::add_row('admin/model_add', $rules);
    }

    public function update() {
        $rules = array(
            array('field' => 'model_id', 'label' => 'Model ID', 'rules' => 'required'),
            array('field' => 'model_name', 'label' => 'Model name', 'rules' => 'required')
        );
        parent::update_row('admin/model_edit', $rules);
    }

    public function delete($id) {
        parent::delete_row($id);
    }

}
