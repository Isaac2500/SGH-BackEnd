<?php
require(APPPATH . 'models/Consulta.php');

class AdministradorModel extends CI_Model implements Consulta
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function findSpecific($usuario)
    {
        $this->db->select('nombres, ApellidoP, ApellidoM');
        $this->db->from('Administrador');
        $this->db->where('Usuario =', $usuario);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            $mensaje['mensaje'] = 'No se encontraron coincidencias';
            return $mensaje;
        }
    }

    public function findAll()
    {
        // no implementado
    }

    public function agregarHorario($maestro, $grupo, $materia, $aula, $hInicio, $hFinal, $dia)
    {
        $sql = "INSERT INTO horario (Maestro, Grupo, Materia, Aula, HInicio, HFinal, Dia) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";
        $this->db->query($sql, array($maestro, $grupo, $materia, $aula, $hInicio, $hFinal, $dia));
    }
    
    public function validarHorario($maestro, $grupo, $materia, $aula, $hInicio, $hFinal, $dia)
    {
        $sql = "SELECT * FROM horario WHERE Maestro = ? AND Grupo = ? AND Materia = ? AND Aula = ? AND HInicio = ? AND HFinal = ? AND Dia = ?";
        $query = $this->db->query($sql, array($maestro, $grupo, $materia, $aula, $hInicio, $hFinal, $dia));
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            $mensaje['mensaje'] = 'No hay registros';
            return $mensaje;
        }
    }
}
