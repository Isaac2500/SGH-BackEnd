<?php
require(APPPATH.'models/Consulta.php');

class AlumnoModel extends CI_Model implements Consulta{

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function findSpecific($usuario) {
        $this->db->select('nombres, ApellidoP, ApellidoM');
        $this->db->from('Alumno');
        $this->db->where('Usuario = ', $usuario);
        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->result();
        }else {
            $mensaje['mensaje'] = 'No se encontraron coincidencias';
            return $mensaje;
        }
    }

    public function findAll() {
        //no implementado
    }

    public function revisarHorarioDia($usuario, $dia) {
        $sql = "SELECT Horario.Clv_Horario,Maestro.Nombres, Maestro.ApellidoM, Maestro.ApellidoP,Materia.Materia, 
        Horario.Materia,Horario.aula,Horario.HInicio,Horario.HFinal,Horario.Dia from alumno alumno join Grupo Grupo 
        on alumno.clv_Grupo = grupo.Clv_Grupo join Horario Horario on grupo.Clv_grupo=horario.Grupo Join Materia Materia
        on Horario.materia = Materia.Clv_Materia Join Maestro Maestro on Horario.Maestro = Maestro.Usuario where
        Alumno.Usuario = ? AND Dia = ? ";

        $query = $this->db->query($sql, array($usuario, $dia));

        if($query->num_rows() > 0) {
            return $query->result();
        }else {
            $mensaje['mensaje'] = 'No se encontraron coincidencias';
            return $mensaje;
        }
    }

    public function revisarHorario($usuario) {
        $sql = "SELECT Horario.Clv_Horario,Maestro.Nombres, Maestro.ApellidoM, Maestro.ApellidoP,Materia.Materia, Horario.Materia,Horario.aula, Horario.HInicio,Horario.HFinal,Horario.Dia 
        FROM alumno alumno
        JOIN Grupo Grupo
        ON alumno.clv_Grupo = grupo.Clv_Grupo 
        JOIN Horario Horario
        ON grupo.Clv_grupo = horario.Grupo
        JOIN Materia Materia
        ON Horario.materia = Materia.Clv_Materia
        JOIN Maestro Maestro
        ON Horario.Maestro = Maestro.Usuario
        WHERE Alumno.Usuario = ?";
        $query = $this->db->query($sql, $usuario);

        if($query->num_rows() > 0) {
            return $query->result();
        }else {
            $mensaje['mensaje'] = 'No se encontraron coincidencias';
            return $mensaje;
        }
    }
}
?>