<?php

use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i<10; $i++){
            \App\Project::create([
                'cat_name' => $faker->word,
                'title' => $faker->word,
                'project_start' => $faker->unique()->date('Y-m-d'),
                'project_address' => $faker->city,
                'status' => 'Active',
                'description' => $faker->paragraph,
                'photo' => "project_1.jpg",
            ]);
        }
    }
}
