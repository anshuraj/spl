<?php 

class Makecaptain_model extends CI_Model {
    
    public  function __construct() {
        parent::__construct();
    }
    
    
    public function getPlayers($team_id)
    {
        $query = $this->db->get_where('players', array('team_id'=> $team_id));
        if($query->num_rows()>0)
        {
            return $query->result_array();;
        }
        return FALSE;
    }

    public function saveCaptain($team_id, $data)
    {
        $this->db->where('team_id', $team_id);
        $this->db->update('teams', $data);
        if($this->db->affected_rows()) {
            return TRUE;
        }
        else
            return FALSE;
    }
}