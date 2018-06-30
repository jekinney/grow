<?php

use Faker\Generator as Faker;

$factory->define(App\Training\Models\Video::class, function (Faker $faker) {
    return [
        'slug' => str_slug( $faker->word ),
        'name' => $faker->word,
        'is_free' => false,
        'publish_at' => $faker->date( 'm-d-Y' ),
        'description' => '<p>'.$faker->paragraph.'</p>',
    ];
});
