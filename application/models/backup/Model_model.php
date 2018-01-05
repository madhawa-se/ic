<?php
class Model_model extends CI_Model {

    function getModels() {
        $this->db->select('*');
        $query = $this->db->get("model");
        if ($query->num_rows() > 0) {
            $data=$query->result();
            return $data;
        }
        return false;
    }
}

?>
