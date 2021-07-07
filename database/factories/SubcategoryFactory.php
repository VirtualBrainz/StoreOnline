<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Subcategory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Subcategory::class, function (Faker $faker) {
    $title = $faker->name;
    $slug = Str::slug($title);
    return [
        'category_id' 	=> rand(1,20),
        'name' => $title,
        'slug' => $slug,
    ];
});
