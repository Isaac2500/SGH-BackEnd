<?php
use Restserver\Libraries\RestController;
require_once(APPPATH . 'controllers/header.php');

class AlumnoController extends RestController 
{
    private $NOMBRE_MODELO = "AlumnoModel";
    private $peticion;

    public function __construct() {
		parent::__construct();

        $this->load->model($this->NOMBRE_MODELO);
        $this->peticion = new Peticion();
    }
    
	public function alumnos_get($usuario) 
	{
		try {
            $data = $this->AlumnoModel->findSpecific($usuario);
			$response = $this->peticion->aceptada($data);
		} catch (\Exception $e) {
            $response = $this->peticion->rechazada();
		}
		
		$this->response($response['response'], $response['codeHTTP']);
	}

	public function alumnos_horarios_get($usuario) 
	{
		try {
			$data = $this->AlumnoModel->revisarHorario($usuario);
			$response = $this->peticion->aceptada($data);
		} catch (\Exception $e) {
			$response = $this->peticion->rechazada();
		}

		$this->response($response['response'], $response['codeHTTP']);
    }
}
?>
