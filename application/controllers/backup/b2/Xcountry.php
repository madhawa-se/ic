<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Xcountry extends Crud_Controller {

    protected $table_name = 'country';
    protected $primary_key = 'id';
    protected $column_names = ['country_id', 'country'];

    function add($rules) {
        parent::add($rules);
    }

    public function addCountry() {

        $this->load->model('Model_country');
        if ($res == true) {
            $this->session->set_flashdata('success', "Successfully added Country!");
            redirect('Country');
        } else {
            $this->session->set_flashdata('error', "Unable to add Country, Please check");
            redirect('Country/addCountry');
        }
    }

}
