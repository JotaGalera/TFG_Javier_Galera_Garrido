<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GisControllerTest extends TestCase
{   
    /**
     * Comprueba si funciona el controllador "gis"
     *
     * @return void
     */
    public function gisTest(){
        $response = $this->call('GET','GisController');

        $response->assertStatus(200);
    }
}
