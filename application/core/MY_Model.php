<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

    protected $table_name = '';
    protected $primary_key = 'id';

    public function __construct() {
        parent::__construct();

        $this->load->database();

        $this->load->helper('inflector');

        if (!$this->table_name) {
            $this->table_name = strtolower(plural(get_class($this)));
        }
    }

    public function get($id) {
        return $this->db->get_where($this->table_name, array($this->primary_key => $id))->row();
    }

    function locationsListing($limit, $id) {
        $this->db->limit($limit);
        $this->db->select('locations.id,locations.branch_id,locations.branch_name,locations.address,country.country');
        $this->db->from('locations');
        $this->db->join('country', 'locations.country = country.country_id');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $data = $query->result();
        }
        return false;
    }

    public function get_all($join = null) {
        $data = array();
        $Q;
        if ($join == '') {
            $this->db->select('*');
            $Q = $this->db->get($this->table_name);
        } else {
            if ($fields = $join['select']) {
                $this->db->select($fields);
            }
            $this->db->from($this->table_name);
            if (($join_table = $join['table']) && ($condition = $join['condition'])) {
                $this->db->join($join_table,$condition);
            }
            $Q = $this->db->get();
        }

        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();

        return $data;
    }

//    public function get_all($fields = '', $where = array(), $table = '', $limit = '', $order_by = '', $group_by = '') {
//        $data = array();
//        if ($fields != '') {
//            $this->db->select($fields);
//        }
//
//        if (count($where)) {
//            $this->db->where($where);
//        }
//
//        if ($table != '') {
//            $this->table_name = $table;
//        }
//
//        if ($limit != '') {
//            $this->db->limit($limit);
//        }
//
//        if ($order_by != '') {
//            $this->db->order_by($order_by);
//        }
//
//        if ($group_by != '') {
//            $this->db->group_by($group_by);
//        }
//
//        $Q = $this->db->get($this->table_name);
//
//        if ($Q->num_rows() > 0) {
//            foreach ($Q->result_array() as $row) {
//                $data[] = $row;
//            }
//        }
//        $Q->free_result();
//
//        return $data;
//    }

    public function insert($data) {
        $success = $this->db->insert($this->table_name, $data);
        if ($success) {
            return $this->db->insert_id();
        } else {
            return FALSE;
        }
    }

    public function update($data, $id) {
        $this->db->where($this->primary_key, $id);
        return $this->db->update($this->table_name, $data);
    }

    public function delete($id) {
        $this->db->where($this->primary_key, $id);
        return $this->db->delete($this->table_name);
    }

}
