<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function searchFlights(Request $request)
    {     
        
        // Validar la entrada
        $request->validate([
            'searchs' => 'required|integer',
            'qtyPassengers' => 'required|integer',
            'adult' => 'required|integer',
            'itinerary' => 'required|array',
            'itinerary.*.departureCity' => 'required|string',
            'itinerary.*.arrivalCity' => 'required|string',
            'itinerary.*.hour' => 'required|date_format:Y-m-d\TH:i:sO',
        ]);

        return response()->json([
            [
                "dateOfDeparture" => "2024-10-09",
                "timeOfDeparture" => "08:00",
                "dateOfArrival" => "2024-10-09",
                "timeOfArrival" => "10:00",
                "marketingCarrier" => "AV",
                "flightNumber" => "AV123",
                "locationId" => [
                    "departureCity" => "MDE",
                    "arrivalCity" => "LHR"
                ]
            ]
        ]);
    }
}
