<?php
class Usuario extends CI_Model{
    /* private $usuario;
    private $contraseña;
    private $tipoUsuario; */

    public function __construct(/* $usuario, $contraseña, $tipoUsuario */) {
        /* $this->usuario = $usuario;
        $this->contraseña = $contraseña;
        $this->tipoUsuario = $tipoUsuario; */
        parent::__construct();
        $this->load->database();
    }

    public function getJSON() {
        return array(
            'Usuario' => $this->usuario,
            'Contraseña' => $this->contraseña,
            'TipoUsuario'=>$this->tipoUsuario
        );
    }


    public function findUsers(){
        $query = $this->db->query('SELECT Usuario, contrasena, TipoUser FROM Alumno UNION 
        SELECT Usuario, contrasena, TipoUser FROM Maestro UNION
        SELECT Usuario, contrasena, TipoUser FROM Administrador');
        return $query->result();
    }   

    public function findSpecificUser(){
        
    }
}