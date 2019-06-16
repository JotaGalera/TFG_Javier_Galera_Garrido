<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GisControllerTest extends TestCase
{   

    use RefreshDatabase;
    /**
     * @test
     * Comprueba si funciona el controllador "gis"
     *
     * @return void
     */
    public function gisTest(){
        $response = $this->get('/gis');

        $response->assertStatus(200);
    }
}
