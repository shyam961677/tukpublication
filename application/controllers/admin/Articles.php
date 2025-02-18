<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/category_model');
        $this->load->model('admin/home_model');
        notLogged_in();
    }

	public function index()
	{
		if (!check_permission('Articles', ucfirst('list'))) {		
		    $this->session->set_flashdata('error', 'You do not have permission to access this module.');
		   redirect(base_url('admin-dashboard'));
		}
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/sidebar');
		$data['results'] = $this->category_model->get_all_data('articles');
		$this->load->view('admin/articles/index',$data);
		$this->load->view('admin/include/footer');
	}

	public function create()
	{	
		if (!check_permission('Articles', ucfirst('add'))) {		
		    $this->session->set_flashdata('error', 'You do not have permission to access this module.');
		   redirect(base_url('admin-dashboard'));
		}
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/sidebar');
		$this->load->view('admin/articles/create');
		$this->load->view('admin/include/footer');
	}

	public function store()
	{		
		$this->form_validation->set_rules('title', 'Title', 'required|trim');        
        $this->form_validation->set_rules('content', 'Content', 'required');

	    if ($this->form_validation->run() === FALSE) {
	        $this->load->view('admin/include/header');
			$this->load->view('admin/include/sidebar');
			$this->load->view('admin/articles/create');
			$this->load->view('admin/include/footer');
	    } else {
	         $formData = array(
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),                
            );
	        if ($this->category_model->insert_date('articles',$formData)) {
	            $this->session->set_flashdata('success', 'Data added successfully!');
                redirect(base_url('articles-create'));

	        } else {
	            $this->session->set_flashdata('error', 'Error adding data.');
                redirect(base_url('articles-create'));


	        }
	    }
	}

	public function editCategry($id) 
	{
		if (!check_permission('Articles', ucfirst('edit'))) {		
		    $this->session->set_flashdata('error', 'You do not have permission to access this module.');
		   redirect(base_url('admin-dashboard'));
		}
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/sidebar');
		$data['results'] = $this->category_model->get_data_by_id($id,'articles');		
        $this->load->view('admin/articles/edit', $data);
		$this->load->view('admin/include/footer');

    }

    public function update() {
	   $this->form_validation->set_rules('title', 'Title', 'required|trim');        
        $this->form_validation->set_rules('content', 'Content', 'required');

	    if ($this->form_validation->run() === FALSE) {
	        $id = $this->input->post('id');
	        $this->load->view('admin/include/header');
			$this->load->view('admin/include/sidebar');
			$data['results'] = $this->category_model->get_data_by_id($id,'articles');		
	        $this->load->view('admin/articles/edit', $data);
			$this->load->view('admin/include/footer');
	    } else {
	        $id = $this->input->post('id');	        

	        $data = array(
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                
            );
	        if ($this->category_model->update_data('articles',$data,$id)) {
	            $this->session->set_flashdata('success', 'Record updated successfully!');
	            redirect(base_url('articles-list'));
	        } else {
	            $this->session->set_flashdata('error', 'Something went wrong.');
	            redirect(base_url('edit-articles/'.$id));

	        }
	    }
	}


	public function deleteCategry($id) 
	{
		
    	if (!check_permission('Articles', ucfirst('delete'))) {		
		    $this->session->set_flashdata('error', 'You do not have permission to access this module.');
		   redirect(base_url('admin-dashboard'));
		}
	    if ($this->category_model->delete_record($id,'articles')) {
	        $this->session->set_flashdata('success', 'Record deleted successfully!');
	    } else {
	        $this->session->set_flashdata('error', 'Failed to delete the record.');
	    }
	    
	    redirect('articles-list');
	}




	

}
