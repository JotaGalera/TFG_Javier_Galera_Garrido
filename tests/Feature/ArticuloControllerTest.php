<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ArticuloControllerTest extends TestCase
{
    
    /**
     * @test
     * Comprueba si funciona el controllador "articulo"
     *
     * @return void
     */
    
    public function articuloTest()
    {
        $response = $this->get('/articulo');
        
        //$response->dump();

        $response->assertStatus(302); //Redirect por no ser usuario del sistema
    }
}