<?php

class Dashboard extends CI_Controller
{
      public function __construct()
      {     
            parent::__construct();
            $this->load->model('event_model', 'event');
            $this->load->model('registrant_model', 'registrant');
            $this->load->library('session');
      }

      public function check_existing_session()
      {
            // Check if logged in 
            if ( !$this->session->has_userdata('logged_in') && !$this->session->has_userdata('username') ) : 
                  redirect('login'); 
            endif; 
      }

      // 
      // Dashboard index page
      // 

      public function index() 
      {     
            $this->check_existing_session();

            // Loop through active events
            $events = [];
            $result = $this->event->get_active_events();
            
            foreach ($result as $key => $event) :
                  $events[] = [
                        "title" => $event['title'],
                        "id" => $event['id'],
                        "reg_count" => $this->registrant->get_count($event['id'])
                  ];
            endforeach;

            $data['events'] = $events;
            $data['title'] = "Welcome | Dashboard";
            
            // Load view
            $this->load->view('templates/header', $data);
            $this->load->view('dashboard/index', $data);
            $this->load->view('templates/footer', $data);
      }
}