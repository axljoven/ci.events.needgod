<?php

class Registrant extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('event_model', 'event');
		$this->load->model('registrant_model', 'registrant');
		$this->load->library('session');
	}
	
	/**
	 * ------------------------------------------------------------
	 * Register new
	 * ------------------------------------------------------------
	 */
	
	public function register( $event_id ) {
		$this->load->helper( 'form' );
		$this->load->library( 'form_validation' );
		
		// If validation failed, return to registration page
		if ( $this->form_validation->run( 'registration' ) == FALSE ) :
			$data['event'] = $this->event->fetch( $event_id );
			$data['title'] = "Event | " . $data['event']['title'];
			$this->load->view( 'templates/header', $data );
			$this->load->view( 'pages/events/single', $data );
			$this->load->view( 'templates/footer', $data );
			
		// If successful, send email and save to DB
		else :
			$data['event'] = $this->event->fetch( $event_id );
			$data['title'] = "Registered | " . $data['event']['title'];
			$data['name'] = $data['event']['title'];
			$data['id'] = $data['event']['id'];
				
			// TODO: Send email
			// NOTE: Coming soon!
			// $this->send_confirm_email();	

			// Save to database and show success page
			$this->registrant->create();
			$this->load->view( 'templates/header', $data );
			$this->load->view( 'pages/events/reg-success', $data );
			$this->load->view( 'templates/footer', $data );
		endif;
	}
		
	/**
	 * ------------------------------------------------------------
	 * TODO: Coming soon!!! Send confirmation email
	 * ------------------------------------------------------------
	 * - Can't continue the development because the project
	 * - hasn't been transfered to the server
	 * 
	 */
		
	private function send_confirm_email() {
		$this->load->library( 'email' );

		$this->email->from( 'your@example.com', 'NeedGod Ministries' );
		$this->email->to( 'axlmorenojoven@gmail.com' );
		$this->email->cc( 'axl_joven@yahoo.com' );
		// $this->email->bcc('them@their-example.com');
		
		$this->email->subject( 'Email Test' );
		$this->email->message( 'Testing the email class.' );
		$this->email->send();
		
		// Check if email sending is successful
	}

	/**
	 * ================================================================================
	 * NOTE: DASHBOARD FUNCTIONS
	 * ================================================================================
	 */

	/**
	 * ------------------------------------------------------------
	 * Check existing session
	 * ------------------------------------------------------------
	 */
	
	public function check_existing_session() {
		if ( !$this->session->has_userdata( 'logged_in' ) && !$this->session->has_userdata( 'username' ) ) : 
                  redirect( 'login' ); 
            endif; 
      }

	/**
	 * ------------------------------------------------------------
	 * Index Page
	 * ------------------------------------------------------------
	 * - Shows the lists of events with registrants count
	 * 
	 */
	
	public function db_index() {
		// Check session before proceeding    
		$this->check_existing_session();
		
		// Fetch events and include register count
		$events = $this->event->fetch();
		foreach ( $events as $key => $event ) :
			$events[ $key ][ 'reg_count' ] = $this->registrant->get_count( $event[ 'id' ] );
		endforeach;
		
		$data['events'] = $events;
		$data['title'] = 'Dashboard | Registrants';
		$this->load->view( 'templates/header', $data );
		$this->load->view( 'dashboard/registrants/index', $data );
		$this->load->view( 'templates/footer', $data );
	}
	
	/**
	 * ------------------------------------------------------------
	 * Regigistrants page per event
	 * ------------------------------------------------------------
	 * - Shows registrants per event
	 * 
	 */
	
	public function db_single( $event_id ) {	
		// Check session before proceeding    
		$this->check_existing_session();
		
		// Get registrants
		$data['event'] = $this->event->fetch( $event_id );
		if ( empty( $data['event'] ) ) :
			show_404();
		endif;

		$data['registrants'] = $this->registrant->get_registrants( $event_id );
		$data['title'] = 'Dashboard | Registrants';
		$this->load->view( 'templates/header', $data );
		$this->load->view( 'dashboard/registrants/single', $data );
		$this->load->view( 'templates/footer', $data );
	}
	
	/**
	 * ------------------------------------------------------------
	 * Update registrant status
	 * ------------------------------------------------------------
	 */

	public function update_status( $event_id ) {
		// Check session before proceeding    
		$this->check_existing_session();

		$reg_id = $this->input->post('reg_id');
		$new_status = $this->input->post('status');
		$this->registrant->update_status($reg_id, $new_status);

		redirect('/dashboard/registrants/'.$event_id);
	}
}