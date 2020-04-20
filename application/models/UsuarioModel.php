<?php
require(APPPATH.'models/Consulta.php');

class UsuarioModel extends CI_Model implements Consulta{

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function findSpecific($usuario) {
        $sql = "SELECT Usuario, contrasena, TipoUser FROM (SELECT Usuario, contrasena, TipoUser FROM Alumno AS alumno UNION 
        SELECT Usuario, contrasena, TipoUser FROM Maestro AS maestro UNION
        SELECT Usuario, contrasena, TipoUser FROM Administrador AS administrador) AS usuarios WHERE Usuario = ?";
        $query = $this->db->query($sql, $usuario);

        if($query->num_rows() > 0) {
            return $query->result();
        }else {
            $mensaje['mensaje'] = 'No se encontraron coincidencias';
            return $mensaje;
        }
    }

    public function findAll() {
        // no implementado
    }
}
?>