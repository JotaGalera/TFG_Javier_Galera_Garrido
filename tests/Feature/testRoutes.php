<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * Comprueba si funciona la route "ubicacion"
     *
     * @return void
     */
    public function ubicacion()
    {
        $response = $this->get('/ubicacion');

        $response->assertStatus(200);
    }

    /**
     * Comprueba si funciona la route "articulo"
     *
     * @return void
     */
    public function articulo()
    {
        $response = $this->get('/articulo');

        $response->assertStatus(200);
    }

    /**
     * Comprueba si funciona la route "listado"
     *
     * @return void
     */
    public function listado()
    {
        $response = $this->get('/listado');

        $response->assertStatus(200);
    }
    
    /**
     * Comprueba si funciona la route "gis"
     *
     * @return void
     */
    public function gis(){
        $response = $this->get('/gis');

        $response->assertStatus(200);
    }

    /**
     * Comprueba si funciona la route "user"
     *
     * @return void
     */
    public function usuario(){
        $response = $this->get('/gis');

        $response->assertStatus(200);
    }
}
