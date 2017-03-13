<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(CodeDelivery\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(CodeDelivery\Models\Category::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->sentence,
    ];
});
$factory->define(CodeDelivery\Models\Product::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->sentence,
        'description' => $faker->sentence,
        'price' => $faker->numberBetween(10, 50)
    ];
});
$factory->define(CodeDelivery\Models\Client::class, function (Faker\Generator $faker) {

    return [
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'city' => $faker->city,
        'state' => $faker->state,
        'zipcode' => $faker->postcode,

    ];
});

$factory->define(CodeDelivery\Models\Order::class, function (Faker\Generator $faker) {

    return [

        'client_id' => rand(1, 10),
        'total' => rand(50, 100),
        'status' => 0

    ];
});

$factory->define(CodeDelivery\Models\OrderItem::class, function (Faker\Generator $faker) {

    return [



    ];
});

$factory->define(CodeDelivery\Models\Cupom::class, function (Faker\Generator $faker) {

    return [

        'code' => rand(50, 10000),
        'value' => rand(50, 100)
    ];
});