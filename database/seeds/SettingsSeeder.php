<?php

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'name' => 'Trimatric Architects & Engineers',
            'email' => 'info@trimatric.com',
            'phone1' => '+8802-48321385',
            'phone2' => '',
            'address' => '125 Mezonet Building, Ramna Century Avenue, Boro Moghbazar, 125 Ramna Century Ave, Dhaka 1217',
            'logo' => 'logo.png',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);
    }
}
