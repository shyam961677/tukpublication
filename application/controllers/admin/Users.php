<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/home_model');
        notLogged_in();
    }


	public function index()
	{
		if (!check_permission('Users', ucfirst('list'))) {		
		    $this->session->set_flashdata('error', 'You do not have permission to access this module.');
		   redirect(base_url('admin-dashboard'));
		}
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/sidebar');
		$data['results'] = $this->home_model->get_all_data('tbl_register');		
		$this->load->view('admin/users/index',$data);
		$this->load->view('admin/include/footer');
	}

	public function create()
	{
		
        if (!check_permission('Users', ucfirst('add'))) {		
		    $this->session->set_flashdata('error', 'You do not have permission to access this module.');
		   redirect(base_url('admin-dashboard'));
		}
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/sidebar');
		$data['country'] = $this->home_model->get_all_data('countries');
		$this->load->view('admin/users/create',$data);
		$this->load->view('admin/include/footer');
	}



	public function get_states()
	{
	    $country_id = $this->input->post('country_id');
	    
	    if (!empty($country_id)) {
	        $states = $this->db->where('country_id', $country_id)->get('states')->result();
	        echo json_encode($states);
	    } else {
	        echo json_encode([]);
	    }
	}

	public function get_cities()
	{
	    $state_id = $this->input->post('state_id');
	    
	    if (!empty($state_id)) {
	        $cities = $this->db->where('state_id', $state_id)->get('cities')->result();
	        echo json_encode($cities);
	    } else {
	        echo json_encode([]);
	    }
	}


	public function store() {		
	    $this->form_validation->set_rules('stdName', 'Student Name', 'required|trim');
        $this->form_validation->set_rules('schoolName', 'School Name', 'required|trim');
        $this->form_validation->set_rules('country', 'Country', 'required|trim');
        $this->form_validation->set_rules('state', 'State', 'required|trim');
        $this->form_validation->set_rules('city', 'City', 'required|trim');
        $this->form_validation->set_rules('branch', 'Branch', 'required|trim');
        $this->form_validation->set_rules('class', 'Class', 'required|trim');
        $this->form_validation->set_rules('section', 'Section', 'required|trim');
        $this->form_validation->set_rules('userId', 'User Id', 'required|trim|is_unique[tbl_register.userid]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');
        $this->form_validation->set_rules('mobileNo', 'Mobile No', 'required|trim|min_length[10]|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('ageGroup', 'Age Group', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');

	    if ($this->form_validation->run() === FALSE) {
	        $this->load->view('admin/include/header');
			$this->load->view('admin/include/sidebar');
			$data['country'] = $this->home_model->get_all_data('countries');
        	$data['states'] = !empty(set_value('country')) ? $this->home_model->get_states(set_value('country')) : [];
    		$data['cities'] = !empty(set_value('state')) ? $this->home_model->get_cities(set_value('state')) : []; 
			$this->load->view('admin/users/create',$data);
			$this->load->view('admin/include/footer');
	    } else {
        	$user_id = $this->session->userdata('user_id');

	         $data = array(
                'fullname' => $this->input->post('stdName'),
                'password' => md5($this->input->post('password')),
                'ageGroup' => $this->input->post('ageGroup'),
                'email' => $this->input->post('email'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'country' => $this->input->post('country'),
                'mob' => $this->input->post('mobileNo'),
                'sclname' => $this->input->post('schoolName'),
                'branch' => $this->input->post('branch'),
                'status' => $this->input->post('status'),
                'remarks' => $this->input->post('remark'),
                'userid' => $this->input->post('userId'),
                'class_id' => $this->input->post('class'),
                'section' => $this->input->post('section'),
                'created_date' => date('Y-m-d H:i:s'),
                'activated_by' => $user_id,
            );
	        if ($this->home_model->insert_date('tbl_register',$data)) {
	            $this->session->set_flashdata('success', 'User registered successfully!');
                redirect(base_url('create-user'));

	        } else {
	            $this->session->set_flashdata('error', 'Failed to register user');
                redirect(base_url('create-user'));


	        }
	    }
	}

	public function edit($id) 
	{
		if (!check_permission('Users', ucfirst('edit'))) {		
		    $this->session->set_flashdata('error', 'You do not have permission to access this module.');
		    redirect(base_url('admin-dashboard'));
		}
		if (empty($id)) {
	        redirect(base_url('user-list'));				
		}
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/sidebar');
        $data['results'] = $this->home_model->get_data_by_id($id,'tbl_register');    
        $data['countries'] = $this->home_model->get_all_data('countries');
        $data['states'] = $this->home_model->get_states($data['results']->country);
        $data['cities'] = $this->home_model->get_cities($data['results']->state);
        $this->load->view('admin/users/edit',$data);
		$this->load->view('admin/include/footer');

    }


    public function update() {
	   $this->form_validation->set_rules('stdName', 'Student Name', 'required|trim');
        $this->form_validation->set_rules('schoolName', 'School Name', 'required|trim');
        $this->form_validation->set_rules('country', 'Country', 'required|trim');
        $this->form_validation->set_rules('state', 'State', 'required|trim');
        $this->form_validation->set_rules('city', 'City', 'required|trim');
        $this->form_validation->set_rules('branch', 'Branch', 'required|trim');
        $this->form_validation->set_rules('class', 'Class', 'required|trim');
        $this->form_validation->set_rules('section', 'Section', 'required|trim');
        $this->form_validation->set_rules('mobileNo', 'Mobile No', 'required|trim|min_length[10]|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('ageGroup', 'Age Group', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');
	    if ($this->form_validation->run() === FALSE) {
	        $id = $this->input->post('id');
	        $this->load->view('admin/include/header');
	        $this->load->view('admin/include/sidebar');
			$data['countries'] = $this->home_model->get_all_data('countries');
	        $data['results'] = $this->home_model->get_data_by_id($id, 'tbl_register'); 
	        $this->load->view('admin/users/edit', $data);
	        $this->load->view('admin/include/footer');
	    } else {
	        $id = $this->input->post('id');	        
        	$user_id = $this->session->userdata('user_id');	        
	        $data = array(
                'fullname' => $this->input->post('stdName'),
                'ageGroup' => $this->input->post('ageGroup'),
                'email' => $this->input->post('email'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'country' => $this->input->post('country'),
                'mob' => $this->input->post('mobileNo'),
                'sclname' => $this->input->post('schoolName'),
                'branch' => $this->input->post('branch'),
                'status' => $this->input->post('status'),
                'remarks' => $this->input->post('remark'),
                // 'userid' => $this->input->post('userId'),
                'class_id' => $this->input->post('class'),
                'section' => $this->input->post('section'),
                'update_date' => date('Y-m-d H:i:s'),
                'activated_by' => $user_id,
            );
	        if ($this->home_model->update_data('tbl_register',$data,$id)) {
	            $this->session->set_flashdata('success', 'Record updated successfully!');
	            redirect(base_url('user-list'));
	        } else {
	            $this->session->set_flashdata('error', 'Something went wrong.');
	            redirect(base_url('edit-user/'.$id));

	        }
	    }
	}

	public function show($userId) {
		if (!check_permission('Users', ucfirst('view'))) {		
		    $this->session->set_flashdata('error', 'You do not have permission to access this module.');
		   redirect(base_url('admin-dashboard'));
		}	
	    if (empty($userId)) {
	        redirect(base_url('admin-dashboard'));
	    }

	    $data['results'] = $this->home_model->get_data_by_id($userId, 'tbl_register'); 
	
	    if (empty($data['results'])) {
	        $this->session->set_flashdata('error', 'User not found.');
	        redirect(base_url('admin-dashboard'));
	    }

		$data['user_types'] = $this->home_model->get_all_data('roles');
	    $this->load->view('admin/include/header');
	    $this->load->view('admin/include/sidebar');
	    $this->load->view('admin/users/show', $data); 
	    $this->load->view('admin/include/footer');
	}

    public function delete($id) {
    	if (!check_permission('Users', ucfirst('delete'))) {		
		    $this->session->set_flashdata('error', 'You do not have permission to access this module.');
		    redirect(base_url('admin-dashboard'));
		}
	    if ($this->home_model->delete_record($id,'tbl_register')) {
	        $this->session->set_flashdata('success', 'Record deleted successfully!');
	    } else {
	        $this->session->set_flashdata('error', 'Failed to delete the record.');
	    }
	    
	    redirect('user-list');
	}

	



	public function import()
	{
		
        if (!check_permission('Users', ucfirst('add'))) {		
		    $this->session->set_flashdata('error', 'You do not have permission to access this module.');
		   redirect(base_url('admin-dashboard'));
		}
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/sidebar');
		$this->load->view('admin/users/import');
		$this->load->view('admin/include/footer');
	}


	public function importStore()
	{
	    if (isset($_FILES['csv_file']['name']) && $_FILES['csv_file']['name'] != '') {
	        $file_info = pathinfo($_FILES['csv_file']['name']);
	        if ($file_info['extension'] !== 'csv') {
	            $this->session->set_flashdata('error', 'Only CSV files are allowed!');
	            redirect(base_url('import-user'));
	            return;
	        }

	        $file = $_FILES['csv_file']['tmp_name'];
	        $handle = fopen($file, "r");

	        $data = [];
	        $headerSkipped = false;
	        $user_id = $this->session->userdata('user_id');
	        $duplicate_users = [];

	        while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
	            if (!$headerSkipped) { 
	                $headerSkipped = true; 
	                continue; 
	            }

	            if (empty($row[0])) {
	                $this->session->set_flashdata('error', 'Name field is empty in the CSV file. Please provide a valid Name');
	                redirect(base_url('import-user'));
	                return;
	            }


	            $status = '0';
	            $country_id = '';
	            $state_id = '';
	            $city_id = '';
	            $userid = '';
	            if (!empty($row[1])) {
	                $userid = $row[1];	                
	                $existing_user =get_user_by_userid($userid);
	                if (!empty($existing_user)) {
	                    $duplicate_users[] = $userid; 
	                    continue;
	                }
	            } else {
	                $this->session->set_flashdata('error', 'User ID field is empty in the CSV file. Please provide a valid User ID');
		            redirect(base_url('import-user'));
		            return;
	            }

	            if ($row[13] != '' && (strtolower($row[13]) == 'active' || $row[13] == '1')) {
	                $status = '1';
	            } else {
	                $status = '0';
	            }

	            // Get Country ID
	            if (!empty($row[10])) {
	                $cname = strtolower(trim($row[10]));
	                $country = get_country_name($cname);
	                if (!empty($country)) {
	                    $country_id = $country->id;
	                }
	            }

	            // Get State ID
	            if (!empty($row[10]) && !empty($row[11])) {
	                $sname = strtolower(trim($row[11]));
	                $state = get_state_name($sname, $country_id);
	                if (!empty($state)) {
	                    $state_id = $state->id;
	                }
	            }

	            // Get City ID
	            if (!empty($row[10]) && !empty($row[11]) && !empty($row[12])) {
	                $cityname = strtolower(trim($row[12]));
	                $city = get_city_name($cityname, $state_id);
	                if (!empty($city)) {
	                    $city_id = $city->id;
	                }
	            }

	            $data[] = [
	                'fullname'  => $row[0],
	                'userid' => $userid,
	                'password' => md5($row[2]),
	                'ageGroup' => $row[3],
	                'email' => $row[4],
	                'mob' => $row[5],
	                'sclname' => $row[6],
	                'branch' => $row[7],
	                'class_id' => $row[8],
	                'section' => $row[9],
	                'country' => $country_id,
	                'state' => $state_id,
	                'city' => $city_id,
	                'status' => $status,
	                'remarks' => $row[14],
	                'created_date' => date('Y-m-d H:i:s'),
	                'activated_by' => $user_id
	            ];
	        }
	        fclose($handle);

	        if (!empty($data)) {
	            // Insert data into the database
	            $this->home_model->insert_batch('tbl_register', $data);
	            $this->session->set_flashdata('success', 'CSV data imported successfully!');
	        }

	        if (!empty($duplicate_users)) {
	            $this->session->set_flashdata('error', 'Some User IDs already exist: ' . implode(', ', $duplicate_users) . '. Please provide a unique User ID');
	        }

	        redirect(base_url('import-user'));
	    } else {
	        $this->session->set_flashdata('error', 'Please upload a CSV file!');
	        redirect(base_url('import-user'));
	    }
	}


	

}
