<?php

class PU_MateriaMDL extends TestCase
{
    public function setUp()
    {
        $this->resetInstance();
        $this->CI->load->model('MateriaModel');
        $this->obj = $this->CI->MateriaModel;
    }

    public function test_findSpecific()
    {
        $test = $this->obj->findSpecific('GrupoB');

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

    public function test_materiasPorMaestro()
    {
        $test = $this->obj->materiasPorMaestro('QA');

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
