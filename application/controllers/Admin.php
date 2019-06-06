<?php 

class Admin extends CI_Controller 
{
      public function __construct() 
      {
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->library('session');
      }



      //
      // Check existing session
      //

      public function check_existing_session()
      {
            if ( ($this->session->has_userdata('logged_in') && 
                  $this->session->userdata('logged_in') != '' )
                  && 
                  ($this->session->has_userdata('username') && 
                  $this->session->userdata('username') != '' ) ) :
                        redirect('dashboard');
            endif; 
      }
      


	//
	// Login Page
	//
      
      public function login() 
      {     
            $this->check_existing_session();
            
            $data['misc'] = [
                  'logged_in' => $this->session->userdata('logged_in'),
                  'username' => $this->session->userdata('username'),
            ];
            $data['title']='Dashboard | Login';

		$this->load->view('templates/header', $data);
		$this->load->view('pages/login', $data);
		$this->load->view('templates/footer', $data);
      }
      
      
      
      public function logout()
      {
            $current_sessions = ['logged_in', 'username'];
            $this->session->unset_userdata('$current_sessions');
            redirect('login');
      }



      public function authenticate()
      {     
            $this->check_existing_session();

            if ($this->form_validation->run('login') == FALSE)  :
                  
                  $username = $this->input->post('username');
                  $password = $this->input->post('password');
                  $data['title']='Dashboard | Login';
                  $data['posts'] = [
                        "username" => $username,
                        "password" => $password,
                  ];
                  $data['misc'] = [
                        'logged_in' => $this->session->userdata('logged_in'),
                        'username' => $this->session->userdata('username'),
                  ];
                  
                  $this->load->view('templates/header', $data);
                  $this->load->view('pages/login', $data);
                  $this->load->view('templates/footer', $data);
                  
            else :
                  // Check if found in database

                  $new_session = [
                        'logged_in' => TRUE,
                        'username'  => '_superadmin_'
                  ];
                  $this->session->set_userdata($new_session);
                  redirect('dashboard');

            endif;
      }
}



