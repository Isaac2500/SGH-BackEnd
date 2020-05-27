<?php

class Peticion {
	private $informacion;

    public function aceptada($data) {
		$response['data'] = $data;
		$response['success'] = true;
		$response['message'] = 'Successful Request';

		$this->informacion['response'] = $response;
		$this->informacion['codeHTTP'] = 200;
		
		return $this->informacion;
	}
	
	public function rechazada() {
		$response['success'] = false;
		$response['message'] = 'Server Error';
	
		$this->informacion['response'] = $response;
		$this->informacion['codeHTTP'] = 500;

		return $this->informacion;
	}
}
?>