<?php 

class Admin extends CI_Controller 
{
      public function __construct() 
      {
            parent::__construct();
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->library('session');
      }
      
      //
      // Check existing session
      //

      public function check_existing_session()
      {
            // Redirect if already logged in
            if ($this->session->userdata('logged_in') && $this->session->userdata('username')) :
                  redirect('dashboard');
            endif;
      }
      
	//
	// Login Page
	//
      
      public function login() 
      {     
            $this->check_existing_session();

            $data['title']='Dashboard | Login';
		$this->load->view('templates/header', $data);
		$this->load->view('pages/login', $data);
		$this->load->view('templates/footer', $data);
      }
      
      public function logout()
      {
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('username');
            redirect('login');
      }

      public function authenticate()
      {
            // Validate input
            if ($this->form_validation->run('login') == FALSE)  :
                  
                  $username = $this->input->post('username');
                  $password = $this->input->post('password');
                  $data['title']='Dashboard | Login';
                  $data['posts'] = [
                        "username" => $username,
                        "password" => $password,
                  ];

                  // Check if found in database
                  
                  
                  // Display page
                  $this->load->view('templates/header', $data);
                  $this->load->view('pages/login', $data);
                  $this->load->view('templates/footer', $data);

            else :
                  
                  $this->session->set_userdata('logged_in', TRUE);
                  $this->session->set_userdata('username', '_superadmin_');
                  
                  redirect('dashboard');

            endif;
      }
}



