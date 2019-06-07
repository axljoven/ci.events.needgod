<?php

class Dashboard extends CI_Controller {

      public function __construct() {     
            parent::__construct();
            $this->load->model( 'event_model', 'event' );
            $this->load->model( 'registrant_model', 'registrant' );
            $this->load->library( 'session' );
            $this->load->helper( 'url' );
      }

      /**
       * ------------------------------------------------------------
       * Check existing session
       * ------------------------------------------------------------
       */
      
      public function check_existing_session() {
            if (  !$this->session->has_userdata( 'logged_in' ) && 
                  !$this->session->has_userdata( 'username' ) ) : 
                        redirect( 'login' ); 
            endif; 
      }
}