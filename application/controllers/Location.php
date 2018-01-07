<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends Crud_Controller {

    protected $table_name = 'locations';
    protected $model_name = 'Model_location';
    protected $primary_key = 'id';
    protected $column_names = ['branch_id','branch_name','address' ,'country'];

    public function Index() {
         $this->load->model('Model_location');
        $data_set = $this->Model_location->get_all(array(
            'select' => 'locations.id,branch_id,branch_name,address,country.country',
            'join' => array(
                array(
                    'table' => 'country',
                    'condition' => 'locations.country=country.id'
                )
            )
        ));
        $this->PreviewTable($data_set, 'admin/location_preview');
    }

    public function edit($id) {
        $this->load->model('Model_country');
        $data=array();
        $data['country_list'] = $this->Model_country->get_all();
        parent::edit_row('admin/location_edit', $id,$data);
    }

    public function add($ajax=FALSE) {
        //$view,$rules,$msg
        $rules = array(
            array('field' => 'branch_id', 'label' => 'Branch ID', 'rules' => 'required'),
            array('field' => 'branch_name', 'label' => 'Branch Name', 'rules' => 'required'),
            array('field' => 'address', 'label' => 'Address', 'rules' => 'required'),
            array('field' => 'country', 'label' => 'Country', 'rules' => 'required')
        );
        $data=array();
        $this->load->model('Model_country');
        $data['country_list'] = $this->Model_country->get_all();
        parent::add_row('admin/location_add', $rules,$data,$ajax);
    }

    public function update() {
        $rules = array(
            array('field' => 'country_id', 'label' => 'Country ID', 'rules' => 'required'),
            array('field' => 'country', 'label' => 'Country', 'rules' => 'required')
        );
        parent::update_row('admin/country_edit', $rules);
    }

    public function delete($id) {
        parent::delete_row($id);
    }

}
