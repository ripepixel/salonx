<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Launch extends CI_Controller {

	
	public function login()
	{
		$data['main'] = "front/launch/login";
		$this->load->view('front/template/template', $data);
	}

	public function signup()
	{
		$data['main'] = "front/launch/signup";
		$this->load->view('front/template/template', $data);
	}
	
	public function signup_process()
	{
		$this->form_validation->set_rules('email', 'Email address', 'required|valid_email|is_unique[users.email]');
		
	}
}
