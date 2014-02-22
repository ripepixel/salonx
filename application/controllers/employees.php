<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employees extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('Employee_model');
		$this->User_model->isValidated();
		$this->User_model->isManager();
	}
	
	public function index()
	{
		// check user has access
		if($this->User_model->hasPermission($this->session->userdata('user_id'), "view_employees")) {
			$data['employees'] = $this->Employee_model->getEmployees($this->session->userdata('user_id'));
			$data['main'] = 'back/employees/index';
			$this->load->view('back/template/template', $data);
		} else {
			// redirect to outlet dashboard
			$this->session->set_flashdata('error', 'Sorry, you do not have permission to do that.');
			redirect('outlets/');
		}
		
	}
	
	public function create()
	{
		if($this->User_model->hasPermission($this->session->userdata('user_id'), "create_employee")) {
			$data['main'] = 'back/employees/create';
			$this->load->view('back/template/template', $data);
		} else {
			// redirect to outlet dashboard
			$this->session->set_flashdata('error', 'Sorry, you do not have permission to do that.');
			redirect('outlets/');
		}
	}
	
	
	
	
	
}