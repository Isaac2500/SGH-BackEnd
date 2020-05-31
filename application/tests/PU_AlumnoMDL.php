
<?php

class PU_AlumnoMDL extends TestCase
{
    public function setUp()
    {
        $this->resetInstance();
        $this->CI->load->model('AlumnoModel');
        $this->obj = $this->CI->AlumnoModel;
    }
    
    public function test_findSpecific()
    {
        $test = $this->obj->findSpecific('13008094');

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
        $test = $this->obj->revisarHorario('13008094');

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
