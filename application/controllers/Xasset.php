<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Xasset extends Crud_Controller {

    protected $table_name = 'assets';
    protected $primary_key = 'assets_id';
    protected $column_names = ['asset_id', 'hostname', 'serial_number', 'manufacturer', 'model_name'];

    public function Index() {
        $this->load->model('Model_assetx');
        $data_set = $this->Model_assetx->get_all(array('select' => 'assets.id,asset_id,hostname,serial_number,manufacturer,model_name', 'table' => 'model', 'condition' => 'assets.model_number=model.model_id'));
        $this->PreviewTable($data_set, $this->primary_key);
    }

}
