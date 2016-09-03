<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Regplayer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

        // $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");

        $this->output->set_header("Pragma: no-cache");        

        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');
		$this->load->model('dashboard_model');
		$this->load->model('player_model');
	}

	public function index($id=Null)
	{
		if($this->session->userdata('username') && $this->session->userdata('password') ){
			if($this->dashboard_model->checkLogin($this->session->userdata('username'), $this->session->userdata('password'))){
				$this->load->view('regplayer');
			}
		else{
			redirect(site_url(), 'refresh');
		}
	}
    else{
    	redirect(site_url(), 'refresh');
    }
	}

	public function savePlayer() {

		$this->output->set_content_type('application_json');
		$this->form_validation->set_rules('name', 'name', 'trim|required|is_unique[players.player_name]');
		$this->form_validation->set_rules('year', 'year', 'trim|required');
		$this->form_validation->set_rules('branch', 'branch', 'trim|required');
		$this->form_validation->set_rules('player_type', 'player_type', 'trim|required');

		if($this->form_validation->run()===FALSE)
		{
			$this->output->set_output(json_encode([
			  'error'=>1,
			  'message'=> validation_errors() 
			]));
			return false ;
		}

      	else {
			$name = $this->input->post('name');
			$year = $this->input->post('year');
			$branch = $this->input->post('branch');
			$type = $this->input->post('player_type');

			$data = [
				'player_name' => $name,
				'player_year' => $year,
				'player_branch' => $branch,
				'player_type' => $type
			];

			$res = $this->player_model->savePlayer($data);

			if($res == TRUE){
				$this->output->set_output(json_encode([
		            'status'=>1,
		            'message'=> 'Saved'
		        ]));
			} else {
				$this->output->set_output(json_encode([
		            'status'=> 0,
		            'message'=> 'Data not saved'
		        ]));
			}
		}
	}
}

/* End of file regplayer.php */
/* Location: ./application/controllers/regplayer.php */