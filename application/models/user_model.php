<?php

class User_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }


    function validateUser($email, $password)
    {
			$this->db->where('email', $email);
			$this->db->where('password', $password);
			$q = $this->db->get('users');
			if($q->num_rows() == 1) {
				return TRUE;
			} else {
				return FALSE;
			}
			
    }

    


}