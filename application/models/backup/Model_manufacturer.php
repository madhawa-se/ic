<?php

class Model_manufacturer extends CI_Model {

    function getManufacturers() {
        $this->db->select('*');
        $query = $this->db->get("manufacturer");
        if ($query->num_rows() > 0) {
            $data=$query->result();
            return $data;
        }
        return false;
    }
}

?>
