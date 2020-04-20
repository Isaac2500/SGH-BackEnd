<?php
class MateriaModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function findMateria($Clv_grupo) {
        $sql = "SELECT clv_materia, Materia FROM tienen NATURAL JOIN Grupo NATURAL JOIN materia WHERE Clv_grupo = ?";
        $query = $this->db->query($sql, $Clv_grupo);

        if($query->num_rows() > 0) {
            return $query->result();
        }else {
            $mensaje['mensaje'] = 'No se encontraron coincidencias';
            return $mensaje;
        }
    }
}
?>