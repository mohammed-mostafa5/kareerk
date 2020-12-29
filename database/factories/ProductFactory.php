<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph,
        'category_id' => '1',
        'user_id' => '1',
        'start_bid_price' => $faker->randomNumber(3),
        'min_bid_price' => $faker->randomNumber(2),
        'approved_at' => now(),
        'status' => '1',
    ];
});
