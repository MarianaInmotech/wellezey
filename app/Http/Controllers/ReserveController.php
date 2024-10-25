<?php

namespace App\Http\Controllers;

use App\Models\Itinerary;
use App\Models\Reserve;
use Illuminate\Http\Request;

class ReserveController extends Controller
{
    // Método para crear una reserva
    public function create(Request $request)
    {
        // Validar la entrada
        $request->validate([
            'departure_city' => 'required|string',
            'arrival_city' => 'required|string',
            'departure_time' => 'required|date',
            'itineraries' => 'required|array',
            'itineraries.*.departure_city' => 'required|string',
            'itineraries.*.arrival_city' => 'required|string',
            'itineraries.*.departure_time' => 'required|date',
            'itineraries.*.arrival_time' => 'required|date',
        ]);

        // Crear la reserva
        $reserve = Reserve::create([
            'departure_city' => $request->departure_city,
            'arrival_city' => $request->arrival_city,
            'departure_time' => $request->departure_time,
        ]);

        // Crear itinerarios relacionados
        foreach ($request->itineraries as $itinerary) {
            Itinerary::create([
                'reserve_id' => $reserve->id,
                'departure_city' => $itinerary['departure_city'],
                'arrival_city' => $itinerary['arrival_city'],
                'departure_time' => $itinerary['departure_time'],
                'arrival_time' => $itinerary['arrival_time'],
            ]);
        }

        return response()->json(['message' => 'Reserva creada con éxito', 'reserve_id' => $reserve->id], 201);
    }

    // Método para obtener todas las reservas
    public function index()
    {
        $reserves = Reserve::with('itineraries')->get(); // Incluye itinerarios relacionados
        return response()->json($reserves);
    }

    // Método para obtener una reserva específica
    public function show($id)
    {
        $reserve = Reserve::with('itineraries')->find($id);

        if (!$reserve) {
            return response()->json(['message' => 'Reserva no encontrada'], 404);
        }

        return response()->json($reserve);
    }

    public function destroy($id)
    {
        $reserve = Reserve::find($id);

        if (!$reserve) {
            return response()->json(['message' => 'Reserva no encontrada'], 404);
        }

        // Eliminar itinerarios relacionados
        $reserve->itineraries()->delete();
        // Eliminar la reserva
        $reserve->delete();

        return response()->json(['message' => 'Reserva eliminada con éxito']);
    }

    // Método para actualizar una reserva
    public function update(Request $request, $id)
    {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'departure_city' => 'required|string|max:3',
            'arrival_city' => 'required|string|max:3',
            'departure_time' => 'required|date',
            'itineraries' => 'required|array',
            'itineraries.*.departure_city' => 'required|string|max:3',
            'itineraries.*.arrival_city' => 'required|string|max:3',
            'itineraries.*.departure_time' => 'required|date',
            'itineraries.*.arrival_time' => 'required|date',
        ]);

        // Encontrar la reserva
        $reserve = Reserve::findOrFail($id);

        // Actualizar los campos de la reserva
        $reserve->update([
            'departure_city' => $validatedData['departure_city'],
            'arrival_city' => $validatedData['arrival_city'],
            'departure_time' => $validatedData['departure_time'],
        ]);

        // Actualizar itinerarios
        foreach ($validatedData['itineraries'] as $itineraryData) {
            $itinerary = $reserve->itineraries()->firstOrNew([
                'departure_city' => $itineraryData['departure_city'],
                'arrival_city' => $itineraryData['arrival_city'],
                'departure_time' => $itineraryData['departure_time'],
            ]);

            $itinerary->arrival_time = $itineraryData['arrival_time'];
            $itinerary->save();
        }

        return response()->json([
            'message' => 'Reserva actualizada con éxito',
            'reserve_id' => $reserve->id,
        ]);
    }
}
