<?php

class Events extends CI_Controller
{
    //
    // Initialize database library
    //

    public function __construct()
    {
        // $this->load->database();
    }

    //
    // Single Event page
    //

    public function single($id)
    {
        $data['title'] = "Event #".$id."";
        var_dump($data);
        $this->load->view('templates/header.php', $data);
        $this->load->view('pages/events/single.php', $data);
        $this->load->view('templates/footer.php', $data);
    }

}