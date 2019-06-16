<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UbicacionControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     * Comprueba si funciona el controllador "ubicacion"
     *
     * @return void
     */
    public function ubicacionTest()
    {
        $response = $this->get('/ubicacion');

        $response->assertStatus(200);
    }
}