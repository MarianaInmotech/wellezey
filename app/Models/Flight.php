<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $table = 'flights';

    protected $fillable = [
        'date_of_departure',
        'time_of_departure',
        'date_of_arrival',
        'time_of_arrival',
        'marketing_carrier',
        'flight_number',
        'departure_city',
        'arrival_city'
    ];
}
