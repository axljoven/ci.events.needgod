<?php

class Registrant_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	/**
	 * ------------------------------------------------------------
	 * Fetch registrant / registrants
	 * ------------------------------------------------------------
	 */ 
	
	public function fetch( $id = NULL ) {
		if ( $id == NULL ) :
			$result = $this->db->get( 'registrants' );
			return $result->result_array();
		endif;
		$result = $this->db->get_where( 'registrants', ['id' => $id] );
		return $result->row_array();
	}
	
	/**
	 * ------------------------------------------------------------
	 * Create/save new registrant
	 * ------------------------------------------------------------
	 */
	
	public function create() {
		$entry = [
			"event_id" 			=> trim( $this->input->post( 'event_id' ) ),
			"firstname" 		=> ucwords( strtolower( trim( $this->input->post( 'firstname' ) ) ) ),
			"middlename" 		=> ucwords( strtolower( trim( $this->input->post( 'middlename' ) ) ) ),
			"lastname" 			=> ucwords( strtolower( trim( $this->input->post( 'lastname' ) ) ) ),
			"nickname" 			=> ucwords( strtolower( trim( $this->input->post( 'nickname' ) ) ) ),
			"gender" 			=> strtolower( trim( $this->input->post( 'gender') ) ),
			"email" 			=> strtolower( trim( $this->input->post( 'email') ) ),
			"mobile_number" 		=> trim( $this->input->post( 'mobile-number' ) ),
			"church_name" 		=> ucwords( strtolower( trim( $this->input->post( 'church-name' ) ) ) ),
			"church_address" 		=> ucwords( strtolower( trim( $this->input->post( 'church-city' ) ) ) ),
			"role" 			=> strtolower( trim( $this->input->post( 'role' ) ) ),
			"email_per_event_key" 	=> strtolower( trim( $this->input->post( 'email_per_event' ) ) )
		];
		return $this->db->insert( 'registrants', $entry );
	}
	
	/**
	 * ------------------------------------------------------------
	 * Get registrant count per event
	 * ------------------------------------------------------------
	 */
	
	public function get_count( $event_id ) {
		$result = $this->db->get_where( 'registrants', ['event_id' => $event_id] );
		return count($result->result_array());
	}
	
	/**
	 * ================================================================================
	 * NOTE: DASHBOARD FUNCTIONS
	 * ================================================================================
	 */
	
	/**
	 * ------------------------------------------------------------
	 * Get registrants by event id
	 * ------------------------------------------------------------
	 */
	
	public function get_registrants( $event_id ) {
		$result = $this->db->get_where( 'registrants', ['event_id' => $event_id] );
		return $result->result_array();
	}
	
	/**
	 * ------------------------------------------------------------
	 * Update single registrant status
	 * ------------------------------------------------------------
	 */

	public function update_status( $reg_id, $new_status ) {
		$this->db->where( 'id', $reg_id );
		$this->db->update( 'registrants', ['status' => $new_status] );
	}

}