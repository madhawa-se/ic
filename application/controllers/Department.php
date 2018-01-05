<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends Crud_Controller {

    protected $table_name = 'department';
    protected $primary_key = 'id';
    protected $column_names = ['dept_id','dept_name','location'];

    public function Index() {
         $this->load->model('Model_department');
        $data_set = $this->Model_department->get_all(array(
            'select' => 'department.id,dept_id,dept_name,locations.branch_name',
            'join' => array(
                array(
                    'table' => 'locations',
                    'condition' => 'department.location=locations.branch_id'
                )
            )
        ));
        $this->PreviewTable($data_set, 'admin/department_preview');
    }

    public function edit($id) {
        $this->load->model('Model_location');
        $data=array();
        $data['location_list'] = $this->Model_location->get_all();
        parent::edit_row('admin/department_edit', $id,$data);
    }

    public function add($ajax=FALSE) {
        //$view,$rules,$msg
        $rules = array(
        array('field' => 'dept_id', 'label' => 'Department ID', 'rules' => 'required'),
            array('field' => 'dept_name', 'label' => 'Department Name', 'rules' => 'required'),
            array('field' => 'location', 'label' => 'Country', 'rules' => 'required')
        );
        $data=array();
        $this->load->model('Model_location');
        $data['location_list'] = $this->Model_location->get_all();
        parent::add_row('admin/department_add', $rules,$data,$ajax);
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

}
