<?php

class Events extends CI_Controller
{
    //
    // Initialize database library
    //

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //
    // Single Event page
    //

    public function single($id)
    {
        $data['title'] = "Event #".$id."";
        $this->load->view('templates/header.php');
        $this->load->view('pages/events/single.php', $data);
        $this->load->view('templates/footer.php', $data);
    }

}