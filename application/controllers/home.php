<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{
		$data['main'] = "front/home/index";
		$this->load->view('front/template/template', $data);
	}


	public function about()
	{
		$data['main'] = "front/home/about";
		$this->load->view('front/template/template', $data);
	}

	public function features()
	{
		$data['main'] = "front/home/features";
		$this->load->view('front/template/template', $data);
	}

	public function pricing()
	{
		$data['plans'] = $this->Plan_model->getActivePlansForPricingPage();
		$data['main'] = "front/home/pricing";
		$this->load->view('front/template/template', $data);
	}

	public function contact()
	{
		$data['main'] = "front/home/contact-us";
		$this->load->view('front/template/template', $data);
	}


	public function blog()
	{
		$data['main'] = "front/home/blog";
		$this->load->view('front/template/template', $data);	
	}

}
