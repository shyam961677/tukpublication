<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model 
{



  
    public function insert_date($table,$data) {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }


    public function get_all_data($table) {
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

   

}
?>
