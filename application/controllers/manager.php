<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manager extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('Business_model');
		$this->User_model->isValidated();
		$this->User_model->isManager();
	}


	public function index()
	{
		// check if user has set-up a business		
		if($this->Business_model->userHasBusiness($this->session->userdata('user_id'))) {
			// get their outlets
			// if 1 outlet - go to outlet dashboard
			// if > 1 outlet - display outlets 
		} else {
			$this->session->set_flashdata('error', 'You need to add your business details first');
			redirect('businesses/create');
		}
	}






	

}