<?php
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'id' => 29,
        'name' => $faker->name,
        'user' => 'jgalera',
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => 'jgalera', //secret
        'rfid_tag' => 'D3C0B9B4',
        'pin' => '1234',
        'externo' => 0,
    ];
});
