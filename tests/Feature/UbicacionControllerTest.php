<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UbicacionControllerTest extends TestCase
{
    /**
     * Comprueba si funciona el controllador "ubicacion"
     *
     * @return void
     */
    public function ubicacionTest()
    {
        $response = $this->action('GET','UbicacionController@index');

        $response->assertStatus(200);
    }
}