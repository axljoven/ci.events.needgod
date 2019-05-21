<?php

class Registrant extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('event_model', 'event');
		$this->load->model('registrant_model', 'registrant');
	}

	//
	// Register
	//

	public function register($event_id) 
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		if ($this->form_validation->run('registration') == FALSE) 
		{
			// validation failed
			$data['event'] = $this->event->fetch($event_id);
			$data['title'] = "Event | " .$data['event']['title'];
			
			// Load view
			$this->load->view('templates/header', $data);
			$this->load->view('pages/events/single', $data);
			$this->load->view('templates/footer', $data);
		
		} else 
		{
			// validation is a success 
			$data['event'] = $this->event->fetch($event_id);
			$data['title'] = "Registered | ".$data['event']['title'];
			$data['name'] = $data['event']['title'];
			$data['id'] = $data['event']['id'];
			
			// Send email
			// NOTE: Coming soon!
			// $this->send_confirm_email();
			
			// Save to database
			$this->registrant->create(); // good!
			
			// Load view
			$this->load->view('templates/header', $data);
			$this->load->view('pages/events/reg-success', $data);
			$this->load->view('templates/footer', $data);
		}
    	}

	//
	// NOTE: Coming soon!
	// Send confirmation email
	//

	private function send_confirm_email()
	{
		$this->load->library('email');

		$this->email->from('your@example.com', 'NeedGod Ministries');
		$this->email->to('axlmorenojoven@gmail.com');
		$this->email->cc('axl_joven@yahoo.com');
		// $this->email->bcc('them@their-example.com');

		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');

		$this->email->send();

		// Check if email sending is successful
	}
}