<?php

class Registrant extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function register($event_id) 
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('lastname',       'lastname',                     'trim|required|min_length[2]|max_length[32]|alpha');
        $this->form_validation->set_rules('firstname',      'firstname',                    'trim|required|min_length[2]|max_length[32]|alpha');
        $this->form_validation->set_rules('middlename',     'middle name',                  'trim|required|min_length[2]|max_length[32]|alpha');
        $this->form_validation->set_rules('gender',         'gender',                       'trim|required');
        $this->form_validation->set_rules('email',          'email',                        'trim|required|valid_email');
        $this->form_validation->set_rules('mobile-number',  'mobile number',                'trim|required|integer|min_length[4]|numeric');
        $this->form_validation->set_rules('church-name',    'church / organization name',   'trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('church-city',    'church / organization city',   'trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('role',           'role',                         'trim|required|min_length[2]|max_length[6]');
        
        if ($this->form_validation->run() == FALSE) {
            // validation failed
            $this->load->model('event_model');
            $data['event'] = $this->event_model->fetch($event_id);
            $data['title'] = "Event | " .$data['event']['title'];
            
            // Load view
            $this->load->view('templates/header', $data);
            $this->load->view('pages/events/single', $data);
            $this->load->view('templates/footer', $data);
        
        } else {
            // validation is a success 
            $this->load->model('event_model');
            $data['event'] = $this->event_model->fetch($event_id);
            $data['title'] = "Registered | ".$data['event']['title'];
            $data['name'] = $data['event']['title'];
            $data['id'] = $data['event']['id'];
            
            // Send email

            // Save to database

            // Load view
            $this->load->view('templates/header', $data);
            $this->load->view('pages/events/reg-success', $data);
            $this->load->view('templates/footer', $data);
        }
    }
}