<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tag;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Tag::class, function (Faker $faker) {
    $title = $faker->unique()->word(5);
    $slug = Str::slug($title);
    return [
        'category_id' 	=> rand(1,20),
        'name' => $title,
        'slug' => $slug
    ];
});
