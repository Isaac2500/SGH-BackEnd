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

    public function findMaestro($usuario)
    {
        $this->db->select('nombres, ApellidoP, ApellidoM');
        $this->db->from('Maestro');
        $this->db->where('Usuario =', $usuario);
        $query = $this->db->get();
        return $query->result();
    }

    public function revisarHorario($usuario)
    {
        $query = $this->db->query("Select Horario.Clv_horario, Grupo.Clv_Grupo, Grupo.Clv_Carrera, Horario.Aula, Horario.HInicio, Horario.HFinal,Horario.Dia  
        from Horario Horario
        join Maestro Maestro
        on Maestro.Usuario = horario.Maestro
        join Grupo Grupo
        on Horario.Grupo = Grupo.Clv_Grupo
        where Maestro.Usuario = '".$usuario."'");

        return $query->result();
    }

    public function revisarHorarioDia($usuario, $dia)
    {
        $query = $this->db->query("Select Horario.Clv_horario, Grupo.Clv_Grupo, Grupo.Clv_Carrera, Horario.Aula, Horario.HInicio, Horario.HFinal,Horario.Dia  
        from Horario Horario
        join Maestro Maestro
        on Maestro.Usuario = horario.Maestro
        join Grupo Grupo
        on Horario.Grupo = Grupo.Clv_Grupo
        where Maestro.Usuario = '".$usuario."' and Dia='".$dia."'");

        return $query->result();
    }
    public function getTabla() {
        return $this->tabla;
    }

    public function toJSON() {
        return Object.assign($this->toJSON(), $this->persona->toJSON());
    }
}