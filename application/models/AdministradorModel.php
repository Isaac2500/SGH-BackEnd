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

        if($query->num_rows() > 0) {
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
    
    public function validarHorario($maestro, $grupo, $materia, $aula, $hInicio, $hFinal, $dia) 
    {
        $mensaje['aula'] = $this->validarAula($hInicio, $hFinal, $aula, $dia);
        $mensaje['maestro'] = $this->validarMaestro($hInicio, $hFinal, $maestro, $dia);
        $mensaje['grupo'] = $this->validarGrupo($hInicio, $hFinal, $grupo, $dia);

        if(in_array(true, $mensaje)) {
            return $mensaje;
        }else {
            $this->agregarHorario($maestro, $grupo, $materia, $aula, $hInicio, $hFinal, $dia);
            return "Horario Creado.";
        }
    }

    private function agregarHorario($maestro, $grupo, $materia, $aula, $hInicio, $hFinal, $dia) 
    {
        $sql = "INSERT INTO horario (Maestro, Grupo, Materia, Aula, HInicio, HFinal, Dia) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";
        $this->db->query($sql, array($maestro, $grupo, $materia, $aula, $hInicio, $hFinal, $dia));
    }

    private function validarAula($hInicio, $hFinal, $aula, $dia) 
    {
        $sql = "SELECT * FROM horario WHERE ((? >= HInicio AND ? < HFinal) OR (HInicio < ? AND ? <= HFinal)) AND Aula = ? AND Dia = ?";
        $query = $this->db->query($sql, array($hInicio, $hInicio, $hFinal, $hFinal, $aula, $dia));

        return $this->validar($query->num_rows());
    }

    private function validarMaestro($hInicio, $hFinal, $maestro, $dia)
    {
        $sql = "SELECT * FROM horario WHERE ((? >= HInicio AND ? < HFinal) OR (HInicio < ? AND ? <= HFinal)) AND Maestro = ? AND Dia = ?";
        $query = $this->db->query($sql, array($hInicio, $hInicio, $hFinal, $hFinal, $maestro, $dia));

        return $this->validar($query->num_rows());
    }

    private function validarGrupo($hInicio, $hFinal, $grupo, $dia) 
    {
        $sql = "SELECT * FROM horario WHERE ((? >= HInicio AND ? < HFinal) OR (HInicio < ? AND ? <= HFinal)) AND Grupo = ? AND Dia = ?";
        $query = $this->db->query($sql, array($hInicio, $hInicio, $hFinal, $hFinal, $grupo, $dia));

        return $this->validar($query->num_rows());
    }

    private function validar($num_rows) 
    {
        return $num_rows > 0;
    }
}
?>