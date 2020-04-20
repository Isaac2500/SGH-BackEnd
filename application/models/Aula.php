<?php

    class Aula extends CI_Model 
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }


        public function findAulas()
        {
            $this->db->select();
            $this->db->from("aula");
            $query = $this->bd->get();

            return $query->result();
        }
    }
    

?>