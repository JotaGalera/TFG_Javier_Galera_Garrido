<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoutesTest extends TestCase
{
    /**
     * Comprueba si funciona el controllador "ubicacion"
     *
     * @return void
     */
    public function ubicacionTest()
    {
        $response = $this->action('GET','\app\Http\Controllers\UbicacionController');

        $response->assertStatus(200);
    }

    /**
     * Comprueba si funciona el controllador "articulo"
     *
     * @return void
     */
    public function articuloTest()
    {
        $response = $this->call('GET','\app\Http\Controllers\ArticuloController');

        $response->assertStatus(200);
    }

    /**
     * Comprueba si funciona el controllador "espacio"
     *
     * @return void
     */
    public function listadoTest()
    {
        $response = $this->call('GET','\app\Http\Controllers\EspacioController');

        $response->assertStatus(200);
    }
    
    /**
     * Comprueba si funciona el controllador "gis"
     *
     * @return void
     */
    public function gisTest(){
        $response = $this->call('GET','\app\Http\Controllers\GisController');

        $response->assertStatus(200);
    }

    
}
