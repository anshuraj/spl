<?php 

class Main_model extends CI_Model {
    
    public  function __construct() {
        parent::__construct();
    }
    
    
    public function getTeam()
    {
        $query = $this->db->get('teams');
        if($query->num_rows()>0){
            return $query->result_array();;
        }
        return FALSE;
        
    }

    public function login($data){
        $query = $this->db->get_where('users', $data);
        if($query->num_rows()>0){
            return TRUE;
        } else {
            return FALSE;
        }
    }
}