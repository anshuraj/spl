<?php

class Dashboard_model extends CI_Model {
    
    public  function __construct() {
        parent::__construct();
    }
    
    public function checkLogin($u, $p){
    	$data = array('username'=> $u, 'password'=>$p);
        $query = $this->db->get_where('users', $data);
        if($query->num_rows()>0){
            return TRUE;
        } else {
            return FALSE;
        }
    }
}