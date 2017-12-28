<?php

class Model_asset extends CI_Model {

    // Count all record of table "contact_info" in database.
    public function record_count() {
        return $this->db->count_all("assets");
    }

    function assetListing($limit, $id) {
        $this->db->limit($limit);
        $this->db->select('*');
        $this->db->from('assets');
        $this->db->join('license_registry', 'license_registry.asset_id = assets.asset_id');
        $this->db->join('licenses', 'licenses.license_id = license_registry.license_id');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    function getAssets() {
        $this->db->select('*');
        $query = $this->db->get("assets");
        if ($query->num_rows() > 0) {
            return $data = $query->result();
        }
        return false;
    }

    function getAssetTypes() {
        $this->db->select('*');
        $query = $this->db->get("asset_type");
        if ($query->num_rows() > 0) {
            return $data = $query->result();
        }
        return false;
    }

    function assetDetails($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('assets');
        return $query->row();
    }

    function assetAdd($insert_data) {

        if ($insert_data['asset_id'] != "") {
            // Inserting into your table

            $regInsertData = $insert_data['licenses'];
            unset($insert_data['licenses']);

            $this->db->trans_start();
            $this->db->insert('assets', $insert_data);
            $this->db->insert('license_registry', $regInsertData);
            $this->db->trans_complete();
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    function assetRegAdd($insert_data) {

        $result = $this->db->insert('assets', $insert_data);
        if ($result === true) {
            return $this->db->insert_id();
        }
        return false;
    }

    function assetEdit($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('assets');
        return $query->row();
    }

    function assetUpdate($update_data) {

        $this->db->where('id', $update_data['id']);
        $this->db->update('assets', $update_data);
        return true;
    }

    function assetDelete($id) {
        $this->db->where('id', $id);
        $this->db->delete('assets');
        if ($this->db->affected_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    function count_type() {
        return $this->db->count_all("asset_type");
    }

    function assetType($limit, $id) {
        $this->db->limit($limit);
        $this->db->select('*');
        $query = $this->db->get("asset_type");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    function typeEdit($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('asset_type');
        return $query->row();
    }

    function typeUpdate($update_data) {

        $this->db->where('id', $update_data['id']);
        $this->db->update('asset_type', $update_data);
        return true;
    }

    function addType($insert_data) {

        if ($insert_data['asset_type_id'] != "") {
            // Inserting into your table
            $this->db->insert('asset_type', $insert_data);
            // Return the id of inserted row
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    function typeDelete($id) {
        $this->db->where('id', $id);
        $this->db->delete('asset_type');
        if ($this->db->affected_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    function getLicense() {

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

}
