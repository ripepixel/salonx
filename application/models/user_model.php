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
				$row = $q->row();

				$outlet = '';
	            
	            // get user type
	            if($row->is_manager) {
	            	$user_type = 'manager';
	            } elseif ($row->is_employee) {
	            	$user_type = 'employee';
	            	// get employee outlet
	            	$outlet = $this->Outlet_model->getEmployeeOutlet($row->id);

	            } elseif ($row->is_client) {
	            	$user_type = 'client';
	            }

	    		$data = array(
	    			'user_id' => $row->id,
	    			'user_type' => $user_type,
	    			'outlet' => $outlet
	    		);
    			$this->session->set_userdata($data);

    			// set last login
    			$this->setLastLogin($row->id);

				return TRUE;
			} else {
				return FALSE;
			}
			
    }

    function isValidated()
    {
    	# check a user is logged in
    	if(!$this->session->userdata('user_type')) {
    		redirect('launch/login');
    	}
    }

    function isManager()
    {
    	if(!$this->session->userdata('user_type') == 'manager') {
    		// if employee - redirect to outlet dashboard
            // if client - redirect to client details dashboard

            // else just redirect to login page
            redirect('launch/login');
    	}
    }

    function createManagerUser($email, $pass, $plan, $login = NULL)
    {
    	// create the user
    	$data = array(
    		'email' => $email,
    		'password' => $pass,
    		'is_manager' => 1,
    		'plan_id' => $plan,
    		'is_active' => 1,
    		'created_at' => time()
    		);
    	$this->db->insert('users', $data);
        $uid = $this->db->insert_id();
        $this->createManagerPermissions($uid);

    	if($login) {
	    	// send to validateUser to log them in
	    	if($this->validateUser($email, $pass)) {
	    		return TRUE;
	    	} else {
	    		return FALSE;
	    	}
	    } else {
	    	return TRUE;
	    }
    }

    function setLastLogin($id)
    {
    	$this->db->where('id', $id);
    	$data = array(
    		'last_login' => time()
    		);

    	$this->db->update('users', $data);
    	return TRUE;
    }

    function getUserPlan($uid)
    {
        $this->db->where('id', $uid);
        $q = $this->db->get('users');
        $row = $q->row();

        return $row->plan_id;
    }


    function hasPermission($uid, $function)
    {
        $this->db->where('user_id', $uid);
        $this->db->where($function, 1);

        $q = $this->db->get('user_permissions');
        if($q->num_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function createManagerPermissions($uid)
    {
        // give the manager full permissions on creation of account
        $data = array(
            'user_id' => $uid,
            'create_outlet' => 1,
            'edit_outlet' => 1,
            'delete_outlet' => 1
            );
        $this->db->insert('user_permissions', $data);
        return TRUE;
    }


}