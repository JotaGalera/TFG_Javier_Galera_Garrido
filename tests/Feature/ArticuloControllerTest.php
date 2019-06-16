<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticuloControllerTest extends TestCase
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