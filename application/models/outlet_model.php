<?php

class Outlet_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

   function getOutlet($id)
   {
   		$this->db->where('id', $id);
   		$q = $this->db->get('outlets');
   		return $q->row();
   }


    function createOutlet($data)
    {
    	$this->db->insert('outlets', $data);
    	$id = $this->db->insert_id();
    	return $id;
    }

    function addOutletAccess($oid, $uid)
    {
    	$data = array(
    		'outlet_id' => $oid,
    		'user_id' => $uid
    		);
    	$this->db->insert('outlet_access', $data);
    	return TRUE;
    }

    function userHasAccess($oid, $uid)
    {
    	$this->db->where('outlet_id', $oid);
    	$this->db->where('user_id', $uid);
    	$q = $this->db->get('outlet_access');
    	if($q->num_rows() == 1) {
    		return TRUE;
    	} else {
    		return FALSE;
    	}
    }

}