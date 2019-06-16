<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EspacioControllerTest extends TestCase
{
    /**
     * Comprueba si funciona el controllador "espacio"
     *
     * @return void
     */
    public function espacioTest()
    {
        $response = $this->action('GET','\app\Http\Controllers\EspacioController');

        $response->assertStatus(200);
    }
}