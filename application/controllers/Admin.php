<?php 

class Admin extends CI_Controller  {

      public function __construct()  {
            parent::__construct();
            $this->load->model( 'admin_model', 'admin' );
            $this->load->helper( 'url' );
            $this->load->helper( 'form' );
            $this->load->library( 'form_validation' );
            $this->load->library( 'session' );
            $this->load->library( 'encryption' );
      }

      /**
       * ------------------------------------------------------------
       * Check existing session
       * ------------------------------------------------------------
       */

      public function check_existing_session() {
            if ( $this->session->has_userdata( 'logged_in' ) && $this->session->has_userdata( 'username' ) ) :
                  redirect( 'dashboard' );
            endif; 
      }

	/** 
       * ------------------------------------------------------------
       * Login page
       * ------------------------------------------------------------
       */
      
      public function login()  {
            // Check session before proceeding     
            $this->check_existing_session();
            
            // Prepare data and display page
            $data['title'] = 'Dashboard | Login';
            $this->load->view( 'templates/header', $data );
		$this->load->view( 'pages/login', $data );
		$this->load->view( 'templates/footer', $data );
      }
      
      /**
       * ------------------------------------------------------------
       * Logout
       * ------------------------------------------------------------
       */
      
      public function logout() {
            $current_sessions = [ 'logged_in', 'username' ];
            $this->session->unset_userdata( $current_sessions );
            redirect( 'login' );
      }
      
      /**
       * ------------------------------------------------------------
       * Authenticate login
       * ------------------------------------------------------------
       */
      
      public function authenticate() {
            // Check session before proceeding     
            $this->check_existing_session();

            // If validation is false, go back to login page
            if ( $this->form_validation->run( 'login' ) == FALSE )  :
                  $data[ 'title' ] = 'Dashboard | Login';
                  $this->load->view( 'templates/header', $data );
                  $this->load->view( 'pages/login', $data );
                  $this->load->view( 'templates/footer', $data );
                  
            // If validation successful, fetch admin from database
            // and create session
            else :
                  $uname = $this->input->post( 'username' );
                  $pw = $this->input->post( 'password' );
                  $result =  $this->admin->find( $uname, $pw );
                  
                  // If credentials matched
                  if ( count( $result ) > 0 ) :
                        $new_session = [
                              'logged_in' => TRUE,
                              'username'  => $result[ 0 ][ 'username' ]
                        ];
                        $this->session->set_userdata( $new_session );
                        redirect( 'dashboard' );

                  // Else, go back to login page
                  else :
                        $data[ 'title' ] = 'Dashboard | Login';      
                        $this->load->view( 'templates/header', $data );
                        $this->load->view( 'pages/login', $data );
                        $this->load->view( 'templates/footer', $data );
                  endif;
            endif;
      }
}



