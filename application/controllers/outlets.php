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
		$outlets = $this->Outlet_model->getUserOutlets($this->session->userdata('user_id'));
		// if > 1 outlet - go to main dashboard
		if(count($outlets) > 1) {
			$data['outlets'] = $outlets;
			$data['main'] = 'back/outlets/index';
			$this->load->view('back/template/template', $data);
		} else {
			// redirect to single outlet dashboard
			redirect('outlets/dashboard');
		}
		
	}
	
	public function dashboard()
	{
		// main outlet dashboard - single outlet
		// check if outlet_id is set in session, otherwise get their single outlet
		if($this->session->userdata('outlet_id')) {
			$data['outlet'] = $this->Outlet_model->getOutlet($this->session->userdata('outlet_id'));
		} else {
			$data['outlet'] = $this->Outlet_model->getUserSingleOutlet($this->session->userdata('user_id'));
		}
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
	
	public function update_outlet()
	{
		$id = $_POST['outlet_id'];
		$this->form_validation->set_rules('business_name', 'Business Name', 'required');

		if($this->form_validation->run() == false) {
			$data['error_msg'] = "There was an error updating your outlet details";
			$data['main'] = 'back/outlets/edit/'.$id;
			$this->load->view('back/template/template', $data);
		} else {
			$website = prep_url($this->input->post('website'));
			$data = array(
				'reference' => $this->input->post('reference'),
				'business_name' => $this->input->post('business_name'),
				'street' => $this->input->post('street'),
				'town' => $this->input->post('town'),
				'county' => $this->input->post('county'),
				'postcode' => $this->input->post('postcode'),
				'telephone' => $this->input->post('telephone'),
				'mobile' => $this->input->post('mobile'),
				'fax' => $this->input->post('fax'),
				'website' => $website
				);
				
			$updated = $this->Outlet_model->updateOutlet($id, $data);
			if($updated) {
				$this->session->set_flashdata('success', 'Your outlet details have been updated.');
				redirect('outlets/');
			} else {
				$this->session->set_flashdata('error', 'There was an error updating the outlet details');
				redirect('outlets/edit/'.$id);
			}
		}
	}




}