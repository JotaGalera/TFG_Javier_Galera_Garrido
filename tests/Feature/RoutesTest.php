<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoutesTest extends TestCase
{
    /**
     * Comprueba si funciona la route "ubicacion"
     *
     * @return void
     */
    public function ubicacionTest()
    {
        $response = $this->get('/ubicacion');

        $response->assertStatus(200);
    }

    /**
     * Comprueba si funciona la route "articulo"
     *
     * @return void
     */
    public function articuloTest()
    {
        $response = $this->get('/articulo');

        $response->assertStatus(200);
    }

    /**
     * Comprueba si funciona la route "listado"
     *
     * @return void
     */
    public function listadoTest()
    {
        $response = $this->get('/listado');

        $response->assertStatus(200);
    }
    
    /**
     * Comprueba si funciona la route "gis"
     *
     * @return void
     */
    public function gisTest(){
        $response = $this->get('/gis');

        $response->assertStatus(200);
    }

    /**
     * Comprueba si funciona la route "user"
     *
     * @return void
     */
    public function usuarioTest(){
        $response = $this->get('/gis');

        $response->assertStatus(200);
    }
}
