<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Restserver\Libraries\RestController;
require(APPPATH . 'libraries/RestController.php');

class apisgh extends RestController {
	public function __construct() {
		parent::__construct();
		$this->load->database();  
		$this->load->model('Usuario'); 
		$this->load->model('GrupoModel');
		$this->load->model('Maestro');
		$this->load->model('Aula');
	}
	
	public function alumnos_get($usuario = null) {
		try {
			if($usuario === null) {
				$this->db->from('alumno');
				$data = $this->db->get()->result();
			}else {
				$this->db->select('Nombres, ApellidoP, ApellidoM');
				$this->db->from('alumno');
				$this->db->where('Usuario', $usuario);
				$data = $this->db->get()->result();
			}
			array_push($data, ['success' => true]);
			$this->response($data, 200);
		} catch (\Exception $e) {
			$data['success'] = false;
			$data['message'] = $e->getMessage();
			$this->response($data, 404);
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

	public function login_get($usuario, $contrasena){
		try {

			
			$this->response($this->Usuario->findSpecificUser($usuario, $contrasena),200);
			
		} catch (\Throwable $th) {
			$data['success'] = false; 
			$this->response($data,404);
		}
	}

	public function maestros_get($usuario = null) {

	}

	public function grupos_get() {
		try {

			$this->response($this->GrupoModel->findGrupos(),200);
			
		} catch (\Throwable $th) {
			$data['success'] = false; 
			$this->response($data,404);
		}
	}

	public function materias_get($Clv_grupo) {

	}

	public function aulas_get() {
		try {
			$this->response($this->Aula->findAulas(),200);
		} catch (\Throwable $th) {
			$data['success'] = false; 
			$this->response($data,404);
		}
	}

	public function maestro_materia_get($Clv_Materia) {
		try {

			$this->response($this->Maestro->materiasPorMaestro($Clv_Materia),200);
			
		} catch (\Throwable $th) {
			$data['success'] = false; 
			$this->response($data,404);
		}
	}

	public function alumnos_horarios_post($usuario, $dia = null) {
		
	}

	public function maestros_horarios_post($usuario, $dia = null) {

	}
}