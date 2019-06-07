<?php

class Admin_model extends CI_Model {

      public function __construct() {
            $this->load->database();
            $this->load->helper( 'form' );
		$this->load->library( 'form_validation' );
      }

      /**
       * ------------------------------------------------------------
       * Find if admin username and password  exists
       * ------------------------------------------------------------
       */

      public function find( $uname, $pw ) {
            $result = $this->db->get_where( 'admins', [
                  'username' => $uname,
                  'password' => $pw
            ] );
            return $result->result_array();
      }
}