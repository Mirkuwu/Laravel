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
        $table->foreignId('horario_id')->constrained('horarios')->onDelete('cascade');
        $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade');
        $table->date('fecha');
        $table->char('estado', 1);
        $table->time('hora_entrada')->nullable();
        $table->time('hora_salida')->nullable();
        $table->text('observacion')->nullable();
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
