<?php

class PU_MaestroMDL extends TestCase
{
    public function setUp()
    {
        $this->resetInstance();
        $this->CI->load->model('MaestroModel');
        $this->obj = $this->CI->MaestroModel;
    }

    public function test_findSpecific()
    {
        $test = $this->obj->findSpecific('CarlosM@maestros.uady.mx');

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

    public function test_revisarHorario()
    {
        $test = $this->obj->revisarHorario('CarlosM@maestros.uady.mx');

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

    public function test_revisarMateria()
    {
        $test = $this->obj->revisarMateria('QA');

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
}
