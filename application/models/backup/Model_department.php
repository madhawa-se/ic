<?php

class Model_department extends CI_Model {

    function getDepartments() {
        $this->db->select('*');
        $query = $this->db->get("department");
        if ($query->num_rows() > 0) {
            $data=$query->result();
            return $data;
        }
        return false;
    }
}

?>
