<?php
class Usuario extends CI_Model{
    

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
       
        $query = $this->db->query("SELECT Usuario, contrasena, TipoUser FROM (SELECT Usuario, contrasena, TipoUser FROM Alumno AS alumno UNION 
        SELECT Usuario, contrasena, TipoUser FROM Maestro AS maestro UNION
        SELECT Usuario, contrasena, TipoUser FROM Administrador AS administrador) As usuarios");
        return $query->result();
    }   

    public function findSpecificUser($usuario, $contrasena){
        $query = $this->db->query("SELECT Usuario, contrasena, TipoUser FROM (SELECT Usuario, contrasena, TipoUser FROM Alumno AS alumno UNION 
        SELECT Usuario, contrasena, TipoUser FROM Maestro AS maestro UNION
        SELECT Usuario, contrasena, TipoUser FROM Administrador AS administrador) As usuarios WHERE Usuario = '".$usuario."' AND contrasena = '".$contrasena."'");

        return $query->result();
        
    }
}