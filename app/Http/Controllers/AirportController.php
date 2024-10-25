<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use Illuminate\Http\Request;

class AirportController extends Controller
{
    public function getIATACodes(Request $request)
    {
        // Validar que el campo 'code' no esté vacío
        $request->validate([
            'code' => 'required|string'
        ]);

        // Buscar aeropuertos que coincidan con la ciudad ingresada
        $airports = Airport::where('city', 'like', '%' . $request->code . '%')->get();

        // Si no hay aeropuertos coincidentes, devolver un error 404
        if ($airports->isEmpty()) {
            return response()->json([
                'error' => 'No se encontraron aeropuertos para la ciudad especificada.'
            ], 404);
        }

        // Devolver los aeropuertos encontrados
        return response()->json($airports);
    }
}
