<?php 

class Bidding_model extends CI_Model {
    
    public  function __construct() {
        parent::__construct();
    }
    
    public function saveBid($player_id, $data)
    {
        $this->db->where('player_id', $player_id);
        $this->db->update('players', $data);
        if($this->db->affected_rows()) {
            return TRUE;
        }
        else
            return FALSE;
    }
}