<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('flights')->insert([
            [
                'departure_city' => 'MDE',
                'arrival_city' => 'LHR',
                'date_of_departure' => '2024-10-09',
                'time_of_departure' => '08:00',
                'date_of_arrival' => '2024-10-09',
                'time_of_arrival' => '14:00',
                'marketing_carrier' => 'AV',
                'flight_number' => 'AV123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'departure_city' => 'BOG',
                'arrival_city' => 'MIA',
                'date_of_departure' => '2024-11-15',
                'time_of_departure' => '09:00',
                'date_of_arrival' => '2024-11-15',
                'time_of_arrival' => '13:00',
                'marketing_carrier' => 'AA',
                'flight_number' => 'AA456',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
