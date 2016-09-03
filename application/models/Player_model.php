<?php 

class Player_model extends CI_Model {
    
    public  function __construct() {
        parent::__construct();
    }
    
    public function savePlayer($data){
        $query = $this->db->insert('players', $data);
        if($this->db->insert_id())
            return TRUE;
        else
            return FALSE;
    }

    public function getPlayers(){

        $this->db->order_by("player_name", "asc");
        $query = $this->db->get('players');
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }
        return FALSE;
    }

    public function ScramblePlayer(){

        // $this->db->order_by('rand()');
        $query = $this->db->get_where('players', array('team_id'=> 0));
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }
        return FALSE;
    }
}