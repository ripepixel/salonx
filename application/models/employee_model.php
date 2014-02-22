<?php

class Employee_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

   
    function getEmployeeOutlet($emp_id)
    {
    	$this->db->where('user_id', $emp_id);
    	$q = $this->db->get('employees');
    	if($q->num_rows() == 1) {
    		$q->row();
    		return $q->outlet_id;
    	} else {
    		return FALSE;
    	}
    }

		function getEmployees($uid)
		{
			// get business id
			$this->db->where('user_id', $uid);
			$q = $this->db->get('businesses');
			$row = $q->row();
			
			// get employees for business
			$this->db->where('business_id', $row->id);
			$qry = $this->db->get('employees');
			return $qry->result_array();
		}







}