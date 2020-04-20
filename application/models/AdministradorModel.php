<?php
class AdministradorModel extends CI_Model{

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function findAdministrador($usuario) {
        $this->db->select('nombres, ApellidoP, ApellidoM');
        $this->db->from('Administrador');
        $this->db->where('Usuario =', $usuario);
        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->result();
        }else {
            $mensaje['mensaje'] = 'No se encontraron coincidencias';
            return $mensaje;
        }
    }

    public function agregarHorario($maestro, $grupo, $materia, $aula, $hInicio, $hFinal, $dia) {
        $sql = "INSERT INTO horario (Maestro, Grupo, Materia, Aula, HInicio, HFinal, Dia) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";
        $this->db->query($sql,array($maestro, $grupo, $materia, $aula, $hInicio, $hFinal, $dia));
    }
}
?>