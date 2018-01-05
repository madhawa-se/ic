<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends Crud_Controller {

    protected $table_name = 'employee';
    protected $primary_key = 'id';
    protected $column_names = ['emp_id', 'emp_name'];

    public function Index() {
        $this->load->model('Model_employee');
        $data_set = $this->Model_employee->get_all();
        $this->PreviewTable($data_set, 'admin/employee_preview');
    }

    public function edit($id) {
        parent::edit_row('admin/employee_edit', $id);
    }

    public function add() {
        //$view,$rules,$msg
        $rules = array(
            array('field' => 'emp_id', 'label' => 'Employee ID', 'rules' => 'required'),
            array('field' => 'emp_name', 'label' => 'Employee', 'rules' => 'required')

        );
        parent::add_row('admin/employee_add', $rules);
    }

    public function update() {
        $rules = array(
            array('field' => 'emp_id', 'label' => 'Employee ID', 'rules' => 'required'),
            array('field' => 'emp_name', 'label' => 'Employee', 'rules' => 'required')
        );
        parent::update_row('admin/employee_edit', $rules);
    }

    public function delete($id) {
        parent::delete_row($id);
    }

}
