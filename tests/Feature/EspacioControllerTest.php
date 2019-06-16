<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoutesTest extends TestCase
{
    

    /**
     * Comprueba si funciona el controllador "espacio"
     *
     * @return void
     */
    public function espacioTest()
    {
        $response = $this->call('GET','\app\Http\Controllers\EspacioController');

        $response->assertStatus(200);
    }
}