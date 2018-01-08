<?php

class Model_asset extends MY_Model {

    protected $table_name = 'assets';
    protected $primary_key = 'id';

    function insert_x($asset_id, $licenses) {

        foreach ($licenses as $license) {
            $data = array(
                'license_id' => $license,
                'asset_id' => $asset_id
            );

            $this->db->insert('license_registry', $data);
        }
    }

}

?>