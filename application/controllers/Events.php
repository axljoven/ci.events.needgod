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

    public function single($id)
    {
        $event = $this->event_model->fetch($id);
        
        if (!isset($event) || empty($event)) :
            show_404();
        endif;

        $data['title'] = "Event | " . $event['title'];
        $data['event'] = $event;
        
        $this->load->view('templates/header.php', $data);
        $this->load->view('pages/events/single.php', $data);
        $this->load->view('templates/footer.php', $data);
    }

}