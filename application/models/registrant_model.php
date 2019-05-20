<?php

class Registrants_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    // 
    // Fetch all registrants or by ID
    // 

    public function fetch($id = NULL)
    {
        if ($id == NULL) :
            $result = $this->db->get('registrants');
            return $result->result_array();
        endif;

        $result = $this->db->get_where('registrants', ['id' => $id]);
        return $result->row_array();
    }

    //
    // Register new
    //

    public function register()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required|min_length[2]|max_length[32]');
        $this->form_validation->set_rules('firstname', 'Firstname', 'trim|required|min_length[2]|max_length[32]');
        $this->form_validation->set_rules('middlename', 'Middlename', 'trim|required|min_length[2]|max_length[32]');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('mobile-number', 'Mobile number', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('church-name', 'Church / Organization', 'trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('church-city', 'Church / Organization City', 'trim|required|min_length[2]|max_length[200]');

        if ($this->form_validation->run() == FALSE) {
            // validation is success
            $this->load->view('pages/events/single');
        } else {
            // validation failed
            $this->load->view('pages/events/reg-success');
        }
    }
}