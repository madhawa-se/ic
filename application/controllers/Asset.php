<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Asset extends Crud_Controller {

    protected $table_name = 'assets';
    protected $model_name = 'Model_asset';
    protected $primary_key = 'id';
    protected $column_names = ['asset_id', 'manufacturer', 'hostname', 'serial_number', 'sap_asset_id', 'model_number', 'asset_type', 'locations', 'department', 'assigned_to', 'assigned_date', 'notes', 'ip_address', 'mac_address', 'suppliers', 'purchase_date', 'warranty_expiry_date', 'managed_by', 'asset_lifetime', 'last_modified_date', 'last_modified_user'];

    public function Index() {
        $this->load->model('Model_asset');
        $data_set = $this->Model_asset->get_all(array(
            'select' => 'assets.id,assets.asset_id,hostname,serial_number,assets.manufacturer,model_name,branch_name,asset_type.asset_type,country.country,dept_name,license_name',
            'join' => array(
                array(
                    'table' => 'manufacturer',
                    'condition' => 'assets.manufacturer=manufacturer.id'
                ),
                array(
                    'table' => 'model',
                    'condition' => 'assets.model_number=model.id'
                ),
                array(
                    'table' => 'department',
                    'condition' => 'assets.managed_by = department.id'
                ),
                array(
                    'table' => 'employee',
                    'condition' => 'assets.assigned_to=employee.id'
                ),
                array(
                    'table' => 'asset_type',
                    'condition' => 'assets.asset_type=asset_type.id'
                ),
                array(
                    'table' => 'suppliers',
                    'condition' => 'assets.suppliers=suppliers.id'
                ),
                array(
                    'table' => 'locations',
                    'condition' => 'assets.locations = locations.id'
                ),
                array(
                    'table' => 'country',
                    'condition' => 'locations.country = country.id'
                ),
                array(
                    'table' => 'license_registry',
                    'condition' => 'license_registry.asset_id = assets.id'
                ),
                array(
                    'table' => 'licenses',
                    'condition' => 'license_registry.license_id = licenses.id'
                ),
            )
        ));
        $this->PreviewTable($data_set, 'admin/assets_preview');
       // echo $this->db->last_query();
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
            array('field' => 'manufacturer', 'label' => 'Department ID', 'rules' => 'required'),
            array('field' => 'hostname', 'label' => 'hostname', 'rules' => 'required'),
        );
        $data = array();
        $this->load->model('Model_manufacturer');
        $this->load->model('Model_model');
        $this->load->model('Model_department');
        $this->load->model('Model_employee');
        $this->load->model('Model_license');
        $this->load->model('Model_suppliers');
        $this->load->model('Model_location');
        $this->load->model('Model_asset_type');

        $data['location_list'] = $this->Model_location->get_all();
        $data['model_list'] = $this->Model_model->get_all();
        $data['department_list'] = $this->Model_department->get_all();
        $data['employee_list'] = $this->Model_employee->get_all();
        $data['license_list'] = $this->Model_license->get_all();
        $data['supplier_list'] = $this->Model_suppliers->get_all();
        $data['manufacturer_list'] = $this->Model_manufacturer->get_all();
        $data['asset_type_list'] = $this->Model_asset_type->get_all();

        $insert_id = parent::add_row_x('admin/asset_add', $rules, $data, $ajax);
        if ($insert_id) {
            $licenses = $this->input->post('licenses');
            $this->load->model('Model_asset');
            $this->Model_asset->insert_x($insert_id, $licenses);
        }
        //echo $this->db->last_query();
    }

    public function update() {
        $rules = array(
            array('field' => 'manufacturer', 'label' => 'Department ID', 'rules' => 'required'),
            array('field' => 'hostname', 'label' => 'hostname', 'rules' => 'required'),
//            array('field' => 'serial_number', 'label' => 'Country', 'rules' => 'required'),
//            array('field' => 'sap_asset_id', 'label' => 'Country', 'rules' => 'required'),
//            array('field' => 'model_number', 'label' => 'Country', 'rules' => 'required'),
//            array('field' => 'asset_type', 'label' => 'Country', 'rules' => 'required'),
//            array('field' => 'location', 'label' => 'Country', 'rules' => 'required'),
//            array('field' => 'department', 'label' => 'Country', 'rules' => 'required'),
//            array('field' => 'assigned_to', 'label' => 'Country', 'rules' => 'required'),
//            array('field' => 'assigned_date', 'label' => 'Country', 'rules' => 'required'),
//            array('field' => 'notes', 'label' => 'Country', 'rules' => 'required'),
//            array('field' => 'licenses', 'label' => 'Country', 'rules' => 'required'),
//            array('field' => 'ip_address', 'label' => 'Country', 'rules' => 'required'),
//            array('field' => 'secondary_ip_address', 'label' => 'Country', 'rules' => 'required'),
//            array('field' => 'purchase_date', 'label' => 'Country', 'rules' => 'required'),
//            array('field' => 'warranty_expiry_date', 'label' => 'Country', 'rules' => 'required'),
//            array('field' => 'managed_by', 'label' => 'Country', 'rules' => 'required'),
//            array('field' => 'asset_lifetime', 'label' => 'Country', 'rules' => 'required'),
//            array('field' => 'last_modified_date', 'label' => 'Country', 'rules' => 'required'),
        );
        parent::update_row('admin/department_edit', $rules);
    }

    public function delete($id) {
        parent::delete_row($id);
    }

    public function preview($id = null) {

        $this->load->model('Model_asset');
        if (!$id) {
            $data_set = $this->Model_asset->get_all(array(
                'select' => 'assets.id,assets.asset_id,hostname,serial_number,assets.manufacturer,model_name,branch_name,asset_type.asset_type,country.country,dept_name,license_name,serial_number,sap_asset_id,assigned_to,assigned_date,ip_address,mac_address,suppliers,purchase_date,managed_by,asset_lifetime,last_modified_date,last_modified_user,notes,warranty_expiry_date',
                'join' => array(
                    array(
                        'table' => 'model',
                        'condition' => 'assets.model_number=model.model_id'
                    ),
                    array(
                        'table' => 'locations',
                        'condition' => 'locations.branch_id=assets.locations'
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
                 $this->PreviewTable($data_set, 'admin/asset_list');
        } else {
            $data_set = $this->Model_asset->get_all(array(
                'select' => 'assets.id,assets.asset_id,hostname,serial_number,assets.manufacturer,model_name,branch_name,asset_type.asset_type,country.country,dept_name,license_name,serial_number,sap_asset_id,assigned_to,assigned_date,ip_address,mac_address,suppliers,purchase_date,managed_by,asset_lifetime,last_modified_date,last_modified_user,notes,warranty_expiry_date',
                'join' => array(
                    array(
                        'table' => 'model',
                        'condition' => 'assets.model_number=model.model_id'
                    ),
                    array(
                        'table' => 'locations',
                        'condition' => 'locations.branch_id=assets.locations'
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
                ),
                'where' => $id,
            ));
        }
        //echo $this->db->last_query();
        $this->PreviewTable($data_set, 'admin/asset_list');
    }

}
