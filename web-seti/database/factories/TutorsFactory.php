<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tutor;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Tutor::class, function (Faker $faker) {
    return [
        Tutor::create([
            'name' => $faker->name,
            'rate' => $faker->randomFloat(),
            'subject' => Str::random(10),
            'experience' => $faker->randomDigit(),
        ])
    ];
});
