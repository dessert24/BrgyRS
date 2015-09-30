<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Todos extends REST_Controller {
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
		
		$this->load->model('Todos_model','todos');
		$data = $this->todos->get_all();
		$data1 = $this->todos->get_barangay_clearance();
		$this->response($data1, 200);
		$this->response($data, 200);
	}
	
	public function index_post()
	{
		$data = $this->post();
		$barangay_clearance_data = $this->post();

		$this->load->model('Todos_model','todos');
		$id = $this->todos->insert($data);
		$id1 = $this->todos->insert_barangay_clearance($barangay_clearance_data);		
		$this->response(array('id' => $id), 200);
		$this->response(array('id' => $id1), 200);

		

	}
	

}