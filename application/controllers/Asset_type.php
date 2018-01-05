<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Asset_type extends Crud_Controller {

    protected $table_name = 'asset_type';
    protected $primary_key = 'id';
    protected $column_names = ['asset_type_id', 'asset_type','asset_description'];

    public function Index() {
        $this->load->model('Model_asset_type');
        $data_set = $this->Model_asset_type->get_all();
        $this->PreviewTable($data_set, 'admin/asset_type_preview');
    }

    public function edit($id) {
        parent::edit_row('admin/asset_type_edit', $id);
    }

    public function add() {
        //$view,$rules,$msg
        $rules = array(
            array('field' => 'asset_type_id', 'label' => 'Asset Type ID', 'rules' => 'required'),
            array('field' => 'asset_type', 'label' => 'Asset Type', 'rules' => 'required'),
            array('field' => 'asset_description', 'label' => 'Asset Type Description', 'rules' => 'required')
        );
        parent::add_row('admin/asset_type_add', $rules);
    }

    public function update() {
        $rules = array(
            array('field' => 'asset_type_id', 'label' => 'Asset Type ID', 'rules' => 'required'),
            array('field' => 'asset_type', 'label' => 'Asset Type', 'rules' => 'required'),
            array('field' => 'asset_description', 'label' => 'Asset Type Description', 'rules' => 'required')
        );
        parent::update_row('admin/asset_types_edit', $rules);
    }

    public function delete($id) {
        parent::delete_row($id);
    }

}
