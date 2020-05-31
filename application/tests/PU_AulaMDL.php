<?php

class PU_AulaMDL extends TestCase
{
    public function setUp()
    {
        $this->resetInstance();
        $this->CI->load->model('AulaModel');
        $this->obj = $this->CI->AulaModel;
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
