<?php

class Init extends CI_Controller
{   

	public function __construct()
	{
		parent::__construct();
		$this->load->model('event_model');
	}

	//
	// Home
	//

	public function index()
	{   
		// Fetch data
		$result = $this->event_model->fetch();        
		$data['events'] = $result;
		$data['title'] = "Welcome | NeedGod Events";
		$this->load->view('templates/header', $data);
		$this->load->view('pages/index', $data);
		$this->load->view('templates/footer', $data);
	}


	//
	// Login
	//

	public function login()
	{
		$data['title'] = "Login | NeedGod Events";
		$this->load->view('templates/header', $data);
		$this->load->view('pages/login', $data);
		$this->load->view('templates/footer', $data);
	}

}
