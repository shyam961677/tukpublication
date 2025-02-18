<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modules extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/category_model');
        $this->load->model('admin/home_model');
        notLogged_in();
    }

	public function index()
	{
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/sidebar');
		$data['results'] = $this->home_model->get_all_data('modules');
		$this->load->view('admin/modules/index',$data);
		$this->load->view('admin/include/footer');
	}

	public function create()
	{	
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/sidebar');
		$data['actions'] = $this->home_model->get_all_data('actions');		
		$this->load->view('admin/modules/create',$data);
		$this->load->view('admin/include/footer');
	}

	public function store()
	{		
	    $this->form_validation->set_rules('module', 'Module', 'required|trim');
	    $this->form_validation->set_rules('action[]', 'Action', 'required'); // Ensure at least one action is selected

	    if ($this->form_validation->run() === FALSE) {
	        $this->load->view('admin/include/header');
	        $this->load->view('admin/include/sidebar');
	        $data['actions'] = $this->home_model->get_all_data('actions');	
	        $this->load->view('admin/modules/create', $data);
	        $this->load->view('admin/include/footer');
	    } else {
	        $module = $this->input->post('module');	        
	        $actions = $this->input->post('action'); 

	        $data = [];
	        foreach ($actions as $action) {
	            $data[] = [
	                'module_name' => $module,
	                'action' => $action, 
	            ];
	        }

	        if ($this->home_model->insert_batch('modules', $data)) {
	            $this->session->set_flashdata('success', 'Module actions added successfully!');
	            redirect(base_url('create-modules'));
	        } else {
	            $this->session->set_flashdata('error', 'Error adding module actions.');
	            redirect(base_url('create-modules'));
	        }
	    }
	}

	public function edit($id) 
	{
		if (empty($id)) {
	        redirect(base_url('modules-list'));				
		}
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/sidebar');
        $data['results'] = $this->home_model->get_data_by_id($id,'modules');  
		$data['actions'] = $this->home_model->get_all_data('actions');
		// dd($data['results']);	      
        $this->load->view('admin/modules/edit', $data);
		$this->load->view('admin/include/footer');

    }

    public function update() {
	    $this->form_validation->set_rules('module', 'Module', 'required|trim');
	    $this->form_validation->set_rules('action', 'Action', 'required');

	    if ($this->form_validation->run() === FALSE) {
	        $id = $this->input->post('id');
	        $this->load->view('admin/include/header');
	        $this->load->view('admin/include/sidebar');
	        $data['results'] = $this->home_model->get_data_by_id($id, 'modules');
			$data['actions'] = $this->home_model->get_all_data('actions');	
	        $this->load->view('admin/modules/edit', $data);
	        $this->load->view('admin/include/footer');
	    } else {
	        $module = $this->input->post('module');	        
	        $action = $this->input->post('action');	        
	        
	        $id = $this->input->post('id');	        
	        $data = [
	            'module_name' => $module,
	            'action' => $action,
	        ];
	        if (!empty($this->home_model->get_data_by_column('modules', $data))){
	            // $this->session->set_flashdata('error', 'This module and action already exist.');
	            redirect(base_url('modules-list'));

	        }
	        if ($this->home_model->update_data('modules',$data,$id)) {
	            $this->session->set_flashdata('success', 'Record updated successfully!');
	            redirect(base_url('modules-list'));
	        } else {
	            $this->session->set_flashdata('error', 'Something went wrong.');
	            redirect(base_url('edit-modules/'.$id));

	        }
	    }
	}


	public function delete($id) 
	{
		if ($this->home_model->delete_record($id,'modules')) {
	        $this->session->set_flashdata('success', 'Record deleted successfully!');
	    } else {
	        $this->session->set_flashdata('error', 'Failed to delete the record.');
	    }
	    
	    redirect('modules-list');
	}


   


	public function actionList()
	{
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/sidebar');
		$data['results'] = $this->home_model->get_all_data('actions');
		$this->load->view('admin/action/index',$data);
		$this->load->view('admin/include/footer');
	}

	public function createAction()
	{	
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/sidebar');
		$this->load->view('admin/action/create');
		$this->load->view('admin/include/footer');
	}

	public function storeAction()
	{		
		$this->form_validation->set_rules('action', 'Action', 'required|trim|is_unique[actions.name]');
	    $this->form_validation->set_rules('status', 'Status', 'required');

	    if ($this->form_validation->run() === FALSE) {
	        $this->load->view('admin/include/header');
			$this->load->view('admin/include/sidebar');
			$this->load->view('admin/action/create');
			$this->load->view('admin/include/footer');
	    } else {
	        $action = $this->input->post('action');	        
	        $status = $this->input->post('status');	        
	        $data = [
	            'name' => ucfirst($action),
	            'status' => $status,
	        ];
	        if ($this->home_model->insert_date('actions',$data)) {
	            $this->session->set_flashdata('success', 'User type added successfully!');
	            redirect(base_url('create-action'));
	        } else {
	            $this->session->set_flashdata('error', 'Error adding user type.');
	            redirect(base_url('create-action'));

	        }
	    }
	}

	public function editAction($id) 
	{
		if (empty($id)) {
	        redirect(base_url('action-list'));				
		}
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/sidebar');
        $data['results'] = $this->home_model->get_data_by_id($id,'actions');        
        $this->load->view('admin/action/edit', $data);
		$this->load->view('admin/include/footer');

    }

    public function updateAction() {
	    $this->form_validation->set_rules('action', 'Action', 'required|trim');
	    $this->form_validation->set_rules('status', 'Status', 'required');
	    if ($this->form_validation->run() === FALSE) {
	        $id = $this->input->post('id');
	        $this->load->view('admin/include/header');
	        $this->load->view('admin/include/sidebar');
	        $data['results'] = $this->home_model->get_data_by_id($id,'actions'); 
	        $this->load->view('admin/action/edit', $data);
	        $this->load->view('admin/include/footer');
	    } else {
	        $action = $this->input->post('action');	        
	        $status = $this->input->post('status');	        
	        
	        $id = $this->input->post('id');	        
	        $data = [
	            'name' => $action,
	            'status' => $status,
	        ];
	        if ($this->home_model->update_data('actions',$data,$id)) {
	            $this->session->set_flashdata('success', 'Record updated successfully!');
	            redirect(base_url('action-list'));
	        } else {
	            $this->session->set_flashdata('error', 'Something went wrong.');
	            redirect(base_url('update-action/'.$id));

	        }
	    }
	}


	public function deleteAction($id) 
	{
		if ($this->home_model->delete_record($id,'actions')) {
	        $this->session->set_flashdata('success', 'Record deleted successfully!');
	    } else {
	        $this->session->set_flashdata('error', 'Failed to delete the record.');
	    }
	    
	    redirect('action-list');
	}


	

}
