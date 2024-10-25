<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AirportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('airports')->insert([
            [
                'city' => 'Medellin',
                'name' => 'Enrique Olaya Herrera',
                'country' => 'Colombia',
                'iata' => 'EOH',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'city' => 'Medellin',
                'name' => 'Jose Maria Cordova',
                'country' => 'Colombia',
                'iata' => 'MDE',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'city' => 'Bogota',
                'name' => 'El Dorado International',
                'country' => 'Colombia',
                'iata' => 'BOG',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
