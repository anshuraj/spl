<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Makecaptain extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

        // $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");

        $this->output->set_header("Pragma: no-cache");        
		$this->output->set_content_type('application_json');

        $this->load->database();
        $this->load->helper('url');
        $this->load->library('session');

        $this->load->library('form_validation');
		$this->load->model('makecaptain_model');
		$this->load->model('main_model');
		$this->load->model('dashboard_model');
		

	}

	public function index($id=Null)
	{
		if($this->session->userdata('username') && $this->session->userdata('password') ){
			if($this->dashboard_model->checkLogin($this->session->userdata('username'), $this->session->userdata('password'))){
				$data['team'] = $this->main_model->getTeam();
				$this->load->view('makecaptain', $data);
			}
		else{
			redirect(site_url(), 'refresh');
		}
		}
	    else{
	    	redirect(site_url(), 'refresh');
	    }

	}

	public function getPlayer($id=Null) {
		$res = $this->makecaptain_model->getPlayers($id);
		if($res == TRUE){
			$this->output->set_output(json_encode($res));
		}
	}

	public function saveCaptain() {

		$team = $this->input->post('team');
		$captain = $this->input->post('list');
		
		$data = ['team_captain' => $captain ];

		$res = $this->makecaptain_model->saveCaptain($team, $data);

		if($res == TRUE){
			$this->output->set_output(json_encode([
	            'status'=>1,
	            'message'=> 'Saved'
	        ]));
		} else {
			$this->output->set_output(json_encode([
	            'status'=> 0,
	            'message'=> 'Data not saved',
	            'res' => $res
	        ]));
		}
		
	}
}

/* End of file makecaptain.php */
/* Location: ./application/controllers/makecaptain.php */