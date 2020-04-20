<?php
class UsuarioModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function findUsuario($usuario, $contrasena) {
        $sql = "SELECT Usuario, contrasena, TipoUser FROM (SELECT Usuario, contrasena, TipoUser FROM Alumno AS alumno UNION 
        SELECT Usuario, contrasena, TipoUser FROM Maestro AS maestro UNION
        SELECT Usuario, contrasena, TipoUser FROM Administrador AS administrador) AS usuarios WHERE Usuario = ? AND contrasena = ?";
        $query = $this->db->query($sql, array($usuario, $contrasena));

        if($query->num_rows() > 0) {
            return $query->result();
        }else {
            $mensaje['mensaje'] = 'No se encontraron coincidencias';
            return $mensaje;
        }
    }
}
?>