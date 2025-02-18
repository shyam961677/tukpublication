<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

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
		$data['results'] = $this->category_model->get_all_data('categories');
		$this->load->view('admin/category/index',$data);
		$this->load->view('admin/include/footer');
	}

	public function create()
	{	
			
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/sidebar');
		$this->load->view('admin/category/create');
		$this->load->view('admin/include/footer');
	}

	public function store()
	{		
		$this->form_validation->set_rules('category', 'Category', 'required|trim');        
        $this->form_validation->set_rules('description', 'Description', 'required');

	    if ($this->form_validation->run() === FALSE) {
	        $this->load->view('admin/include/header');
			$this->load->view('admin/include/sidebar');
			$this->load->view('admin/category/create');
			$this->load->view('admin/include/footer');
	    } else {
	         $formData = array(
                'name' => $this->input->post('category'),
                'description' => $this->input->post('description'),                
            );
	        if ($this->category_model->insert_date('categories',$formData)) {
	            $this->session->set_flashdata('success', 'User type added successfully!');
                redirect(base_url('category-create'));

	        } else {
	            $this->session->set_flashdata('error', 'Error adding user type.');
                redirect(base_url('category-create'));


	        }
	    }
	}

	public function editCategry($id) 
	{
		
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/sidebar');
		$data['results'] = $this->category_model->get_data_by_id($id,'categories');		
        $this->load->view('admin/category/edit', $data);
		$this->load->view('admin/include/footer');

    }

    public function update() {
	    $this->form_validation->set_rules('category', 'Category', 'required|trim');        
        $this->form_validation->set_rules('description', 'Description', 'required');

	    if ($this->form_validation->run() === FALSE) {
	        $id = $this->input->post('id');
	        $this->load->view('admin/include/header');
			$this->load->view('admin/include/sidebar');
			$data['results'] = $this->category_model->get_data_by_id($id,'categories');		
	        $this->load->view('admin/category/edit', $data);
			$this->load->view('admin/include/footer');
	    } else {
	        $id = $this->input->post('id');	        

	        $data = array(
                'name' => $this->input->post('category'),
                'description' => $this->input->post('description'),
                
            );
	        if ($this->category_model->update_data('categories',$data,$id)) {
	            $this->session->set_flashdata('success', 'Record updated successfully!');
	            redirect(base_url('category-list'));
	        } else {
	            $this->session->set_flashdata('error', 'Something went wrong.');
	            redirect(base_url('edit-category/'.$id));

	        }
	    }
	}


	public function deleteCategry($id) 
	{
		
	    if ($this->category_model->delete_record($id,'categories')) {
	        $this->session->set_flashdata('success', 'Record deleted successfully!');
	    } else {
	        $this->session->set_flashdata('error', 'Failed to delete the record.');
	    }
	    
	    redirect('category-list');
	}




	

}
