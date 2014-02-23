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
		// check if have enough space to create new employee
		
		if($this->User_model->hasPermission($this->session->userdata('user_id'), "create_employee")) {
			$this->load->model('Outlet_model');
			$data['main'] = 'back/employees/create';
			$this->load->view('back/template/template', $data);
		} else {
			// redirect to outlet dashboard
			$this->session->set_flashdata('error', 'Sorry, you do not have permission to do that.');
			redirect('employees/');
		}
	}
	
	function create_employee()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]|min_length[4]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if($this->form_validation->run() == FALSE) {
			$data['error_msg'] = "There were errors with the details. Please check and try again.";
			$this->load->model('Outlet_model');
			$data['main'] = 'back/employees/create';
			$this->load->view('back/template/template', $data);
		} else {
			// create user
			$sec_pass = md5($this->input->post('password'));
			$plan_id = $this->User_model->getUserPlan($this->session->userdata('user_id'));
			$data = array(
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' => $sec_pass,
				'plan_id' => $plan_id,
				'is_employee' => 1,
				'is_active' => 1,
				'created_at' => time()
			);
			$uid = $this->User_model->createEmployeeUser($data);
			// create employee
			$this->load->model('Business_model');
			$bus_id = $this->Business_model->getUserBusiness($this->session->userdata('user_id'));
			$data = array(
				'user_id' => $uid,
				'business_id' => $bus_id->id
			);
			$emp_id = $this->Employee_model->createEmployee($data);
			// create employee details
			$data = array(
				'employee_id' => $emp_id,
				'title' => $this->input->post('title'),
				'first_name' => $this->input->post('first_name'),
				'surname' => $this->input->post('surname'),
				'gender' => $this->input->post('gender'),
				'address' => $this->input->post('address'),
				'dob' => date("Y-m-d",strtotime($this->input->post('dob'))),
				'national_insurance' => $this->input->post('national_insurance'),
				'telephone' => $this->input->post('telephone'),
				'mobile' => $this->input->post('mobile'),
				'start_date' => date("Y-m-d",strtotime($this->input->post('start_date')))
			);
			$this->Employee_model->createEmployeeDetails($data);
			// create outlet access
			$this->load->model('Outlet_model');
			$oid = $this->input->post('outlet_id');
			$this->Outlet_model->addOutletAccess($oid, $uid);
			// create employee hours
			$data = array(
				'employee_id' => $emp_id,
				'monday_start' => $this->input->post('monday_start'),
				'monday_finish' => $this->input->post('monday_finish'),
				'tuesday_start' => $this->input->post('tuesday_start'),
				'tuesday_finish' => $this->input->post('tuesday_finish'),
				'wednesday_start' => $this->input->post('wednesday_start'),
				'wednesday_finish' => $this->input->post('wednesday_finish'),
				'thursday_start' => $this->input->post('thursday_start'),
				'thursday_finish' => $this->input->post('thursday_finish'),
				'friday_start' => $this->input->post('friday_start'),
				'friday_finish' => $this->input->post('friday_finish'),
				'saturday_start' => $this->input->post('saturday_start'),
				'saturday_finish' => $this->input->post('saturday_finish'),
				'sunday_start' => $this->input->post('sunday_start'),
				'sunday_finish' => $this->input->post('sunday_finish')
			);
			$this->Employee_model->createEmployeeHours($data);
			
			$this->session->set_flashdata('success', 'The employee has been created successfully.');
			redirect('employees/');
		}
		
	}
	
	
	
	
	
}