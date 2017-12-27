<?php

class Model_country extends CI_Model {

    function getEmployees() {
        $this->db->select('*');
        $query = $this->db->get("country");
        if ($query->num_rows() > 0) {
            $data = $query->result();
            return $data;
        }
        return false;
    }

    // Count all record of table "contact_info" in database.
    public function record_count() {
        return $this->db->count_all("locations");
    }

    function countryListing($limit, $id) {
        $this->db->limit($limit);
        $this->db->select('*');
        $query = $this->db->get("country");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    function addCountry($insert_data) {
        $result = $this->db->insert('country', $insert_data);
        if ($result === true) {
            return $this->db->insert_id();
        }
        return false;
    }

    function editCountry($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('country');
        return $query->row();
    }

    function countryUpdate($id,$update_data) {

        $this->db->where('id',$id);
        $this->db->update('country', $update_data);
        if ($this->db->affected_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    function countryDelete($id) {
        $this->db->where('id', $id);
        $this->db->delete('country');
        if ($this->db->affected_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

}

?>