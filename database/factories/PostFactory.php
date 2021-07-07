<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->name;
    $slug = Str::slug($title);
    return [
        'user_id' 		=> rand(1,32),
        'category_id' 	=> rand(1,20),
        'name' 			=> $title,
        'slug' 			=> $slug,
        'abstract' 		=> $faker->text(200),
        'body' 			=> $faker->text(500),
        'file' 			=> $faker->imageUrl($width = 1200, $height = 400),
        'status'        => $faker->randomElement(['DRAFT', 'PUBLISHED']),

    ];
});
