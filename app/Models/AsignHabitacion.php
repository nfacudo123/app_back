<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignHabitacion extends Model
{
    protected $table = 'habit_asign';

    protected $fillable = [
        'hotel_id', 'habitacion_tipo', 'acomodacion', 'cantidad'
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
