<?php

class PU_GrupoMDL extends TestCase
{
    public function setUp()
    {
        $this->resetInstance();
        $this->CI->load->model('GrupoModel');
        $this->obj = $this->CI->GrupoModel;
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

    public function test_findAll()
    {
        $test = $this->obj->findAll();

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
