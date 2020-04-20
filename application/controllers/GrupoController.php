<?php
use Restserver\Libraries\RestController;
require_once(APPPATH . 'controllers/header.php');

class GrupoController extends RestController {
    private $modelName = "GrupoModel";
    private $peticion;

    public function __construct() {
        parent::__construct();

        $this->load->model($this->modelName);
        $this->peticion = new Peticion();
    }

    public function grupos_get() {
		try {
            $data = $this->GrupoModel->findAll();
            $response = $this->peticion->aceptada($data);

		} catch (\Exception $e) {
            $response = $this->peticion->rechazada();
		}
		
		$this->response($response['response'], $response['codeHTTP']);
      }
      
      public function tipo_materia_get($Clv_grupo) {
            try {
                  $data = $this->GrupoModel->findSpecific($Clv_grupo);
                  $response = $this->peticion->aceptada($data, true);
            } catch (\Exception $e) {
                  $response = $this->peticion->rechazada(null, false);
            }
            
            $this->response($response['response'], $response['codeHTTP']);
      }
}
?>