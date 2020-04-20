<?php
class MaestroModel extends CI_Model{

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function findMaestro($usuario) {
        $this->db->select('nombres, ApellidoP, ApellidoM');
        $this->db->from('Maestro');
        $this->db->where('Usuario = ', $usuario);
        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->result();
        }else {
            $mensaje['mensaje'] = 'No se encontraron coincidencias';
            return $mensaje;
        }
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

    public function revisarHorario($usuario) {
        $sql = "SELECT Horario.Clv_horario, Grupo.Clv_Grupo, Grupo.Clv_Carrera, Horario.Aula, Horario.HInicio, Horario.HFinal,Horario.Dia  
        FROM Horario Horario
        JOIN Maestro Maestro
        ON Maestro.Usuario = horario.Maestro
        JOIN Grupo Grupo
        ON Horario.Grupo = Grupo.Clv_Grupo
        WHERE Maestro.Usuario = ?";
        $query = $this->db->query($sql, $usuario);

        if($query->num_rows() > 0) {
            return $query->result();
        }else {
            $mensaje['mensaje'] = 'No se encontraron coincidencias';
            return $mensaje;
        }
    }

    public function revisarHorarioDia($usuario, $dia) {
        $sql = "SELECT Horario.Clv_horario, Grupo.Clv_Grupo, Grupo.Clv_Carrera, Horario.Aula, Horario.HInicio, Horario.HFinal,Horario.Dia  
        FROM Horario Horario
        JOIN Maestro Maestro
        ON Maestro.Usuario = horario.Maestro
        JOIN Grupo Grupo
        ON Horario.Grupo = Grupo.Clv_Grupo
        WHERE Maestro.Usuario = ? AND Dia = ?";
        $query = $this->db->query($sql, array($usuario, $dia));

        if($query->num_rows() > 0) {
            return $query->result();
        }else {
            $mensaje['mensaje'] = 'No se encontraron coincidencias';
            return $mensaje;
        }
    }

    public function revisarGrupos() {
        //no definido
    }
}
?>