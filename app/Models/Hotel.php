<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hoteles';

    protected $fillable = [
        'nombre', 'direccion', 'ciudad', 'nit', 'lim_habit'
    ];

     public function asignaciones()
    {
        return $this->hasMany(AsignHabitacion::class);
    }
}
