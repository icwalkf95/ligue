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
use Carbon\Carbon;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Team::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->colorName,
        'localisation' => $faker->city,
        'admin_id' => $faker->numberBetween(2,800),
    ];
});

$factory->define(App\League::class, function (Faker\Generator $faker) {
	return [
		'name' => $faker->lastName,
		'category' => $faker->randomLetter,
	];
});


$factory->define(App\Season::class, function (Faker\Generator $faker) {
    $start_date;

    return [
        'name' => $faker->firstName,
    ];
});

$factory->define(App\Match::class, function (Faker\Generator $faker) {
    $local = $faker->numberBetween(0, 4);
    $visitor = $faker->numberBetween(0, 4);
    while($visitor == $local) {
        $visitor = $faker->numberBetween(0, 4);
    }
    
    return [
        'final_score_local'=> $local,
        'final_score_visitor'=> $visitor,
    ];
});

$factory->define(App\Stats::class, function (Faker\Generator $faker) {
    return [
        'time'=> $faker->numberBetween(1, 1200),
        'period'=> $faker->numberBetween(1, 3),
    ];
});

$factory->define(App\Player::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});