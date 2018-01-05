<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Suppliers extends Crud_Controller {

    protected $table_name = 'suppliers';
    protected $primary_key = 'id';
    protected $column_names = ['supplier_id', 'supplier_name', 'address', 'telephone'];

    public function Index() {
        $this->load->model('Model_suppliers');
        $data_set = $this->Model_suppliers->get_all();
        $this->PreviewTable($data_set, 'admin/suppliers_preview');
    }

    public function edit($id) {
        parent::edit_row('admin/suppliers_edit', $id);
    }

    public function add() {
        //$view,$rules,$msg
        $rules = array(
            array('field' => 'supplier_id', 'label' => 'Supplier ID', 'rules' => 'required'),
            array('field' => 'supplier_name', 'label' => 'Supplier Name', 'rules' => 'required'),
            array('field' => 'address', 'label' => 'Address', 'rules' => 'required'),
            array('field' => 'telephone', 'label' => 'Telephone', 'rules' => 'required')
        );
        parent::add_row('admin/suppliers_add', $rules);
    }

    public function update() {
        $rules = array(
            array('field' => 'supplier_id', 'label' => 'Supplier ID', 'rules' => 'required'),
            array('field' => 'supplier_name', 'label' => 'Supplier Name', 'rules' => 'required'),
            array('field' => 'address', 'label' => 'Address', 'rules' => 'required'),
            array('field' => 'telephone', 'label' => 'Telephone', 'rules' => 'required')
        );
        parent::update_row('admin/suppliers_edit', $rules);
    }

    public function delete($id) {
        parent::delete_row($id);
    }

}
