<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Launch extends CI_Controller {

	
	public function login()
	{
		$data['main'] = "front/launch/login";
		$this->load->view('front/template/template', $data);
	}
	
	public function login_process()
	{
		$this->form_validation->set_rules('email', 'Email address', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		
		if($this->form_validation->run() == false) {
			$data['main'] = "front/launch/login";
			$this->load->view('front/template/template', $data);
		} else {
			// check login details
			$email = $this->input->post('email');
			$pass = $this->input->post('password');
			$sec_pass = md5($pass); // secure password before transmitting
			$result = $this->User_model->validateUser($email, $sec_pass);
			if($result) {				
				// redirect to dashboard/list of outlets
				$user_type = $this->session->userdata('user_type');
				if($user_type == 'manager') {
					// send to list of outlets
					redirect('manager/');
				} elseif ($user_type == 'employee') {
					// send to outlet
					redirect('outlets/');
				} elseif ($user_type == 'client') {
					// send to client dashboard
				}
			} else {
				// login errors
				$this->session->set_flashdata('error', 'There were errors logging in. Please check your email address and password are correct');
				redirect('launch/login');
			}
		}
		
	}
	
	public function signup()
	{
		$data['main'] = "front/launch/signup";
		$this->load->view('front/template/template', $data);
	}

	public function signup_process()
	{
		$this->form_validation->set_rules('email', 'Email address', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('plan','Plan','required|callback_check_default');

		if($this->form_validation->run() == false) {
			$data['main'] = "front/launch/signup";
			$this->load->view('front/template/template', $data);
		} else {
			// create account
			$email = $this->input->post('email');
			$pass = $this->input->post('pass');
			$sec_pass = md5($pass);
			$plan_id = $this->input->post('plan');

			$this->User_model->createManagerUser($email, $sec_pass, $plan_id, TRUE);

			redirect('manager/');
		}
	}
	
	
	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('success', 'You have now logged out');
		redirect('launch/login');
	}
	



	// form call-back for select box (single entry)
	function check_default($post_string)
	{
	  return $post_string == '' ? FALSE : TRUE;
	}
	

}
