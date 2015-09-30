<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Todos_model extends CI_Model {
	
	public function get_all(){
		return $this->db->get('business_clearance')->result_object();
	}

	public function insert($data){

		$this->db->insert('business_clearance',$data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
	

	public function get_barangay_clearance(){
		return $this->db->get('barangay_clearance')->result_object();
	}

	public function insert_barangay_clearance($barangay_clearance_data){

		$this->db->insert('barangay_clearance',$barangay_clearance_data);
		$barangay_clearance_insert_id = $this->db->barangay_clearancee_insert_id();
		return  $barangay_clearance_insert_id;
	}
	

}
