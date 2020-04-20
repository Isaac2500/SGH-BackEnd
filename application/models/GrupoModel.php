<?php
class GrupoModel extends CI_Model {
    private $tabla = 'grupo';
    private $clvGrupo = 'Clv_Grupo';
    /* private $materia;
    private $aula;
    private $carrera;
    private $alumnos;
    private $maestro; */

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function findAlumnos($clvGrupo) {
        $this->db->select();
        $this->db->from($this->tabla);
        $this->db->where($this->clvGrupo, $clvGrupo);
        $consulta = $this->db->get();
        
        return $consulta->result();
    }

    public function findGrupos(){
        $this->db->Select($this->clvGrupo);
        $this->db->from($this->tabla);
        $consulta = $this->db->get();

        return $consulta->result();
    }

    public function materiaPorGrupo($Clv_grupo){
        $query = $this->db->query("Select clv_materia,Materia from tienen natural join Grupo natural join materia where Clv_grupo = '".$Clv_grupo."'");
        return $query->result();
    }
}