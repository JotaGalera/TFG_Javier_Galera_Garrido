<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoutesTest extends TestCase
{
    /**
     * Comprueba si funciona el controllador "articulo"
     *
     * @return void
     */
    public function articuloTest()
    {
        $response = $this->action('GET','ArticuloController');

        $response->assertStatus(200);
    }
}