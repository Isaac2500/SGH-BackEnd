<?php
class Administrador extends usuario {
    private $tabla = 'administrador';
    private $persona;

    public function __construct($usuario, $contraseña, $nombres, $apellidoP, $apellidoM,$tipoUsuario) {
        parent::__construct($usuario, $contraseña, $tipoUsuario);
        $this->persona = new Persona($nombres, $apellidoP, $apellidoM);
    }

    public function asignarHorario() {
        //no definido
    }

    public function findAdministrador($usuario)
    {
        $this->db->select('nombres, ApellidoP, ApellidoM');
        $this->db->from('Administrador');
        $this->db->where('Usuario =', $usuario);
        $query = $this->db->get();
        return $query->result();
    }

    public function agregarHorario()
    {
        # code...
    }

    public function toJSON() {
        return Object.assign($this->toJSON(), $this->persona->toJSON());
    }
}