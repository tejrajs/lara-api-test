<?php
// app/database/factories/PropertyFactory.php
use Faker\Generator as Faker;

$factory->define(App\Property::class, function (Faker $faker) {
	$users = App\User::pluck('id')->toArray();
	return [
			'name' => $faker->unique()->name,
			'price' => $faker->randomNumber(3),
			'bedrooms' => $faker->randomNumber(2),
			'bathrooms' => $faker->randomNumber(2),
			'storeys' => $faker->randomNumber(2),
			'garages' => $faker->randomNumber(2),
	];
});