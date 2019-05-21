<?php

class Dashboard extends CI_Controller
{
      public function __construct()
      {
            parent::__construct();
            $this->load->model('event_model');
            $this->load->model('registrant_model');
      }

      //
      // Dashboard index page
      //

      public function index()
      {
            // Get event count
            

            // Get registrant count per event

            // Load view
      }
}