<?php

use App\User;
use App\Turma;
use Faker\Generator as Faker;

$factory->define(Turma::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
        'creator_id' => function () {
            return factory(User::class)->create()->id;
        },
    ];
});
