<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/login_model');
    }

	public function index()
	{
        logged_in();
		$this->load->view('admin/login/index');
	}


	public function authenticate() {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        if ($this->form_validation->run() === FALSE) {
    		$this->load->view('admin/login/index');
        } else {
            $email = $this->input->post('email',true);
            $password = md5($this->input->post('password',true));
            $email = $this->security->xss_clean($email);
            $password = $this->security->xss_clean($password);
            $result = $this->login_model->authenticate_user($email, $password);
           	if (!empty($result)) {
           		$session = [
           			'user_id'=>$result->id,
                    'user_name'=>$result->name,
                    'email'=>$result->email,
					'role_id'=>$result->user_type,
					'logged_in'	=>true
           		];
                $this->session->set_userdata($session);
                $data=[
                    'LastLoggedIn' => date('Y-m-d H:i:s'),
                ];
                $this->login_model->update_data('admins', $data,$result->id);
                $this->session->set_flashdata('success', 'Successfully logged in!');              
                redirect(base_url('admin-dashboard'));

            } else {
                $this->session->set_flashdata('error', 'Invalid email or password.');
               redirect(base_url('admin-login'));

            }
        }
    }


    public function logout() {
        $this->session->sess_destroy();

        redirect(base_url('admin-login'));
    }
	
	
}
