<?php

class Dashboard extends CI_Controller
{
      public function __construct()
      {
            parent::__construct();
            $this->load->model('event_model', 'event');
            $this->load->model('registrant_model', 'registrant');
      }

      //
      // Dashboard index page
      //

      public function index()
      {     
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