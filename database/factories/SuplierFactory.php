<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Suplier;
use Faker\Generator as Faker;


$factory->define(Suplier::class, function (Faker $faker) {
    return [
        'nama_suplier'=>$faker->name(),
        'alamat_suplier'=>$faker->address,
        'email'=>$faker->unique()->email,
        'no_hp'=>$faker->numerify('####-####-####'),
        'no_rekening'=>$faker->numerify('##########'),
    ];
});