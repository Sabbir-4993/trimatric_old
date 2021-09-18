<?php

use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i<5; $i++) {
            \App\Slider::create([
                'title_1' => $faker->word,
                'title_2' => $faker->word,
                'title_3' => $faker->word,
                'description' => $faker->paragraph,
                'status' => 'Active',
                'photo' => '1.jpg',
            ]);
        }
    }
}
