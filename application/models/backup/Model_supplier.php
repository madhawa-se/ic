<?php

class Model_supplier extends CI_Model {

    function getSuppliers() {
        $this->db->select('*');
        $query = $this->db->get("suppliers");
        if ($query->num_rows() > 0) {
            $data=$query->result();
            return $data;
        }
        return false;
    }
}

?>
