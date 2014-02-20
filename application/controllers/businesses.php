<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Businesses extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->User_model->isValidated();
		$this->User_model->isManager();
	}


	public function index()
	{
		
	}

	public function create()
	{
		$data['main'] = 'back/businesses/create';
		$this->load->view('back/template/template', $data);
	}




}