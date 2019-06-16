<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticuloControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     * Comprueba si funciona el controllador "articulo"
     *
     * @return void
     */
    
    public function articuloTest()
    {
        $response = $this->get('/articulo');

        $response->assertStatus(200);
    }
}