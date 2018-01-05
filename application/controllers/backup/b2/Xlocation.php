<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Xlocation extends Crud_Controller {

    protected $table_name = 'locations';
    protected $primary_key = 'branch_id';
    protected $column_names = ['branch_id', 'branch_name', 'address', 'country'];

    public function Index() {
        $this->load->model('Model_locationx');
        $data_set = $this->Model_locationx->get_all(array(
            'select' => 'branch_id,branch_name,address,country.country',
            'join' => array(
                array(
                    'table' => 'country',
                    'condition' => 'locations.country=country.country_id'
                )
            )
        ));
        $this->PreviewTable($data_set, $this->primary_key);
    }

    public function edit($id) {
        //reduce plz
        $this->load->model('Model_xlocation');
        $this->load->model('Model_xcountry');
        $location = $this->Model_locationx->get($id);
        $country = $this->Model_countryx->getAll();
        $data['location'] = $location;
        $data['country'] = $country;
        $this->load->view('admin/editlocation', $data);
    }

}
