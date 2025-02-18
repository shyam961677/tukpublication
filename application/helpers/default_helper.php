<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('is_logged_in')) {
    function is_logged_in() {
        $CI = &get_instance();
        return $CI->session->userdata('logged_in') ? true : false;
    }
}

if (!function_exists('notLogged_in')) {
    function notLogged_in() {
        if (!is_logged_in()) {
            redirect(base_url('admin-login'));
            exit();
        }
    }
}

if (!function_exists('logged_in')) {
    function logged_in() {
        if (is_logged_in()) {
            redirect(base_url('admin-dashboard')); 
            exit();
        }
    }
}


if (!function_exists('dd')) {
    function dd($data) {
        echo '<pre>';
        if (!empty($data)) {
           print_r($data);die;
        }else{
           print_r($_POST);die;
        }
    }
}

if (!function_exists('get_role_by_id')) {
    function get_role_by_id($id) {
    	$CI = &get_instance();
        if (!empty($id)) {
        	$CI->db->where('id',$id);
         	$result = $CI->db->get('roles')->row();
         	return $result; 	
        }
    }
}


if (!function_exists('get_country_id')) {
    function get_country_id($id) {
        $CI = &get_instance();
        if (!empty($id)) {
            $CI->db->select('name,id');
            $CI->db->where('id',$id);
            $result = $CI->db->get('countries')->row();
            return $result;     
        }
    }
}

if (!function_exists('get_state_id')) {
    function get_state_id($id) {
        $CI = &get_instance();
        if (!empty($id)) {
            $CI->db->select('name,id');
            $CI->db->where('id',$id);
            $result = $CI->db->get('states')->row();
            return $result;     
        }
    }
}

if (!function_exists('get_city_id')) {
    function get_city_id($id) {
        $CI = &get_instance();
        if (!empty($id)) {
            $CI->db->select('name,id');
            $CI->db->where('id',$id);
            $result = $CI->db->get('cities')->row();
            return $result;     
        }
    }
}

if (!function_exists('get_admin_id')) {
    function get_admin_id($id) {
        $CI = &get_instance();
        if (!empty($id)) {
            $CI->db->select('name,id');
            $CI->db->where('id',$id);
            $result = $CI->db->get('admins')->row();
            return $result;     
        }
    }
}


if (!function_exists('get_country_name')) {
    function get_country_name($name) {
        $CI = &get_instance();
        if (!empty($name)) {
            $CI->db->select('name,id');
            $CI->db->where('name',$name);
            $result = $CI->db->get('countries')->row();
            return $result;     
        }
    }
}

if (!function_exists('get_state_name')) {
    function get_state_name($name,$country_id) {
        $CI = &get_instance();
        if (!empty($name)) {
            $CI->db->select('name,id');
            $CI->db->where('name',$name);
            $CI->db->where('country_id',$country_id);
            $result = $CI->db->get('states')->row();
            return $result;     
        }
    }
}

if (!function_exists('get_city_name')) {
    function get_city_name($name,$state_id) {
        $CI = &get_instance();
        if (!empty($name)) {
            $CI->db->select('name,id');
            $CI->db->where('name',$name);
            $CI->db->where('state_id',$state_id);
            $result = $CI->db->get('cities')->row();
            return $result;     
        }
    }
}


if (!function_exists('get_user_by_userid')) {
    function get_user_by_userid($userid) {
        $CI = &get_instance();
        if (!empty($userid)) {
            $CI->db->where('userid',$userid);
            $result = $CI->db->get('tbl_register')->row();
            return $result;     
        }
    }
}




if (!function_exists('send_email')) {
    function send_email($to, $subject, $message) {
        $CI =& get_instance();
        $CI->load->library('email');
        
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'shyammilan002@gmail.com', 
            'smtp_pass' => 'cetw oqmw tfyu rwtv',  
            'smtp_port' => 465,
            'smtp_crypto' => 'ssl', // Or 'tls'
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE,
            'newline' => "\r\n"
        );

        $CI->email->initialize($config);
        $CI->email->from('web3@tukworld.com', 'The Ultimate Knowlwdge (TUK)');
        $CI->email->to($to);
        $CI->email->subject($subject);
        $CI->email->message($message);

        if ($CI->email->send()) {
            return TRUE; 
        } else {
            return $CI->email->print_debugger();
        }
    }
}




