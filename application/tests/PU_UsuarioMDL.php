<?php

class PU_UsuarioMDL extends TestCase
{
    public function setUp()
    {
        $this->resetInstance();
        $this->CI->load->model('UsuarioModel');
        $this->obj = $this->CI->UsuarioModel;
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