<?php
use Restserver\Libraries\RestController;
require_once(APPPATH . 'controllers/header.php');

class AulaController extends RestController {
    private $modelName = "AulaModel";
    private $peticion;

    public function __construct() {
        parent::__construct();

        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

        $this->load->model($this->modelName);
        $this->peticion = new Peticion();
    }
    
	public function aulas_get() {
		try {
			$data = $this->AulaModel->findAll();
			$response = $this->peticion->aceptada($data);
		} catch (\Exception $e) {
            $response = $this->peticion->rechazada();
		}
		
		$this->response($response['response'], $response['codeHTTP']);
	}
}
?>