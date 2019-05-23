<?php

use App\User;
use App\Perguntas;
use Faker\Generator as Faker;

$factory->define(Perguntas::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
        'creator_id' => function () {
            return factory(User::class)->create()->id;
        },
    ];
});
