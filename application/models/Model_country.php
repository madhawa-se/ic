<?php

class Model_country extends CI_Model {

    function getCountries() {
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

    function locationsListing($limit, $id) {
        $this->db->limit($limit);
        $this->db->select('*');
        $query = $this->db->get("locations");
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

    function editlocation($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('locations');
        return $query->row();
    }

    function locationUpdate($update_data) {

        $this->db->where('id', $update_data['id']);
        $this->db->update('locations', $update_data);
        return true;
    }

    function locationsDelete($id) {
        $this->db->where('id', $id);
        $this->db->delete('licenses');
        if ($this->db->affected_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

}

?>