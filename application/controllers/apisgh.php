<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Restserver\Libraries\RestController;
require(APPPATH . 'libraries/RestController.php');

class apisgh extends RestController {
	public function __construct() {
		parent::__construct();
		$this->load->database();  
		$this->load->model('UsuarioModel'); 
		$this->load->model('GrupoModel');
		$this->load->model('MaestroModel');
		$this->load->model('AdministradorModel');
		$this->load->model('AlumnoModel');
		$this->load->model('AulaModel');
		$this->load->model('MateriaModel');
	}
	
	public function alumnos_get($usuario) {
		try {
			$response['data'] = $this->AlumnoModel->findAlumno($usuario);
			$response['success'] = true;
			$response['message'] = "Successful Request";
		} catch (\Exception $e) {
			$response['success'] = false;
			$response['message'] = $e->getMessage();
		}
		
		$this->response($response, 200);
	}

	public function alumnos_horarios_get($usuario, $dia = null) {
		try {
			if(isset($dia)) {
				$response['data'] = $this->AlumnoModel->revisarHorario($usuario);
			}else {
				$response['data'] = $this->AlumnoModel->revisarHorario($usuario, $dia);
			}
			$response['success'] = true;
			$response['message'] = "Successful Request";
		} catch (\Exception $e) {
			$response['success'] = false;
			$response['message'] = $e->getMessage();
		}
		
		$this->response($response, 200);
	}

	public function maestros_get($usuario) {
		try {
			$response['data'] = $this->MaestroModel->findMaestro($usuario);
			$response['success'] = true;
			$response['message'] = "Successful Request";
		} catch (\Exception $e) {
			$response['success'] = false;
			$response['message'] = $e->getMessage();
		}
		
		$this->response($response, 200);
	}

	public function materias_maestros_get($Clv_Materia) {
		try {
			$response['data'] = $this->MaestroModel->materiasPorMaestro($Clv_Materia);
			$response['success'] = true;
			$response['message'] = "Successful Request";
		} catch (\Exception $e) {
			$response['success'] = false;
			$response['message'] = $e->getMessage();
		}
		
		$this->response($response, 200);
	}

	public function maestros_horarios_get($usuario, $dia = null) {
		try {
			if(isset($dia)) {
				$response['data'] = $this->MaestroModel->revisarHorario($usuario);
			}else {
				$response['data'] = $this->MaestroModel->revisarHorarioDia($usuario, $dia);
			}
			$response['success'] = true;
			$response['message'] = "Successful Request";
		} catch (\Exception $e) {
			$response['success'] = false;
			$response['message'] = $e->getMessage();
		}
		
		$this->response($response, 200);
	}

	public function administradores_get($usuario) {
		try {
			$response['data'] = $this->AdministradorModel->findAdministrador($usuario);
			$response['success'] = true;
			$response['message'] = "Successful Request";
		} catch (\Exception $e) {
			$response['success'] = false;
			$response['message'] = $e->getMessage();
		}
		
		$this->response($response, 200);
	}

	public function horarios_post($maestro, $grupo, $materia, $aula, $hInicio, $hFinal, $dia) {
		try {
			$this->AdministradorModel->agregarHorario($maestro, $grupo, $materia, $aula, $hInicio, $hFinal, $dia);
			$response['success'] = true;
			$response['message'] = "Successful Creation";
		} catch (\Exception $e) {
			$response['success'] = false;
			$response['message'] = $e->getMessage();
		}
		
		$this->response($response, 200);
	}

	public function login_get($usuario, $contrasena){
		try {
			$response['data'] = $this->UsuarioModel->findUsuario($usuario, $contrasena);
			$response['success'] = true;
			$response['message'] = "Successful Request";
		} catch (\Exception $e) {
			$response['success'] = false;
			$response['message'] = $e->getMessage();
		}
		
		$this->response($response, 200);
	}

	public function grupos_get() {
		try {
			$response['data'] = $this->GrupoModel->findGrupos();
			$response['success'] = true;
			$response['message'] = "Successful Request";
		} catch (\Exception $e) {
			$response['success'] = false;
			$response['message'] = $e->getMessage();
		}
		
		$this->response($response, 200);
	}

	public function materias_get($Clv_grupo) {
		try {
			$response['data'] = $this->MateriaModel->findMateria($Clv_grupo);
			$response['success'] = true;
			$response['message'] = "Successful Request";
		} catch (\Exception $e) {
			$response['success'] = false;
			$response['message'] = $e->getMessage();
		}
		
		$this->response($response, 200);
	}

	public function aulas_get() {
		try {
			$response['data'] = $this->AulaModel->findAulas();
			$response['success'] = true;
			$response['message'] = "Successful Request";
		} catch (\Exception $e) {
			$response['success'] = false;
			$response['message'] = $e->getMessage();
		}
		
		$this->response($response, 200);
	}
}