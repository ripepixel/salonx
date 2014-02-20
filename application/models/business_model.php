<?php

class Business_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }


    function userHasBusiness($uid)
    {
    	$this->db->where('user_id', $uid);
    	$q = $this->db->get('businesses');

    	if($q->num_rows() == 1) {
    		return TRUE;
    	} else {
    		return FALSE;
    	}
    }




}