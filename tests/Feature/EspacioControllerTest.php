<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EspacioControllerTest extends TestCase
{
    /**
     * @test
     * Comprueba si funciona el controllador "espacio"
     *
     * @return void
     */
    public function espacioTest()
    {
        $response = $this->action('GET','EspacioController');

        $response->assertStatus(200);
    }
}