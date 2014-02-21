<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Outlets extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('Outlet_model');
		$this->User_model->isValidated();
	}


	public function index()
	{
		// display all outlets for manager or redirect if only one - MANAGERS ONLY ACCESS
		$data['outlets'] = $this->Outlet_model->getUserOutlets($this->session->userdata('user_id'));
		$data['main'] = 'back/outlets/index';
		$this->load->view('back/template/template', $data);
	}
	
	public function dashboard()
	{
		// main outlet dashboard - single outlet
		$data['outlet'] = $this->Outlet_model->getUserSingleOutlet($this->session->userdata('user_id'));
		$data['main'] = 'back/outlets/dashboard';
		$this->load->view('back/template/template', $data);
	}


	public function edit()
	{
		$oid = $this->uri->segment(3);
		$has_outlet_access = $this->Outlet_model->userHasAccess($oid, $this->session->userdata('user_id'));
		if($has_outlet_access) {
			// check if has permission to edit
			if($this->User_model->hasPermission($this->session->userdata('user_id'), "edit_outlet")) {
				// display outlet edit form
				$data['outlet'] = $this->Outlet_model->getOutlet($oid);
				$data['main'] = 'back/outlets/edit';
				$this->load->view('back/template/template', $data);
			} else {
				// redirect to outlet dashboard
				$this->session->set_flashdata('error', 'Sorry, you do not have permission to do that.');
				redirect('outlets/');
			}

		} else {
			$this->session->set_flashdata('error', 'You can not access that outlet');
			redirect('outlets/');
		}
	}




}