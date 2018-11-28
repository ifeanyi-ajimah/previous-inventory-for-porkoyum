<?php

use App\User;
use App\Customer;
use App\CommsExec;
//use App\ProductCategory;
use App\Product;
use App\State;
use App\DeliveryPerson;
use App\Order;
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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('jidemusty'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Customer::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->streetAddress,
        'phone_no' => $faker->phoneNumber,
    ];
});

//$factory->define(Customer::class, function (Faker\Generator $faker) {
//
//    $customers = Customer::all()->pluck('id');
//
//    return [
//        'url' => $faker->name,
//        'address' => $faker->streetAddress,
//        'phone_no' => $faker->phoneNumber,
//    ];
//});


$factory->define(State::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->city
    ];
});

/*$factory->define(ProductCategory::class, function (Faker\Generator $faker) {
    return [
        'category_name' => $faker->randomElement(['SLIMTEA', 'HAIRNOWNOW', 'MOLATOO', 'HAIRNYMPH', 'MECRAN', 'FLATTUMMY']),
    ];
});*/

$factory->define(Product::class, function (Faker\Generator $faker) {
/*
    $product_cat = ProductCategory::all()->random();*/

    return [/*
        'product_category_id' => $product_cat->id,*/
        'product_name' => $faker->word,
        'price' => $faker->numberBetween(5000, 20000),
    ];
});


$factory->define(CommsExec::class, function (Faker\Generator $faker) {

    $product_cat = ProductCategory::all()->random();

    return [
        'fullname' => $faker->name,
        'display_name' => $faker->userName,
        'productcategories_id' => $product_cat->id
    ];
});

$factory->define(DeliveryPerson::class, function (Faker\Generator $faker) {

    return [
        'fullname' => $faker->name . '-' . $faker->citySuffix
    ];
});

$factory->define(Order::class, function (Faker\Generator $faker) {

    $product = Product::all()->random();
    $customer = Customer::all()->random();
    $user = User::all()->random();

    return [
        'customer_id' => $customer->id,
        'product_cat_id' => ProductCategory::all()->random()->id,
        'product_id' => $product->id,
        'product_quantity' => $product_quantity = $faker->numberBetween(1, 10),
        'state_id' => State::all()->random()->id,
        'product_value' =>  $product->price * $product_quantity,
        'confirmed_status' => $confirmed_status = $faker->randomElement([Order::CONFIRMED, Order::UNCONFIRMED]),
        'urgency_status' => $faker->randomElement([Order::UGRGENT, Order::NOT_UGRGENT]),
        'delivery_status' => $confirmed_status == Order::UNCONFIRMED ? Order::UNDELIVERED : $faker->randomElement([Order::DELIVERED, Order::UNDELIVERED]),
        'comms_rep_id' => CommsExec::all()->random()->id,
        'delivery_address' => $customer->address,
        'delivery_person_id' => DeliveryPerson::all()->random()->id,
        'amount_paid' => $product->price * $product_quantity,
        'date_paid' => $faker->dateTime,
        'comment' => $faker->paragraph(2),
        'created_by' => $created_by = User::all()->random()->id,
        'user_id' => $created_by
    ];
});



