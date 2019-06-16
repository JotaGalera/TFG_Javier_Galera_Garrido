<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GisControllerTest extends TestCase
{   
    /**
     * @test
     * Comprueba si funciona el controllador "gis"
     *
     * @return void
     */
    public function gisTest(){
        $response = $this->action('GET','GisController');

        $response->assertStatus(200);
    }
}
