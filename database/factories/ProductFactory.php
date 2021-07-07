<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    $title = $faker->name;
    $slug = Str::slug($title);
    $price0 =rand(100,2000);
    return [
        'subcategory_id' 	=> rand(1,25),
        'name' 			=> $title,
        'slug' 			=> $slug,
        'stock' 	    => rand(1,100),
        'actualPrice'         => $price0,
        'previousPrice'         => $price0,
        'discountRate'         => '0',
        'shortDescription' 			=> $faker->text(500),
        'longDescription' 			=> $faker->text(500),
        'status'        => $faker->randomElement(['DRAFT', 'PUBLISHED']),
        'state'  => rand(1,4),

    ];
});
