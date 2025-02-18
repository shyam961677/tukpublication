<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/home_model');
        notLogged_in();
    }


	public function index()
	{
	
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/sidebar');
		$data['results'] = $this->home_model->get_all_data('admins');		
		$this->load->view('admin/admin/index',$data);
		$this->load->view('admin/include/footer');
	}

	public function create()
	{
		
     
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/sidebar');
		$data['user_types'] = $this->home_model->get_all_data('roles');
		$this->load->view('admin/admin/create',$data);
		$this->load->view('admin/include/dashboardFooter');
	}


	public function store() {		
	    $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'required|regex_match[/^[0-9]{10}$/]', 
            array('regex_match' => 'The phone number must be exactly 10 digits'));
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');
        $this->form_validation->set_rules('userType', 'admin Type', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

	    if ($this->form_validation->run() === FALSE) {
	        $this->load->view('admin/include/header');
			$this->load->view('admin/include/sidebar');
			$data['user_types'] = $this->home_model->get_all_data('roles');
			$this->load->view('admin/admin/create',$data);
			$this->load->view('admin/include/footer');
	    } else {
	         $formData = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'password' => md5($this->input->post('password')),
                'user_type' => $this->input->post('userType'),
                'status' => $this->input->post('status')
            );
	        if ($this->home_model->insert_date('admins',$formData)) {
	            $this->session->set_flashdata('success', 'admin type added successfully!');
                redirect(base_url('create-admin'));

	        } else {
	            $this->session->set_flashdata('error', 'Error adding admin type.');
                redirect(base_url('create-admin'));


	        }
	    }
	}

	public function edit($id) 
	{

		if (empty($id)) {
	        redirect(base_url('admin-list'));				
		}
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/sidebar');
		$data['user_types'] = $this->home_model->get_all_data('roles');
        $data['results'] = $this->home_model->get_data_by_id($id,'admins');        
        $this->load->view('admin/admin/edit', $data);
		$this->load->view('admin/include/footer');

    }


    public function update() {
	    $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'required|regex_match[/^[0-9]{10}$/]', 
            array('regex_match' => 'The phone number must be exactly 10 digits'));
        $this->form_validation->set_rules('userType', 'admin Type', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

	    if ($this->form_validation->run() === FALSE) {
	        $id = $this->input->post('id');
	        $this->load->view('admin/include/header');
	        $this->load->view('admin/include/sidebar');
			$data['user_types'] = $this->home_model->get_all_data('roles');
	        $data['results'] = $this->home_model->get_data_by_id($id, 'admins'); 
	        $this->load->view('admin/admin/edit', $data);
	        $this->load->view('admin/include/footer');
	    } else {
	        $id = $this->input->post('id');	        

	        $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'user_type' => $this->input->post('userType'),
                'status' => $this->input->post('status')
            );
	        if ($this->home_model->update_data('admins',$data,$id)) {
	            $this->session->set_flashdata('success', 'Record updated successfully!');
	            redirect(base_url('admin-list'));
	        } else {
	            $this->session->set_flashdata('error', 'Something went wrong.');
	            redirect(base_url('edit-admin/'.$id));

	        }
	    }
	}

	public function show($adminId) {
	
	    if (empty($adminId)) {
	        redirect(base_url('admin-list'));
	    }

	    $data['results'] = $this->home_model->get_data_by_id($adminId, 'admins'); 
	    if (empty($data['results'])) {
	        $this->session->set_flashdata('error', 'admin not found.');
	        redirect(base_url('admin-list'));
	    }
		$data['user_types'] = $this->home_model->get_all_data('roles');
	    $this->load->view('admin/include/header');
	    $this->load->view('admin/include/sidebar');
	    $this->load->view('admin/admin/show',$data); 
	    $this->load->view('admin/include/footer');
	}

    public function delete($id) {
    
	    if ($this->home_model->delete_record($id,'admins')) {
	        $this->session->set_flashdata('success', 'Record deleted successfully!');
	    } else {
	        $this->session->set_flashdata('error', 'Failed to delete the record.');
	    }
	    
	    redirect('admin-list');
	}

	






	

}
