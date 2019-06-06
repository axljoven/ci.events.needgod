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
		$this->load->library('session');
		$this->load->helper('url');
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
	// NOTE: DASHBOARD FUNCTIONS
	// ======================================================================



	      
      //
      // Check existing session
      //

	public function check_existing_session()
      {
            // Check if logged in 
		if ( !$this->session->has_userdata('logged_in') && 
		     !$this->session->has_userdata('username') ) : 
                  	redirect('login'); 
            endif; 
      }



	// 
	// Dashboard's events index page 
	// 

	public function db_index()
	{	
		// $this->check_existing_session();

		// Fetch events and include register count
		$events = $this->event->fetch();
		foreach ($events as $key => $event) :
			$events[$key]['reg_count'] = $this->registrant->get_count($event['id']);
		endforeach;

		$data['events'] = $events;
		$data['title'] = "Dashboard | Events";
		$data['misc'] = [
                  'logged_in' => $this->session->userdata('logged_in'),
                  'username' => $this->session->userdata('username'),
            ];
            
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
		$this->check_existing_session();

		// Fetch event
		$event = $this->event->fetch($id);
		if (!isset($event) || empty($event)) :
			show_404();
		endif;

		$data['registrants'] = $this->registrant->get_registrants($id);
		$data['event'] = $event;
		$data['title'] = "Dashboard | " . $data['event']['title'];
		$data['misc'] = [
                  'logged_in' => $this->session->userdata('logged_in'),
                  'username' => $this->session->userdata('username'),
            ];
		
		$this->load->view('templates/header.php', $data);
		$this->load->view('dashboard/events/single.php', $data);
		$this->load->view('templates/footer.php', $data);
	}



	//
	// Update event
	//

	public function db_update($id)
	{
		 if ($this->form_validation->run('update_event') == FALSE)  :
                  
			$event = $this->event->fetch($id);
			if (!isset($event) || empty($event)) :
				show_404();
			endif;

			$data['registrants'] = $this->registrant->get_registrants($id);
			$data['event'] = $event;
			$data['title'] = "Dashboard | " . $data['event']['title'];
			$data['misc'] = [
				'logged_in' => $this->session->userdata('logged_in'),
				'username' => $this->session->userdata('username'),
			];
                  
                  $this->load->view('templates/header', $data);
                  $this->load->view('dashboard/events/single', $data);
                  $this->load->view('templates/footer', $data);
                  
            else :
			
			$this->event->update($id);
                  redirect('dashboard/events/' . $id);

            endif;
	}
}