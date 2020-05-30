<?php
use Restserver\Libraries\RestController;
require_once(APPPATH . 'controllers/header.php');

class MaestroController extends RestController 
{
    private $NOMBRE_MODELO = "MaestroModel";
    private $peticion;

	public function __construct() 
	{
		parent::__construct();

        $this->load->model($this->NOMBRE_MODELO);
        $this->peticion = new Peticion();
    }

	public function maestros_get($usuario) 
	{
		try {
			$data = $this->MaestroModel->findSpecific($usuario);
			$response = $this->peticion->aceptada($data);
		} catch (\Exception $e) {
			$response = $this->peticion->rechazada();
		}
		
		$this->response($response['response'], $response['codeHTTP']);
	}

	public function maestros_materias_get($usuario) 
	{
		try {
			$data = $this->MaestroModel->revisarMateria($usuario);
			$response = $this->peticion->aceptada($data);
		} catch (\Exception $e) {
			$response = $this->peticion->rechazada();
		}
		
		$this->response($response['response'], $response['codeHTTP']);
	}

	public function maestros_horarios_get($usuario) 
	{
		try {
			$data = $this->MaestroModel->revisarHorario($usuario);
			$response = $this->peticion->aceptada($data);
		} catch (\Exception $e) {
			$response = $this->peticion->rechazada();
		}
		
		$this->response($response['response'], $response['codeHTTP']); 
	}
}
?>
