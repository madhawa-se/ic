<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Asset extends Crud_Controller {

    protected $table_name = 'assets';
    protected $model_name = 'asset';
    protected $primary_key = 'id';
    protected $column_names = ['asset_id', 'hostname', 'serial_number', 'manufacturer', 'model_name', 'branch_name', 'asset_type'];

    public function Index() {
        $this->load->model('Model_asset');
        $data_set = $this->Model_asset->get_all(array(
            'select' => 'assets.id,assets.asset_id,hostname,serial_number,assets.manufacturer,model_name,branch_name,asset_type.asset_type,country.country,dept_name,license_name',
            'join' => array(
                array(
                    'table' => 'model',
                    'condition' => 'assets.model_number=model.model_id'
                ),
                array(
                    'table' => 'locations',
                    'condition' => 'locations.branch_id=assets.location'
                ),
                array(
                    'table' => 'asset_type',
                    'condition' => 'asset_type.asset_type_id=assets.asset_type'
                ),
                array(
                    'table' => 'country',
                    'condition' => 'country.country_id=locations.country'
                ),
                array(
                    'table' => 'department',
                    'condition' => 'department.dept_id=assets.department'
                ),
                array(
                    'table' => 'license_registry',
                    'condition' => 'license_registry.asset_id = assets.asset_id'
                ),
                array(
                    'table' => 'licenses',
                    'condition' => 'licenses.license_id = license_registry.license_id'
                ),
            )
        ));
        $this->PreviewTable($data_set, 'admin/assets_preview');
    }

    public function edit($id) {
        $this->load->model('Model_location');
        $data = array();
        $data['location_list'] = $this->Model_location->get_all();
        parent::edit_row('admin/department_edit', $id, $data);
    }

    public function add($ajax = FALSE) {
        //$view,$rules,$msg
        $rules = array(
            array('field' => 'dept_id', 'label' => 'Department ID', 'rules' => 'required'),
            array('field' => 'dept_name', 'label' => 'Department Name', 'rules' => 'required'),
            array('field' => 'location', 'label' => 'Country', 'rules' => 'required')
        );
        $data = array();
        $this->load->model('Model_location');
        $data['location_list'] = $this->Model_location->get_all();
        parent::add_row('admin/department_add', $rules, $data, $ajax);
    }

    public function update() {
        $rules = array(
            array('field' => 'dept_id', 'label' => 'Department ID', 'rules' => 'required'),
            array('field' => 'dept_name', 'label' => 'Department Name', 'rules' => 'required'),
            array('field' => 'location', 'label' => 'Country', 'rules' => 'required')
        );
        parent::update_row('admin/department_edit', $rules);
    }

    public function delete($id) {
        parent::delete_row($id);
    }

    public function preview() {

        $this->load->model('Model_asset');
        $data_set = $this->Model_asset->get_all(array(
            'select' => 'assets.id,assets.asset_id,hostname,serial_number,assets.manufacturer,model_name,branch_name,asset_type.asset_type,country.country,dept_name,license_name,serial_number,sap_asset_id,assigned_to,assigned_date,ip_address,mac_address,supplier,purchase_date,managed_by,asset_lifetime,last_modified_date,last_modified_user,notes,warranty_expiry_date',
            'join' => array(
                array(
                    'table' => 'model',
                    'condition' => 'assets.model_number=model.model_id'
                ),
                array(
                    'table' => 'locations',
                    'condition' => 'locations.branch_id=assets.location'
                ),
                array(
                    'table' => 'asset_type',
                    'condition' => 'asset_type.asset_type_id=assets.asset_type'
                ),
                array(
                    'table' => 'country',
                    'condition' => 'country.country_id=locations.country'
                ),
                array(
                    'table' => 'department',
                    'condition' => 'department.dept_id=assets.department'
                ),
                array(
                    'table' => 'license_registry',
                    'condition' => 'license_registry.asset_id = assets.asset_id'
                ),
                array(
                    'table' => 'licenses',
                    'condition' => 'licenses.license_id = license_registry.license_id'
                ),
            )
        ));
        //echo $this->db->last_query();
        $this->PreviewTable($data_set, 'admin/asset_list');
    }

}
