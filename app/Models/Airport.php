<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    use HasFactory;

    protected $table = 'airports';

    // permitir asignación masiva
    protected $fillable = ['city', 'name', 'country', 'iata'];
}
