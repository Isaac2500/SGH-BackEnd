<?php
class Alumno extends usuario{
    private $tabla = 'alumno';
    private $persona;

    public function __construct($usuario, $contraseña, $nombres, $apellidoP, $apellidoM) {
        parent::__construct($usuario, $contraseña);
        $this->persona = new Persona($nombres, $apellidoP, $apellidoM);
    }

    public function revisarHorario() {
        //no definido
    }

    public function getTabla() {
        return $this->tabla;
    }

    public function toJSON() {
        return Object.assign($this->toJSON(), $this->persona->toJSON());
    }
}