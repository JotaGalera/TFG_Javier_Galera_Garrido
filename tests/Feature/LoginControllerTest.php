<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class LoginTest extends TestCase
{
    
    /**
     * @test
     * Comprueba si funciona la direccion "/login"
     *
     * @return void
     */
    
    public function loginTest()
    {
        $response = $this->get('/login');
        
        $response->assertStatus(200); //NECESITAS CREDENCIALES y 
    }
}