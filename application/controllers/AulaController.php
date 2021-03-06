<?php
use Restserver\Libraries\RestController;
require_once(APPPATH . 'controllers/header.php');

class AulaController extends RestController 
{
    private $NOMBRE_MODELO = "AulaModel";
    private $peticion;

    public function __construct() 
    {
        parent::__construct();

        $this->load->model($this->NOMBRE_MODELO);
        $this->peticion = new Peticion();
    }
    
    public function aulas_get() 
    {
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
