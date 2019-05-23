<?php

use App\User;
use App\Projeto;
use Faker\Generator as Faker;

$factory->define(Projeto::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
        'creator_id' => function () {
            return factory(User::class)->create()->id;
        },
    ];
});
