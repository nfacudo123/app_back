<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string',
            'direccion' => 'required|string',
            'ciudad' => 'required|string',
            'nit' => 'required|string|unique:hoteles,nit',
            'lim_habit' => 'required|integer|min:1'
        ]);

        $exists = Hotel::where('nombre', $validated['nombre'])
            ->where('ciudad', $validated['ciudad'])->exists();

        if ($exists) {
            return response()->json(['error' => 'El hotel ya existe en esta ciudad'], 422);
        }

        $hotel = Hotel::create($validated);
        return response()->json($hotel, 201);
    }

    public function index()
    {
        return Hotel::with('asignaciones')->get();
    }

    public function show($id)
    {
        return Hotel::with('asignaciones')->findOrFail($id);
    }
}
