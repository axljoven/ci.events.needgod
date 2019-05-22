<?php

class Events extends CI_Controller
{
	//
	// Initialize database library
	//

	public function __construct()
	{
		parent::__construct();
		$this->load->model('event_model', 'event');
		$this->load->model('registrant_model', 'registrant');
		$this->load->library('form_validation');
	}

	//
	// Single Event page
	//

	public function single($id)
	{
		$event = $this->event->fetch($id);
		
		if (!isset($event) || empty($event)) :
			show_404();
		endif;

		$data['event'] = $event;
		$data['title'] = "Event | " . $data['event']['title'];
		
		$this->load->view('templates/header.php', $data);
		$this->load->view('pages/events/single.php', $data);
		$this->load->view('templates/footer.php', $data);
	}

	// ======================================================================
	// NOTE: DASHBOARD FUNCTION
	// ======================================================================

	//
	// Dashboard's events index page
	// 

	public function db_index()
	{
		// Fetch events and include register count
		$events = $this->event->fetch();
		foreach ($events as $key => $event) :
			$events[$key]['reg_count'] = $this->registrant->get_count($event['id']);
		endforeach;

		$data['events'] = $events;
		$data['title'] = "Dashboard | Events";
            
            // Load view
            $this->load->view('templates/header', $data);
            $this->load->view('dashboard/events/index', $data);
            $this->load->view('templates/footer', $data);
	}

	//
	// Dashboard's single event page
	//

	public function db_single($id)
	{
		$event = $this->event->fetch($id);
		
		if (!isset($event) || empty($event)) :
			show_404();
		endif;

		$data['event'] = $event;
		$data['title'] = "Dashboard | " . $data['event']['title'];
		
		$this->load->view('templates/header.php', $data);
		$this->load->view('dashboard/events/single.php', $data);
		$this->load->view('templates/footer.php', $data);
	}

}