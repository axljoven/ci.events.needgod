<?php

class Events extends CI_Controller
{
    //
    // Initialize database library
    //

    public function __construct()
    {
        parent::__construct();
        $this->load->model('event_model');
    }

    //
    // Single Event page
    //

    public function single()
    {
        
        $data['title'] = "Event | ";
        $this->load->view('templates/header.php', $data);
        $this->load->view('pages/events/single.php', $data);
        $this->load->view('templates/footer.php', $data);
    }

}