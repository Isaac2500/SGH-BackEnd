<?php
require(APPPATH.'models/Consulta.php');

class MateriaModel extends CI_Model implements Consulta {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function findSpecific($Clv_grupo) {
        $sql = "SELECT clv_materia, Materia FROM tienen NATURAL JOIN Grupo NATURAL JOIN materia WHERE Clv_grupo = ?";
        $query = $this->db->query($sql, $Clv_grupo);

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

    public function materiasPorMaestro($Clv_Materia) {
        $sql = "SELECT Imparten.Maestro, Maestro.Nombres, Maestro.ApellidoM, Maestro.ApellidoP 
        FROM Imparten Imparten JOIN Maestro Maestro ON Imparten.Maestro = Maestro.Usuario WHERE 
        Clv_Materia = ?";
        $query = $this->db->query($sql, $Clv_Materia);

        if($query->num_rows() > 0) {
            return $query->result();
        }else {
            $mensaje['mensaje'] = 'No se encontraron coincidencias';
            return $mensaje;
        }
    }
}
?>