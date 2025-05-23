<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
    Schema::create('asistencias', function (Blueprint $table) {
        $table->id();
        $table->foreignId('horario_id')->constrained('horarios')->onDelete('cascade'); // Relación con la clase/horario
        $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade'); // Usuario (alumno o docente)
        $table->date('fecha'); // Fecha de la asistencia
        $table->char('estado', 1); // Ej: 'P' (Presente), 'A' (Ausente), 'T' (Tardanza)
        $table->time('hora_entrada')->nullable(); // Hora de entrada registrada
        $table->time('hora_salida')->nullable(); // Hora de salida registrada
        $table->text('observacion')->nullable(); // Justificaciones o notas
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asistencia');
    }
};
