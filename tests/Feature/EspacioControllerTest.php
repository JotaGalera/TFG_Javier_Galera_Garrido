<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class EspacioControllerTest extends TestCase
{
    
    /**
     * @test
     * Comprueba si funciona el controllador "espacio"
     *
     * @return void
     */
    public function espacioTest()
    {   
        $response = $this->get('/espacio');

        //$response->dump();

        $response->assertStatus(302); //Redirect por no ser usuario del sistema
    }
}