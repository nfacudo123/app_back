<?php

namespace App\Http\Controllers;

use App\Models\AsignHabitacion;
use App\Models\Hotel;
use Illuminate\Http\Request;

class AsignHabitacionController extends Controller
{
    public function assign(Request $request)
    {
        $validated = $request->validate([
            'hotel_id' => 'required|exists:hoteles,id',
            'habitacion_tipo' => 'required|in:ESTANDAR,JUNIOR,SUITE',
            'acomodacion' => 'required|in:SENCILLA,DOBLE,TRIPLE,CUADRUPLE',
            'cantidad' => 'required|integer|min:1'
        ]);

        $rules = [
            'ESTANDAR' => ['SENCILLA', 'DOBLE'],
            'JUNIOR' => ['TRIPLE', 'CUADRUPLE'],
            'SUITE' => ['SENCILLA', 'DOBLE', 'TRIPLE']
        ];

        if (!in_array($validated['acomodacion'], $rules[$validated['habitacion_tipo']])) {
            return response()->json(['error' => 'Alojamiento no válido para este tipo de habitación.'], 422);
        }

        $exists = AsignHabitacion::where('hotel_id', $validated['hotel_id'])
            ->where('habitacion_tipo', $validated['habitacion_tipo'])
            ->where('acomodacion', $validated['acomodacion'])
            ->exists();

        if ($exists) {
            return response()->json(['error' => 'Duplicate room assignment'], 422);
        }

        $total = AsignHabitacion::where('hotel_id', $validated['hotel_id'])->sum('cantidad');
        $hotel = Hotel::find($validated['hotel_id']);

        if ($total + $validated['cantidad'] > $hotel->lim_habit) {
            return response()->json(['error' => 'Excede el límite de habitaciones del hotel'], 422);
        }

        $assignment = AsignHabitacion::create($validated);
        return response()->json($assignment, 201);
    }

    public function index($hotel_id)
    {
        return AsignHabitacion::where('hotel_id', $hotel_id)->get();
    }
}
