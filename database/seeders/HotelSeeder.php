<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hotel;
use App\Models\AsignHabitacion;

class HotelSeeder extends Seeder
{
    public function run(): void
    {
        $hoteles = [
            [
                'nombre' => 'DECAMERON CARTAGENA',
                'direccion' => 'Calle 23 58-25',
                'ciudad' => 'CARTAGENA',
                'nit' => '12345678-9',
                'lim_habit' => 42,
                'habitac' => [
                    ['habitacion_tipo' => 'ESTANDAR', 'acomodacion' => 'SENCILLA', 'cantidad' => 25],
                    ['habitacion_tipo' => 'JUNIOR', 'acomodacion' => 'TRIPLE', 'cantidad' => 12],
                    ['habitacion_tipo' => 'ESTANDAR', 'acomodacion' => 'DOBLE', 'cantidad' => 5],
                ]
            ],
            [
                'nombre' => 'HOTEL ESTELAR BOGOTÁ',
                'direccion' => 'Cra 45 #23-40',
                'ciudad' => 'BOGOTÁ',
                'nit' => '87654321-0',
                'lim_habit' => 50,
                'habitac' => [
                    ['habitacion_tipo' => 'SUITE', 'acomodacion' => 'SENCILLA', 'cantidad' => 10],
                    ['habitacion_tipo' => 'SUITE', 'acomodacion' => 'DOBLE', 'cantidad' => 15],
                    ['habitacion_tipo' => 'JUNIOR', 'acomodacion' => 'CUADRUPLE', 'cantidad' => 10],
                ]
            ],
            [
                'nombre' => 'HOTEL MAR AZUL',
                'direccion' => 'Av. Primera #10-20',
                'ciudad' => 'SANTA MARTA',
                'nit' => '11223344-5',
                'lim_habit' => 30,
                'habitac' => [
                    ['habitacion_tipo' => 'ESTANDAR', 'acomodacion' => 'SENCILLA', 'cantidad' => 10],
                    ['habitacion_tipo' => 'JUNIOR', 'acomodacion' => 'TRIPLE', 'cantidad' => 10],
                    ['habitacion_tipo' => 'SUITE', 'acomodacion' => 'TRIPLE', 'cantidad' => 5],
                ]
            ],
        ];

        foreach ($hoteles as $h) {
            $hotel = Hotel::create([
                'nombre' => $h['nombre'],
                'direccion' => $h['direccion'],
                'ciudad' => $h['ciudad'],
                'nit' => $h['nit'],
                'lim_habit' => $h['lim_habit'],
            ]);

            foreach ($h['habitac'] as $room) {
                AsignHabitacion::create([
                    'hotel_id' => $hotel->id,
                    'habitacion_tipo' => $room['habitacion_tipo'],
                    'acomodacion' => $room['acomodacion'],
                    'cantidad' => $room['cantidad'],
                ]);
            }
        }
    }
}
