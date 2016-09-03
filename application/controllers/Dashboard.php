<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

         $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");

        $this->output->set_header("Pragma: no-cache");   

        $this->load->database();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->helper('array');
		$this->load->model('dashboard_model');
	}

	public function index()
	{
		if($this->session->userdata('username') && $this->session->userdata('password') ){
			if($this->dashboard_model->checkLogin($this->session->userdata('username'), $this->session->userdata('password'))){
			$this->load->view('dashboard');
		}
		else{
			redirect(site_url(), 'refresh');
		}
	}
    else{
    	redirect(site_url(), 'refresh');
    }

	}
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */