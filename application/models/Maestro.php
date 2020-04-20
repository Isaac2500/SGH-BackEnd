<?php
class Maestro extends CI_Model{
    private $tabla = 'maestro';
    /* private $persona; */

    public function __construct() {
        parent::__construct();
       
        $this->load->database();
    }

    public function revisarGrupos() {
        //no definido
    }

    public function materiasPorMaestro($Clv_Materia){
        
        $query = $this->db->query("SELECT Imparten.Maestro,Maestro.Nombres, Maestro.ApellidoM, Maestro.ApellidoP FROM Imparten Imparten JOIN Maestro Maestro ON Imparten.Maestro = Maestro.Usuario WHERE Clv_Materia = '".$Clv_Materia."'");
        return $query->result();


    }
    public function getTabla() {
        return $this->tabla;
    }

    public function toJSON() {
        return Object.assign($this->toJSON(), $this->persona->toJSON());
    }
}