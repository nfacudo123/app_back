<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('habit_asign', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotel_id');
            $table->foreign('hotel_id')->references('id')->on('hoteles')->onDelete('cascade');

            $table->enum('habitacion_tipo', ['ESTANDAR', 'JUNIOR', 'SUITE']);
            $table->enum('acomodacion', ['SENCILLA', 'DOBLE', 'TRIPLE', 'CUADRUPLE']);
            $table->integer('cantidad');
            $table->unique(['hotel_id', 'habitacion_tipo', 'acomodacion']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('habit_asign');
    }
};
