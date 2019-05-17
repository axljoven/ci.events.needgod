<?php

class Init extends CI_Controller
{   
    //
    // Home
    //

    public function index()
    {   
        $data['title'] = "Welcome | NeedGod Events";
        
        $this->load->view('templates/header', $data);
        $this->load->view('pages/index', $data);
        $this->load->view('templates/footer', $data);
    }


    //
    // Login
    //

    public function login()
    {
        $data['title'] = "Login | NeedGod Events";

        $this->load->view('templates/header', $data);
        $this->load->view('pages/login', $data);
        $this->load->view('templates/footer', $data);
    }

}