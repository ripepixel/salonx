<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Launch extends CI_Controller {

	
	public function login()
	{
		$data['main'] = "front/launch/login";
		$this->load->view('front/template/template', $data);
	}
	
	public function login_process()
	{
		$this->form_validation->set_rules('email', 'Email address', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		
		if($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', 'There were errors logging in');
			$data['main'] = "front/launch/login";
			$this->load->view('front/template/template', $data);
		} else {
			// check login details
			$email = $this->input->post('email');
			$pass = $this->input->post('password');
			$sec_pass = md5($pass); // secure password before transmitting
			if($this->User_model->validateUser($email, $sec_pass)) {
				// get user details
				
				// set session data
				
				// redirect to dashboard/list of outlets
			} else {
				// login errors
				$this->session->set_flashdata('error', 'There were errors logging in');
				redirect('launch/login');
			}
		}
		
	}
	
	public function signup()
	{
		$data['main'] = "front/launch/signup";
		$this->load->view('front/template/template', $data);
	}
	
	
	
	
	
}
