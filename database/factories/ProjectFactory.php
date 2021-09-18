<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'cat_name' => $faker->name,
        'title' => $faker->title,
        'project_start' => $faker->unique()->date('Y-m-d'),
        'project_address' => $faker->city,
        'status' => 'Active',
        'description' => $faker->paragraph,
        'photo' => $faker->image(),
    ];
});
