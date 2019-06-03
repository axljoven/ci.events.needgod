<?php

class Admin_model extends CI_Model
{
      public function __construct()
      {
            $this->load->database();
            $this->load->helper('form');
		$this->load->library('form_validation');
      }

      
}