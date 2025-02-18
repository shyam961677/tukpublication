<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/home_model');
        notLogged_in();
    }

	public function index()
	{
		
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/sidebar');
		$this->load->view('admin/dashboard');
		$this->load->view('admin/include/dashboardFooter');
	}



	

}
