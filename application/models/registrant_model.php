<?php

class Registrant_model extends CI_Model
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
	// Check if duplicate
	// - Checks first the entry if registrant
	//   has an existing entry on the same event
	// - Checks the email and event id
	//

	// private function isDuplicate($email, $event_id)
	// {
	// 	$result = $this->db->get_where('registrants', [
	// 		'event_id' => $event_id,
	// 		'email' => $email
	// 	]);

	// 	return $result->row_array();
	// }


	//
	// Create/save new registrant
	//

	public function create()
	{
		// automatically gets the $_POST fields
		$entry = [
			"event_id" 		=> $this->input->post('event_id'),
			"firstname" 	=> ucwords(strtolower($this->input->post('firstname'))),
			"middlename" 	=> ucwords(strtolower($this->input->post('middlename'))),
			"lastname" 		=> ucwords(strtolower($this->input->post('lastname'))),
			"nickname" 		=> ucwords(strtolower($this->input->post('nickname'))),
			"gender" 		=> strtolower($this->input->post('gender')),
			"email" 		=> strtolower($this->input->post('email')),
			"mobile_number" 	=> $this->input->post('mobile-number'),
			"church_name" 	=> ucwords(strtolower($this->input->post('church-name'))),
			"church_address" 	=> ucwords(strtolower($this->input->post('church-city'))),
			"role" 		=> strtolower($this->input->post('role')),
			"email_per_event_key" => strtolower($this->input->post('email_per_event'))
		];

		// Check if duplicate
		// if ( empty($this->isDuplicate($entry['email'], $entry['event_id'])) ) :
			// Save and return true
			return $this->db->insert('registrants', $entry);
		// else :
		// 	return false;
		// endif;
	}
}