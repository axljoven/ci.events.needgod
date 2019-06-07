<?php

class Events extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper( 'url' );
		$this->load->model( 'event_model', 'event' );
		$this->load->model( 'registrant_model', 'registrant' );
		$this->load->library( 'form_validation' );
		$this->load->library( 'session' );
	}

	/**
	 * Single Event Page
	 */

	public function single( $id ) {
		$event = $this->event->fetch( $id );
		if ( !isset( $event ) || empty( $event ) ) :
			show_404();
		endif;

		$data[ 'event' ] = $event;
		$data[ 'title' ] = "Event | " . $data[ 'event' ][ 'title' ];
		$this->load->view( 'templates/header.php', $data );
		$this->load->view( 'pages/events/single.php', $data );
		$this->load->view( 'templates/footer.php', $data );
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
	 * Index page 
	 * ------------------------------------------------------------
	 */
	
	public function db_index() {	
		// Check session before proceeding    
		$this->check_existing_session();
		
		// Fetch events and registrants count
		$events = $this->event->fetch();
		foreach ( $events as $key => $event ) :
			$events[ $key ][ 'reg_count' ] = $this->registrant->get_count( $event[ 'id' ] );
		endforeach;
		
		$data[ 'events' ] = $events;
		$data[ 'title' ] = "Dashboard | Events";
            $this->load->view( 'templates/header', $data );
            $this->load->view( 'dashboard/events/index', $data );
            $this->load->view( 'templates/footer', $data );
	}
	
	/**
	 * ------------------------------------------------------------
	 * Single event page
	 * ------------------------------------------------------------
	 */
	
	public function db_single( $id ) {	
		// Check session before proceeding    
		$this->check_existing_session();
		
		// Fetch event
		$event = $this->event->fetch( $id );
		if ( !isset( $event ) || empty( $event ) ) :
			show_404();
		endif;
		
		$data['event'] = $event;
		$data['title'] = "Dashboard | " . $data[ 'event' ][ 'title' ];
		$data['registrants'] = $this->registrant->get_registrants( $id );
		$this->load->view( 'templates/header.php', $data );
		$this->load->view( 'dashboard/events/single.php', $data );
		$this->load->view( 'templates/footer.php', $data );
	}
	
	/**
	 * ------------------------------------------------------------
	 * Update event
	 * ------------------------------------------------------------
	 */

	public function db_update( $id ) {
		// Go back to the event page and show error
		 if ( $this->form_validation->run( 'update_event' ) == FALSE )  :
			$event = $this->event->fetch( $id );
			if ( !isset( $event ) || empty( $event ) ) :
				show_404();
			endif;

			$data['registrants'] = $this->registrant->get_registrants( $id );
			$data['event'] = $event;
			$data['title'] = "Dashboard | " . $data['event']['title'];
                  $this->load->view( 'templates/header', $data );
                  $this->load->view( 'dashboard/events/single', $data );
                  $this->load->view( 'templates/footer', $data );
		
		// If successful, proceed with the update
            else :
			$this->event->update( $id );
                  redirect( 'dashboard/events/' . $id );
            endif;
	}
}