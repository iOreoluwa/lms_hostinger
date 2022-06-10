<?php
class Export_model extends CI_Model 
{
	function getUserDetails(){
 		$response = array();
		$this->db->select('first_name,last_name,email');
		$q = $this->db->get('users');
		$response = $q->result_array();
	 	return $response;
	}
	
}