<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Problem;
use App\User;
use Faker\Generator as Faker;

$factory->define(Problem::class, function (Faker $faker) {
    return [
        "title" => $faker->text(100),
        "case_number" => $faker->text(20),
        "category_id" => Category::all()->random()->id,
        "allegation" => $faker->text(50),
        "decision_date" => $faker->text(50),
        "case_summary" => $faker->text(1000),
        "decision" => $faker->text(1000),
        "instance" => $faker->text(20),
        "conclusion" => $faker->text(500),
        "related_case" => $faker->text(100),
        "document_name" => $faker->text(20),
        "document_link" => $faker->text(20),
        "user_id" => User::all()->random()->id
    ];
});
