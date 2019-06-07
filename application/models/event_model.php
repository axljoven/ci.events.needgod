<?php

class Event_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	/**
	 * ------------------------------------------------------------
	 * Fetch event / events
	 * ------------------------------------------------------------
	 */

	public function fetch( $id = NULL ) {
		if ( $id == NULL ) :
			$result = $this->db->get( 'events' );
			return $result->result_array();
		endif;
		$result = $this->db->get_where( 'events', ['id' => $id] );
		return $result->row_array();
	}

	/**
	 * ------------------------------------------------------------
	 * Get active events only
	 * ------------------------------------------------------------
	 */

	public function get_active_events() {
		$result = $this->db->get_where( 'events', ['status' => 'active'] );
		return $result->result_array();
	}

	/** 
	 * ================================================================================
	 *  NOTE: DASHBOARD FUNCTIONS
	 * ================================================================================
	 */
	
	/**
	 * ------------------------------------------------------------
	 * Update sinlge event
	 * ------------------------------------------------------------
	 */

	public function update( $event_id )  {
		$updated_data = [
			'title' 		=> trim( $this->input->post( 'title' ) ),
			'status' 		=> trim( $this->input->post( 'status' ) ),
			'details' 		=> trim( $this->input->post( 'details' ) ),
			'speakers' 		=> trim( $this->input->post( 'speakers' ) ),
			'venue' 		=> trim( $this->input->post( 'venue' ) ),
			'reg_fee' 		=> trim( $this->input->post( 'reg_fee' ) ),
			'reg_fee_details' => trim( $this->input->post( 'reg_fee_details' ) ),
			'image' 		=> trim( $this->input->post( 'image' ) ),
			'date_start' 	=> trim( $this->input->post( 'date_start' ) ),
			'date_end' 		=> trim( $this->input->post( 'date_end' ) ),
			'date' 		=> trim( $this->input->post( 'date' ) )
		];
		$this->db->where( 'id', $event_id );
		$this->db->update( 'events', $updated_data );
	}
}