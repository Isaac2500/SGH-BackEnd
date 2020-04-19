<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Restserver\Libraries\RestController;
require(APPPATH . 'libraries/RestController.php');

class apisgh extends RestController {
	public function __construct() {
		parent::__construct();
		 $this->load->database();  
		$this->load->model('Usuario'); 
	}
	
	public function alumno_get() {
		try {
			$data = $this->db->get('alumno')->result();

			$this->response($data, 200);
		} catch (\Throwable $th) {
			$data['success'] = false; 
			$this->response($data,404);
		}
		
	}
	public function usuario_get(){
		try {
			
			$this->response($this->Usuario->findUsers(), 200);
		} catch (\Throwable $th) {
			$data['success'] = false; 
			$this->response($data,404);
		}
	}
}