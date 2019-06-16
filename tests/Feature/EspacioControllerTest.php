<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EspacioControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     * Comprueba si funciona el controllador "espacio"
     *
     * @return void
     */
    public function espacioTest()
    {
        $response = $this->get('/espacio');

        $response->assertStatus(200);
    }
}