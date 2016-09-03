<?php 

class Team_model extends CI_Model {
    
    public  function __construct() {
        parent::__construct();
    }
    
    
    public function getTeamDetails($id)
    {
        $query = $this->db->get('players');
        if($query->num_rows()>0)
        {
            return $query->result_array();;
        }
        return FALSE;
    }

    public function saveTeam($data)
    {
        $query = $this->db->insert('teams', $data);
        if($this->db->insert_id())
            return TRUE;
        else
            return FALSE;
    }

    public function getPlayers($id){
        $query = $this->db->get_where('players', array('team_id'=> $id));
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }
        return FALSE;
    }
}