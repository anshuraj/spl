<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auction extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

         $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");

        $this->output->set_header("Pragma: no-cache");   
        $this->output->set_content_type('application_json');     

        $this->load->database();
        $this->load->helper('url');
        $this->load->model('player_model');
	}

	public function index(){

		$data['player'] = $this->player_model->ScramblePlayer();
		$this->load->view('auction', $data);
	}

	public function play(){

		$res = $this->player_model->ScramblePlayer();
		if($res == TRUE){
			$this->output->set_output(json_encode($res));
		}
	}
}