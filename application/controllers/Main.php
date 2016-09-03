<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

         $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");

        $this->output->set_header("Pragma: no-cache");   
        $this->output->set_content_type('application_json');     

        $this->load->database();
        $this->load->helper('url');
        $this->load->library('session');
		$this->load->model('main_model');
	}

	public function index()
	{
		$data['team'] = $this->main_model->getTeam();
		$this->load->view('main', $data);
	}

	public function logout() {
		if($this->session->userdata('username')){
			$this->session->sess_destroy();
			redirect(site_url(), 'refresh');
		}
	}

	public function login(){

		$this->output->set_content_type('application_json');		

		$user = $this->input->post('username');
		$pass = $this->input->post('password');

		$data = ['username'=> $user, 'password'=> $pass];

		$res = $this->main_model->login($data);

		if($res == TRUE){
			$this->session->set_userdata($data);
				$this->output->set_output(json_encode([
		            'status'=>1,
		            'message'=> 'loggedin'
		        ]));
			} else {
				$this->output->set_output(json_encode([
		            'status'=> 0,
		            'message'=> 'invalid username or password'
		        ]));
		    }
	}	
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */