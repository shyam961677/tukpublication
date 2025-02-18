<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/category_model');
        $this->load->model('admin/home_model');
        notLogged_in();

    }

	public function index()
	{
		if (!check_permission('Role', ucfirst('list'))) {		
		    $this->session->set_flashdata('error', 'You do not have permission to access this module.');
		    redirect(base_url('admin-dashboard'));
		}
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/sidebar');
		$data['results'] = $this->home_model->get_all_data('roles');
		$this->load->view('admin/role/index',$data);
		$this->load->view('admin/include/footer');
	}

	public function create()
	{	
		if (!check_permission('Role', ucfirst('add'))) {		
		    $this->session->set_flashdata('error', 'You do not have permission to access this module.');
		    redirect(base_url('admin-dashboard'));
		}
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/sidebar');
		$this->load->view('admin/role/create');
		$this->load->view('admin/include/footer');
	}

	public function store()
	{		
		$this->form_validation->set_rules('role', 'Role', 'required|trim|is_unique[roles.role]');
		$this->form_validation->set_rules('status', 'Status', 'required|trim');
	    if ($this->form_validation->run() === FALSE) {
	        $this->load->view('admin/include/header');
			$this->load->view('admin/include/sidebar');
			$this->load->view('admin/role/create');
			$this->load->view('admin/include/footer');
	    } else {
	        $role = $this->input->post('role');
	        $status = $this->input->post('status');
			$user_id = $this->session->userdata('user_id');

	        $data = [
	            'role' => $role,
	            'status' => $status,
	            'created_by' => $user_id,
	        ];
	        $result = $this->home_model->insert_date('roles',$data);
	        if (!empty($result)) {	        	
	            $this->session->set_flashdata('success', 'User type added successfully!');
	            redirect(base_url('create-role'));
		       
	        } else {
	            $this->session->set_flashdata('error', 'Error adding user type.');
	            redirect(base_url('create-role'));

	        }
	    }
	}

	public function edit($id) 
	{
		if (!check_permission('Role', ucfirst('edit'))) {		
		    $this->session->set_flashdata('error', 'You do not have permission to access this module.');
		    redirect(base_url('admin-dashboard'));
		}
		if (empty($id)) {
	        redirect(base_url('user-role'));				
		}
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/sidebar');
        $data['results'] = $this->home_model->get_data_by_id($id,'roles');        
        $data['modules'] = $this->home_model->get_all_module('modules'); 
        $assigned_permissions = $this->home_model->get_permissions_by_role($id);
		if (!empty($assigned_permissions)) {
		    $data['assigned_permissions'] = json_decode($assigned_permissions->permissions, true);
		}   
        $this->load->view('admin/role/edit', $data);
		$this->load->view('admin/include/footer');

    }

    public function update() {
	    $this->form_validation->set_rules('role', 'Role', 'required|trim');
		$this->form_validation->set_rules('status', 'Status', 'required|trim');	    
	    if ($this->form_validation->run() === FALSE) {
	        $id = $this->input->post('id');
	        $this->load->view('admin/include/header');
	        $this->load->view('admin/include/sidebar');
	        $data['results'] = $this->home_model->get_data_by_id($id, 'roles'); 
        	$data['modules'] = $this->home_model->get_all_module('modules'); 
	        $this->load->view('admin/role/edit', $data);
	        $this->load->view('admin/include/footer');
	    } else {
	        $role = $this->input->post('role');	        
	        $id = $this->input->post('id');	
	        $status = $this->input->post('status');
			$user_id = $this->session->userdata('user_id');        
	        
	        $data = [
	            'role' => $role,
	            'status' => $status,
	            'created_by' => $user_id,
	        ];
	        if ($this->home_model->update_data('roles',$data,$id)) {
	        	$this->handle_module_permissions($id);
	            $this->session->set_flashdata('success', 'Record updated successfully!');
	            redirect(base_url('user-role'));
	        } else {
	            $this->session->set_flashdata('error', 'Something went wrong.');
	            redirect(base_url('edit-role/'.$id));

	        }
	    }
	}

	private function handle_module_permissions($role_id) {
    $permissions = $this->input->post('permissions');
    
    $module_permissions = [];

    if (!empty($permissions)) {
        foreach ($permissions as $module_name => $actions) {
            $module_permissions[$module_name] = $actions;
        }
    }
	$user_id = $this->session->userdata('user_id');        
    
    $permissions_json = json_encode($module_permissions);
    
    $existing_permissions = $this->home_model->get_permissions_by_role($role_id);
    
    if ($existing_permissions) {
        $data = [
            'permissions' => $permissions_json,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user_id
        ];
        $this->home_model->update_permissions($role_id, $data);
    } else {
        $data = [
            'role_id' => $role_id,
            'permissions' => $permissions_json,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $user_id,            
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $this->home_model->insert_permission($data);
    }
}

	public function delete($id) 
	{
		if (!check_permission('Role', ucfirst('delete'))) {		
		    $this->session->set_flashdata('error', 'You do not have permission to access this module.');
		    redirect(base_url('admin-dashboard'));
		}
    	
	    if ($this->home_model->delete_record($id,'roles')) {
	    	$this->home_model->delete_role_permissions($id,'role_permissions');
	        $this->session->set_flashdata('success', 'Record deleted successfully!');
	    } else {
	        $this->session->set_flashdata('error', 'Failed to delete the record.');
	    }
	    
	    redirect('user-role');
	}
   	

}
