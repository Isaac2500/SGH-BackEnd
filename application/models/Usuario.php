<?php
class Usuario {
    private $usuario;
    private $contraseña;

    public function __construct($usuario, $contraseña) {
        $this->usuario = $usuario;
        $this->contraseña = $contraseña;
    }

    public function getJSON() {
        return array(
            'Usuario' => $this->usuario,
            'Contraseña' => $this->contraseña
        );
    }
}