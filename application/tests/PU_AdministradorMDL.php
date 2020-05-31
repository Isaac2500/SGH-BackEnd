
<?php

class PU_AdministradorMDL extends TestCase
{
    public function setUp()
    {
        $this->resetInstance();
        $this->CI->load->model('AdministradorModel');
        $this->obj = $this->CI->AdministradorModel;
    }

    public function test_findSpecific()
    {
        $test = $this->obj->findSpecific('Admin1');

        if (array_key_exists('mensaje',$test)) {
            $this->assertTrue(true);
        } else {
            if (count($test)>0) {
                $this->assertTrue(true);
            } else {
                $this->assertTrue(false);
            }
        }   
    }

    public function test_validarHorario()
    {
        $test = $this->obj->validarHorario('CarlosM@maestros.uady.mx', 'GrupoA', 'QA', 'D1', '07:30:00', '08:30:00', 'Viernes');
        if ($test == "Horario Creado.") {
            $this->assertTrue(true);
        } else {
            if (in_array(true, $test)) {
                $this->assertTrue(true);
            } else {
                $this->assertTrue(false);
            }
        }   
    }

   /*  public function test_validarAula()
    {
        $test = $this->obj->validarAula('07:30:00', '08:30:00', 'D1', 'Viernes');

        if ($test == true || $test == false) {
            $this->assertTrue(true);
        }
    }

    public function test_validarMaestro()
    {
        $test = $this->obj->validarMaestro('07:30:00', '08:30:00', 'CarlosM@maestros.uady.mx', 'Viernes');

        if ($test == true || $test == false) {
            $this->assertTrue(true);
        }
    }

    public function test_validarGrupo()
    {
        $test = $this->obj->validarGrupo('07:30:00', '08:30:00', 'GrupoA', 'Viernes');

        if ($test == true || $test == false) {
            $this->assertTrue(true);
        }
    } */

}
