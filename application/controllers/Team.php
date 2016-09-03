<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Team extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");

        $this->output->set_header("Pragma: no-cache");        

        $this->load->database();
        $this->load->helper('url');
		$this->load->model('team_model');
	}

	public function index($id=Null)
	{
		$data['team'] = $this->team_model->getTeamDetails($id);
		$data['players'] = $this->team_model->getPlayers($id);

		$this->load->view('team', $data);
	}
}

/* End of file team.php */
/* Location: ./application/controllers/team.php */