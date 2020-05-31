<?php
use Restserver\Libraries\RestController;
require_once(APPPATH . 'controllers/header.php');

class AdministradorController extends RestController 
{
    private $NOMBRE_MODELO = "AdministradorModel";
    private $peticion;

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model($this->NOMBRE_MODELO);
        $this->peticion = new Peticion();
    }

    public function administradores_get($usuario)
    {
		try {
            $data = $this->AdministradorModel->findSpecific($usuario);
            $response = $this->peticion->aceptada($data);
		} catch (\Exception $e) {
			$response = $this->peticion->rechazada();
		}
		
		$this->response($response['response'], $response['codeHTTP']);
    }
    
    public function horarios_post() 
    {
        $horario = $this->post();
        $maestro = $horario['maestro'];
        $grupo = $horario['grupo'];
        $materia = $horario['materia'];
        $aula = $horario['aula'];
        $hInicio = $horario['hInicio'];
        $hFinal = $horario['hFinal'];
        $dia = $horario['dia'];

		try {
            $data = $this->AdministradorModel->validarHorario($maestro, $grupo, $materia, $aula, $hInicio, $hFinal, $dia);
            $response = $this->peticion->aceptada($data);
		} catch (\Exception $e) {
            $response = $this->peticion->rechazada();
		}
        
        $this->response($response['response'], $response['codeHTTP']);
    }
    
    public function horarios_options() 
    {
        $headers['Access-Control-Allow-Origin'] = '*';
        $headers['Access-Control-Allow-Methods'] = 'POST, OPTIONS';
        $headers['Access-Control-Allow-Headers'] = 'Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method';
        
        $this->response($headers, 200);
    }
}
?>
