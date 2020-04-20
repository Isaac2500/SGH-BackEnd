<?php 
use Restserver\Libraries\RestController;
require_once(APPPATH . 'controllers/header.php');

class UsuarioController extends RestController {
    private $modelName = "UsuarioModel";
    private $peticion;

    public function __construct() {
        parent::__construct();

        $this->load->model($this->modelName);
        $this->peticion = new Peticion();
    }
    
	public function usuarios_get($usuario) {
		try {
			$data = $this->UsuarioModel->findSpecific($usuario);
			$response = $this->peticion->aceptada($data);
		} catch (\Exception $e) {
            $reponse = $this->peticion->rechazada();
		}
		
		$this->response($response['response'], $response['codeHTTP']);
	}
}
?>