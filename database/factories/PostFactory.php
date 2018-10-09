<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->text($maxNbChars = 100), 
		'thumbnail' => $faker->imageUrl($width = 640, $height = 480), 
		'description' => $faker->text($maxNbChars = 500), 
		'content' => $faker->text($maxNbChars = 10000),
		
		'user_id' => 1,
		// 'category_id' => 1,
		// 'view_count' => 0
    ];
});
