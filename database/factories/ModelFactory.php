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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Book::class, function (Faker\Generator $faker) {

    $sections = array("Circulation", "Periodical Section", "General Reference", "Children's Section", "Fiction");

    return [
        'title' => str_random(25),
        'author' => str_random(20),
        'genre' => str_random(15),
        'section' => $sections[array_rand($sections)],
        'borrowed' => false
    ];
});


