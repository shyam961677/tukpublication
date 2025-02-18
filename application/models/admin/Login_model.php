<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model 
{



   public function authenticate_user($email, $password) {
      $this->db->where('email', $email);
      $this->db->where('password', $password); 
      $this->db->where('status', '1'); 
      $query = $this->db->get('admins');  

      if ($query->num_rows() == 1) {
      return $query->row();
      } else {
      return false;
      }
   }

   public function update_data($table, $data,$id) {
     
     $this->db->where('id', $id);
     return $this->db->update($table, $data);
   }

    
}
?>
