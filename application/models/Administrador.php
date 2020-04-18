<?php
class Administrador extends usuario {
    private $tabla = 'administrador';
    private $persona;

    public function __construct($usuario, $contraseña, $nombres, $apellidoP, $apellidoM) {
        parent::__construct($usuario, $contraseña);
        $this->persona = new Persona($nombres, $apellidoP, $apellidoM);
    }

    public function asignarHorario() {
        //no definido
    }

    public function toJSON() {
        return Object.assign($this->toJSON(), $this->persona->toJSON());
    }
}