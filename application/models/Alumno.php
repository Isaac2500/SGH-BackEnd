<?php
class Alumno extends usuario{
    private $tabla = 'alumno';
    private $persona;

    public function __construct(/* $usuario, $contraseña, $nombres, $apellidoP, $apellidoM, $tipoUsuario */) {
        parent::__construct(/* $usuario, $contraseña, $tipoUsuario */);
        /* $this->persona = new Persona( $nombres, $apellidoP, $apellidoM ); */
        $this->load->database();
    }

    public function revisarHorarioDia($usuario, $dia)
    {
        $query = $this->db->query("Select Horario.Clv_Horario,Maestro.Nombres, Maestro.ApellidoM, Maestro.ApellidoP,Materia.Materia, Horario.Materia,Horario.aula, Horario.HInicio,Horario.HFinal,Horario.Dia 
        from alumno alumno
        join Grupo Grupo
        on alumno.clv_Grupo = grupo.Clv_Grupo 
        join Horario Horario
        on grupo.Clv_grupo=horario.Grupo
        Join Materia Materia
        on Horario.materia = Materia.Clv_Materia
        Join Maestro Maestro
        on Horario.Maestro = Maestro.Usuario
        where Alumno.Usuario ='".$usuario."' and Dia='".$dia."'");

        return $query->result();
    }

    public function revisarHorario($usuario) {
        $query = $this->db->query("Select Horario.Clv_Horario,Maestro.Nombres, Maestro.ApellidoM, Maestro.ApellidoP,Materia.Materia, Horario.Materia,Horario.aula, Horario.HInicio,Horario.HFinal,Horario.Dia 
        from alumno alumno
        join Grupo Grupo
        on alumno.clv_Grupo = grupo.Clv_Grupo 
        join Horario Horario
        on grupo.Clv_grupo=horario.Grupo
        Join Materia Materia
        on Horario.materia = Materia.Clv_Materia
        Join Maestro Maestro
        on Horario.Maestro = Maestro.Usuario
        where Alumno.Usuario ='".$usuario."'");

        return $query->result();
    }

    public function findAlumno($usuario)
    {
        $this->db->select('nombres, ApellidoP, ApellidoM');
        $this->db->from('Alumno');
        $this->db->where('Usuario =', $usuario);
        $query = $this->db->get();
        return $query->result();
    }

    public function getTabla() {
        return $this->tabla;
    }

    public function toJSON() {
        return Object.assign($this->toJSON(), $this->persona->toJSON());
    }
}