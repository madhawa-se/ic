<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Manufacturer extends Crud_Controller {

    protected $table_name = 'manufacturer';
    protected $primary_key = 'id';
    protected $column_names = ['manu_id', 'manufacturer'];

    public function Index() {
        $this->load->model('Model_manufacturer');
        $data_set = $this->Model_manufacturer->get_all();
        $this->PreviewTable($data_set, 'admin/manufacturer_preview');
    }

    public function edit($id) {
        parent::edit_row('admin/manufacturer_edit', $id);
    }

    public function add() {
        //$view,$rules,$msg
        $rules = array(
            array('field' => 'manu_id', 'label' => 'Manufacturer ID', 'rules' => 'required'),
            array('field' => 'manufacturer', 'label' => 'Manufacturer', 'rules' => 'required')
        );
        parent::add_row('admin/manufacturer_add', $rules);
    }

    public function update() {
        $rules = array(
            array('field' => 'manu_id', 'label' => 'Manufacturer ID', 'rules' => 'required'),
            array('field' => 'manufacturer', 'label' => 'Manufacturer', 'rules' => 'required')
        );
        parent::update_row('admin/manufacturer_edit', $rules);
    }

    public function delete($id) {
        parent::delete_row($id);
    }

}
