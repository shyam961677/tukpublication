<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

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
		$data['results'] = $this->home_model->get_all_data('menus');
		$this->load->view('admin/menu/index',$data);
		$this->load->view('admin/include/footer');
	}

	public function create()
	{	
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/sidebar');
		$select = 'id,title';
		$data['menus'] = $this->home_model->get_all_select_data('menus',$select);
		$this->load->view('admin/menu/create',$data);
		$this->load->view('admin/include/footer');
	}

	public function store()
	{		
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');
		$this->form_validation->set_rules('position', 'Position', 'required');

	    if ($this->form_validation->run() === FALSE) {
	        $this->load->view('admin/include/header');
	        $this->load->view('admin/include/sidebar');
			$data['menus'] = $this->home_model->get_all_select_data('menus',$select);
	        $this->load->view('admin/menu/create',$data);
	        $this->load->view('admin/include/footer');
	    } else {
	        $data = array(
	            'title'    => $this->input->post('title'),
	            'url'      => $this->input->post('url'),
	            'parent_id' => $this->input->post('parent_id'),
	            'icon'     => $this->input->post('icon'),
	            'position' => $this->input->post('position')
	        );
	        if ($this->home_model->insert_date('menus', $data)) {
	            $this->session->set_flashdata('success', 'Module actions added successfully!');
	            redirect(base_url('create-menu'));
	        } else {
	            $this->session->set_flashdata('error', 'Error adding module actions.');
	            redirect(base_url('create-menu'));
	        }
	    }
	}

	public function edit($id) 
	{
		if (empty($id)) {
	        redirect(base_url('menu-list'));				
		}
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/sidebar');
        $data['results'] = $this->home_model->get_data_by_id($id,'menus');  
		$data['actions'] = $this->home_model->get_all_data('actions');
		// dd($data['results']);	      
        $this->load->view('admin/menu/edit', $data);
		$this->load->view('admin/include/footer');

    }

    public function update() {
	    $this->form_validation->set_rules('module', 'Module', 'required|trim');
	    $this->form_validation->set_rules('action', 'Action', 'required');

	    if ($this->form_validation->run() === FALSE) {
	        $id = $this->input->post('id');
	        $this->load->view('admin/include/header');
	        $this->load->view('admin/include/sidebar');
	        $data['results'] = $this->home_model->get_data_by_id($id, 'menus');
			$data['actions'] = $this->home_model->get_all_data('actions');	
	        $this->load->view('admin/menu/edit', $data);
	        $this->load->view('admin/include/footer');
	    } else {
	        $module = $this->input->post('module');	        
	        $action = $this->input->post('action');	        
	        
	        $id = $this->input->post('id');	        
	        $data = [
	            'module_name' => $module,
	            'action' => $action,
	        ];
	        if (!empty($this->home_model->get_data_by_column('menus', $data))){
	            // $this->session->set_flashdata('error', 'This module and action already exist.');
	            redirect(base_url('menu-list'));

	        }
	        if ($this->home_model->update_data('menus',$data,$id)) {
	            $this->session->set_flashdata('success', 'Record updated successfully!');
	            redirect(base_url('menu-list'));
	        } else {
	            $this->session->set_flashdata('error', 'Something went wrong.');
	            redirect(base_url('edit-menu/'.$id));

	        }
	    }
	}


	public function delete($id) 
	{
		if ($this->home_model->delete_record($id,'menus')) {
	        $this->session->set_flashdata('success', 'Record deleted successfully!');
	    } else {
	        $this->session->set_flashdata('error', 'Failed to delete the record.');
	    }
	    
	    redirect('menu-list');
	}


   


	

}
