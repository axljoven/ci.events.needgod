<?php

class Admin extends CI_Controller
{
      public function __construct()
      {
            parent::__construct();
      }

      //
      // Login Page
      //

      public function index()
      {
            $data['title'] = 'Dashboard | Login';
            $this->load->view('templates/header', $data);
            $this->load->view('pages/login', $data);
            $this->load->view('templates/footer', $data);
      }
}