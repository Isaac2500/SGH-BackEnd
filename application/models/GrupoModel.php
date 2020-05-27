<?php
require(APPPATH.'models/Consulta.php');

class GrupoModel extends CI_Model implements Consulta {

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
        $this->db->select('Clv_Grupo');
        $this->db->from('Grupo');
        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->result();
        }else {
            $mensaje['mensaje'] = 'No se encontraron coincidencias';
            return $mensaje;
        }
    }
}
?>