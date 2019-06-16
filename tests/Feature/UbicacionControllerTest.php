<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UbicacionControllerTest extends TestCase
{
    
    /**
     * @test
     * Comprueba si funciona el controllador "ubicacion"
     *
     * @return void
     */
    public function ubicacionTest()
    {
        
        $response = $this->get('/ubicacion');

        //$response->dump();

        $response->assertStatus(302); //Redirect por no ser usuario del sistema
    }
}