<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();        
        notLogged_in();
    }

	public function index()
	{
		
		redirect('admin-login');
	}



	public function send_test_email() {
        $to = 'shyammilan.wie@gmail.com';
        $subject = 'Test Email';
        $data = [
            'name' => 'Shyam Yadav',
            'dynamic_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        ];
       echo  $message = $this->load->view('email_template', $data, TRUE);die;
        $result = send_email($to, $subject, $message);
        if ($result === TRUE) {
            echo 'Email sent successfully!';
        } else {
            echo 'Error sending email: ' . $result;
        }
    }

}
