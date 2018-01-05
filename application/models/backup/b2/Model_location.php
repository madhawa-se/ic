<?php

class Model_location extends CI_Model {

    function getLocations() {
        $this->db->select('*');
        $query = $this->db->get("locations");
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
        $this->db->select('locations.id,locations.branch_id,locations.branch_name,locations.address,country.country');
        $this->db->from('locations');
        $this->db->join('country', 'locations.country = country.country_id');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
              return $data=$query->result();
        }
        return false;
    }

    function addlocation($insert_data) {
        $result = $this->db->insert('locations', $insert_data);
        if ($result === true) {
            // Return the id of inserted row
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
        $this->db->delete('locations');
        if ($this->db->affected_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

}

?>