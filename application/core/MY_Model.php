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

    public function get_all($args = null) {

        // seelct all tables if selec is not specified
        if ($args != NULL && isset($args['select'])) {
            $this->db->select($args['select']);
        } else {
            $this->db->select('*');
        }


        // join  tables if join is  specified
        if ($args != NULL && isset($args['join'])) {
            $joins = $args['join'];
            foreach ($joins as $join) {
                if (isset($join['condition'])) {
                    $this->db->join($join['table'], $join['condition']);
                } else {
                    $this->db->join($join['table']);
                }
            }
        }
        
        $q = $this->db->get($this->table_name);
        $data = $q->result();
        $q->free_result();
        return $data;
        
    }

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
