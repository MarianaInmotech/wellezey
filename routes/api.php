<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AirportController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\ReserveController;


Route::post('/flights', [FlightController::class, 'searchFlights']);

Route::put('/reserves/{id}', [ReserveController::class, 'update']); // Para actualizar una reserv

Route::get('/reserves', [ReserveController::class, 'index']); // Para obtener todas las reservas

Route::get('/reserves/{id}', [ReserveController::class, 'show']); 

Route::post('/airports', [AirportController::class, 'getIATACodes']);


Route::post('/reserves', [ReserveController::class, 'create']);

Route::delete('/reserves/{id}', [ReserveController::class, 'destroy']); // Para eliminar una reserva



