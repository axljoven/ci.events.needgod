<?php

class Event_model extends CI_Model
{
	//
	// Load Database
	//

	public function __construct()
	{
		$this->load->database();
	}

	//
	// Fetch Events
	//

	public function fetch($id = NULL)
	{
		if ($id == NULL) :
			$result = $this->db->get('events');
			return $result->result_array();
		endif;

		$result = $this->db->get_where('events', ['id' => $id]);
		return $result->row_array();
	}

	// 
	// Get active events
	// 

	public function get_active_events()
	{
		$result = $this->db->get_where('events', ['status' => 'active']);
		return $result->result_array();
	}
}