<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;

    protected $table = 'reserves';

    protected $fillable = [
        'departure_city',
        'arrival_city',
        'departure_time'
    ];

    // Relación con Itinerary
    public function itineraries()
    {
        return $this->hasMany(Itinerary::class);
    }
}
