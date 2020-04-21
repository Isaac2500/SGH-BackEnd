<?php
use Restserver\Libraries\RestController;
require_once(APPPATH . 'controllers/header.php');

class AdministradorController extends RestController {
    private $modelName = "AdministradorModel";
    private $peticion;

    public function __construct() {
        parent::__construct();

        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        
        $this->load->model($this->modelName);
        $this->peticion = new Peticion();
    }

    public function administradores_get($usuario) {
		try {
            $data = $this->AdministradorModel->findSpecific($usuario);
            $response = $this->peticion->aceptada($data);
		} catch (\Exception $e) {
			$response = $this->peticion->rechazada();
		}
		
		$this->response($response['response'], $response['codeHTTP']);
    }
    
	public function horarios_post() {
        $horario = $this->post();
        $maestro = $horario['maestro'];
        $grupo = $horario['grupo'];
        $materia = $horario['materia'];
        $aula = $horario['aula'];
        $hInicio = $horario['hInicio'];
        $hFinal = $horario['hFinal'];
        $dia = $horario['dia'];

		try {
            $data = $this->AdministradorModel->agregarHorario($maestro, $grupo, $materia, $aula, $hInicio, $hFinal, $dia);
            $response = $this->peticion->aceptada($data);
		} catch (\Exception $e) {
            $response = $this->peticion->rechazada();
		}
        
        $this->response($response['response'], $response['codeHTTP']);
	}
}
?>