<?php

class Model_license extends CI_Model {

    // Count all record of table "contact_info" in database.
    public function record_count() {
        return $this->db->count_all("licenses");
    }

    function licenseListing($limit, $id) {
        $this->db->limit($limit);
        $this->db->select('*');
        $query = $this->db->get("licenses");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    function getLicenses() {
        $this->db->select('*');
        $query = $this->db->get("licenses");
        if ($query->num_rows() > 0) {
            return $data=$query->result();
        }
        return false;
    }

    function addLicense($insert_data) {

        if ($insert_data['manufacturer'] != "") {
            // Inserting into your table
            $this->db->insert('licenses', $insert_data);
            // Return the id of inserted row
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    function editLicense($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('licenses');
        return $query->row();
    }

    function licenseUpdate($update_data) {

        $this->db->where('id', $update_data['id']);
        $this->db->update('licenses', $update_data);
        return true;
    }

    function licenseDelete($id) {
        $this->db->where('id', $id);
        $this->db->delete('licenses');
        if ($this->db->affected_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

}
