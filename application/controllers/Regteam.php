<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Regteam extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

        // $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");

        $this->output->set_header("Pragma: no-cache");        

        $this->load->database();
        $this->load->helper('url');
        $this->load->library('session');
		$this->load->model('dashboard_model');
        
        $this->load->library('form_validation');
		$this->load->model('team_model');
	}

	public function index($id=Null)
	{
		if($this->session->userdata('username') && $this->session->userdata('password') ){
			if($this->dashboard_model->checkLogin($this->session->userdata('username'), $this->session->userdata('password'))){
				$this->load->view('regteam');
			}
		else{
			redirect(site_url(), 'refresh');
		}
	}
    else{
    	redirect(site_url(), 'refresh');
    }
	}

	public function saveTeam() {

		$this->output->set_content_type('application_json');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('owner', 'owner', 'trim|required');
		
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
			$owner = $this->input->post('owner');
			
			$data = [
				'team_name' => $name,
				'team_owner' => $owner,
			];

			$res = $this->team_model->saveTeam($data);

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

/* End of file regteam.php */
/* Location: ./application/controllers/regteam.php */