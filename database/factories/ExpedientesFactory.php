<?php

use Faker\Generator as Faker;
use App\Area;
use App\Estado;
use App\User;
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

$factory->define(App\Expediente::class, function (Faker $faker) {

    return [
        'comitente' => $faker->name,
        'destinatario'=>$faker->name,
        'fecha_alta' =>$faker->dateTime(),
        'facha_caducidad' =>$faker->dateTime(),
        'area'=>Area::inRandomOrder()->first()->id,
        'asunto'=>$faker->realText(100),
        'presupuesto'=>$faker->randomFloat(),
        'estado'=>Estado::inRandomOrder()->first()->id,
        'lugar'=>$faker->realText(),
        'usuario'=>User::inRandomOrder()->first()->id,
    ];
});
