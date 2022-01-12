<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Barang;
use Faker\Generator as Faker;
use Illuminate\Validation\Rules\Unique;

$factory->define(Barang::class, function (Faker $faker) {
    return [
        'nama_barang'=>$faker->name(),
        'stok'=>$faker->unique()->randomDigit,
        'harga'=>$faker->numberBetween($min=1000000,$max=10000000)
    ];
});