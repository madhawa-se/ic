<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Country extends Crud_Controller {

    protected $table_name = 'country';
    protected $primary_key = 'id';
    protected $display_column='country';
    protected $column_names = ['country_id', 'country'];

    public function Index() {
        $this->load->model('Model_country');
        $data_set = $this->Model_country->get_all();
        $this->PreviewTable($data_set, 'admin/country_preview');
    }

    public function edit($id) {
//        //reduce plz
//        $this->load->model('Model_xlocation');
//        $this->load->model('Model_xcountry');
//        $location = $this->Model_locationx->get($id);
//        $country = $this->Model_countryx->getAll();
//        $data['location'] = $location;
//        $data['country'] = $country;
//        $this->load->view('admin/editlocation', $data);
        parent::edit_row('admin/country_edit', $id);
    }

    public function add($ajax=false) {
        //$view,$rules,$msg
        $rules = array(
            array('field' => 'country_id', 'label' => 'Country ID', 'rules' => 'required'),
            array('field' => 'country', 'label' => 'Country', 'rules' => 'required')
        );
        parent::add_row('admin/country_add', $rules,'',$ajax);
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
