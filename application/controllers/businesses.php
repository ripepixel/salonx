<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Businesses extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('Outlet_model');
		$this->load->model('Business_model');
		$this->User_model->isValidated();
		$this->User_model->isManager();
	}


	public function index()
	{
		
	}

	public function create()
	{
		// if has a business - redirect to edit
		if($this->Business_model->userHasBusiness($this->session->userdata('user_id'))) {
			redirect('businesses/edit');
		} else {
			$data['main'] = 'back/businesses/create';
			$this->load->view('back/template/template', $data);
		}
		
	}

	public function create_business()
	{
		$this->form_validation->set_rules('business_name', 'Business Name', 'required');

		if($this->form_validation->run() == false) {
			$data['error_msg'] = "There was an error creating your business details";
			$data['main'] = 'back/businesses/create';
			$this->load->view('back/template/template', $data);
		} else {
			// create business
			$website = prep_url($this->input->post('website'));
			$data = array(
				'user_id' => $this->session->userdata('user_id'),
				'plan_id' => $this->User_model->getUserPlan($this->session->userdata('user_id')),
				'business_name' => $this->input->post('business_name'),
				'street' => $this->input->post('street'),
				'town' => $this->input->post('town'),
				'county' => $this->input->post('county'),
				'postcode' => $this->input->post('postcode'),
				'telephone' => $this->input->post('telephone'),
				'mobile' => $this->input->post('mobile'),
				'fax' => $this->input->post('fax'),
				'website' => $website,
				'is_active' => 1,
				'created_at' => time()
				);
			$created = $this->Business_model->createBusiness($data);
			if($created) {
				// create outlet from business details, if requested and redirect to outlet edit form
				$create_outlet = (isset($_POST['create_outlet']))? TRUE : FALSE;
				if($create_outlet) {
					$data = array(
						'business_id' => $created,
						'reference' => $this->input->post('business_name'),
						'business_name' => $this->input->post('business_name'),
						'street' => $this->input->post('street'),
						'town' => $this->input->post('town'),
						'county' => $this->input->post('county'),
						'postcode' => $this->input->post('postcode'),
						'telephone' => $this->input->post('telephone'),
						'mobile' => $this->input->post('mobile'),
						'fax' => $this->input->post('fax'),
						'website' => $website,
						'is_active' => 1,
						'created_at' => time(),
						'user_id' => $this->session->userdata('user_id')
						);
					$outlet_id = $this->Outlet_model->createOutlet($data);

					// give manager access to outlet
					$this->Outlet_model->addOutletAccess($outlet_id, $this->session->userdata('user_id'));

					// send to edit outlet
					$this->session->set_flashdata('success', 'Great, your business and outlet has been created. You can edit your outlet below.');
					redirect('outlets/edit/'.$outlet_id);
				}

				// send to create outlet
				$this->session->set_flashdata('success', 'Great, your business has been created. Now create an outlet.');
				redirect('outlets/create');

			} else {
				$data['error_msg'] = "There was an error creating your business details";
				$data['main'] = 'back/businesses/create';
				$this->load->view('back/template/template', $data);
			}
			
		}

	}
	
	public function edit()
	{
		$data['business'] = $this->Business_model->getUserBusiness($this->session->userdata('user_id'));
		$data['main'] = 'back/businesses/edit';
		$this->load->view('back/template/template', $data);
	}


}