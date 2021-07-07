<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Category::class, function (Faker $faker) {
    $title = $faker->name;
    $slug = Str::slug($title);

    return [
        'name' => $title,
        'slug' => $slug,
        'module' 	=> rand(0,1),
        'front'        => $faker->randomElement(['YES', 'NO']),
    ];
});
