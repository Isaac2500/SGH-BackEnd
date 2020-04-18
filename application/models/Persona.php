<?php
class Persona {
    private $nombres;
    private $apellidoP;
    private $apellidoM;

    public function __construct($nombres, $apellidoP, $apellidoM) {
        $this->nombres = $nombres;
        $this->apellidoP = $apellidoP;
        $this->apellidoM = $apellidoM;
    }

    public function getJSON() {
        return array(
            'Nombres' => $this->nombres,
            'ApellidoP' => $this->apellidoP,
            'ApellidoM' => $this->apellidoM
        );
    }
}