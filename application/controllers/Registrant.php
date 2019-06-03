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

	// ======================================================================
	// NOTE: DASHBOARD FUNCTIONS
	// ======================================================================

	//
	// Dashboard's main regigistrants page
	// NOTE: Only shows the list of events
	//
	
	public function db_index()
	{
		// Fetch events and include register count
		$events = $this->event->fetch();
		foreach ($events as $key => $event) :
			$events[$key]['reg_count'] = $this->registrant->get_count($event['id']);
		endforeach;

		$data['events'] = $events;
		$data['title'] = 'Dashboard | Registrants';

		$this->load->view('templates/header', $data);
		$this->load->view('dashboard/registrants/index', $data);
		$this->load->view('templates/footer', $data);
	}
		
	//
	// Regigistrants page per event
	// NOTE: Lists all registrants under an event
	//

	public function db_single($event_id)
	{	
		// Get registrants
		$data['event'] = $this->event->fetch($event_id);
		if (empty($data['event'])) :
			show_404();
		endif;
		
		$data['registrants'] = $this->registrant->get_registrants($event_id);
		$data['title'] = 'Dashboard | Registrants';

		$this->load->view('templates/header', $data);
		$this->load->view('dashboard/registrants/single', $data);
		$this->load->view('templates/footer', $data);
	}


	//
	// Update registrant status
	//

	public function update_status($event_id)
	{
		$reg_id = $this->input->post('reg_id');
		$new_status = $this->input->post('status');

		$this->registrant->update_status($reg_id, $new_status);
		redirect('/dashboard/registrants/'.$event_id);

	}
}