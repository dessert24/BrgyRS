<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Barangay_clearance_todos extends REST_Controller {
/*
	function __construct() {

		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		$method = $_SERVER['REQUEST_METHOD'];
		if($method == "OPTIONS") {
			die();
		}
		parent::__construct();
	}
*/
	public function index_options(){
		die();
	}

	public function index_get()
	{		
		
		$this->load->model('Todos_model','barangay_clearance_todos');
		$barangay_clearance_data = $this->barangay_clearance_todos->get_barangay_clearance();
		$this->barangay_clearance($barangay_clearance_data, 200);
	}

	// Barangay Clearance
	public function index_post()
	{
		


		$barangay_clearance_data = $this->post();

		$this->load->model('Todos_model','barangay_clearance_todos');
		$barangay_clearance_data_id = $this->barangay_clearance_todos->insert($barangay_clearance_data);
				
		$this->barangay_clearance(array('id' => $barangay_clearance_data_id), 200);
		
	}
	


}