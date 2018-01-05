<?php

class Model_employee extends CI_Model {

    function getEmployees() {
        $this->db->select('*');
        $query = $this->db->get("employee");
        if ($query->num_rows() > 0) {
            $data=$query->result();
            return $data;
        }
        return false;
    }
}

?>
