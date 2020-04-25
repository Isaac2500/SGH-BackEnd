<?php 
use Restserver\Libraries\RestController;
require_once(APPPATH . 'controllers/header.php');

class UsuarioController extends RestController {
    private $modelName = "UsuarioModel";
    private $peticion;

    public function __construct() {
		parent::__construct();
		
		header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

        $this->load->model($this->modelName);
        $this->peticion = new Peticion();
    }
    
	public function usuarios_get($usuario = null) {
        try {
			if(isset($usuario)) {
				$data = $this->UsuarioModel->findSpecific($usuario);
			}else {
				$data = $this->UsuarioModel->findAll();
			}
			$response = $this->peticion->aceptada($data);
		} catch (\Exception $e) {
			$response = $this->peticion->rechazada();
		}

		$this->response($response['response'], $response['codeHTTP']);
    }
    
}
?>