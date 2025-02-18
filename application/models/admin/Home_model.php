<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model 
{

    public function insert_date($table,$data) {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }


    public function get_all_data($table) {
        $this->db->order_by('id','desc');
        return $this->db->get($table)->result();
    }

    public function get_all_select_data($table,$select) {
        $this->db->select($select);
        $this->db->order_by('id','desc');
        return $this->db->get($table)->result();
    }


    public function get_data_by_id($id,$table) {
        $this->db->where('id', $id);
        $query = $this->db->get($table); 
        return $query->row();
    }

    public function delete_record($id,$table) {
        $this->db->where('id', $id);
        return $this->db->delete($table); 
    }

    public function update_data($table, $data,$id) {
        
        $this->db->where('id', $id);
        return $this->db->update($table, $data);
    }


    public function get_data_by_column($table, $data) {
        $this->db->where($data);
        $query = $this->db->get($table);

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false; 
        }
    }


    public function get_roles_by_id($role_id) {
        $this->db->where('status', '1');
        $this->db->where('id', $role_id);
        $query = $this->db->get('roles');
        return $query->row();
    }


    public function get_states($country_id) {
        return $this->db->get_where('states', ['country_id' => $country_id])->result();
    }

    public function get_cities($state_id) {
        return $this->db->get_where('cities', ['state_id' => $state_id])->result();
    }

    public function insert_batch($table, $data)
    {
        return $this->db->insert_batch($table, $data);
    }
}
?>
