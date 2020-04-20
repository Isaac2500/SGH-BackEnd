<?php
use Restserver\Libraries\RestController;
require_once(APPPATH . 'controllers/header.php');

class MateriaController extends RestController {
    private $modelName = "MateriaModel";
    private $peticion;

    public function __construct() {
        parent::__construct();

        $this->load->model($this->modelName);
        $this->peticion = new Peticion();
    }

	public function imparten_maestros_get($Clv_Materia) {
		try {
			$data = $this->MateriaModel->materiasPorMaestro($Clv_Materia);
			$response = $this->peticion->aceptada($data);
		} catch (\Exception $e) {
			$response = $this->peticion->rechazada();
		}
		
		$this->response($response['response'], $response['codeHTTP']);
	}
}
?>