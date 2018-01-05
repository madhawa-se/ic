<?php

class Model_user extends CI_Model {

    public function is_logged_in($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $this->db->from('users');
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    // Count all record of table "contact_info" in database.
    public function record_count() {
        return $this->db->count_all("users");
    }

    function userListing($limit, $id) {
        $this->db->limit($limit);
        $this->db->select('*');
        $query = $this->db->get("users");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    function userAdd($insert_data) {

        if ($insert_data['username'] != "" && $insert_data['password'] != "") {
            // Inserting into your table
            $this->db->insert('users', $insert_data);
            // Return the id of inserted row
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    function userDelete($id) {
        $this->db->where('user_id', $id);
        $this->db->delete('users');
        if ($this->db->affected_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    function userEdit($id) {
        $this->db->select('*');
        $this->db->where('user_id', $id);
        $query = $this->db->get('users');
        return $query->row();
    }

    function userUpdate($update_data) {

        $this->db->where('user_id', $update_data['user_id']);
        $this->db->update('users', $update_data);
        return true;
    }

}

?>
