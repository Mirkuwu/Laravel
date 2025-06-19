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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('codUsuario', 10)->unique();
            $table->string('apePaterno', 100);
            $table->string('apeMaterno', 100);
            $table->string('nombres', 100);
            $table->string('password', 255);
            $table->string('cargo', 45)->nullable();
            $table->string('area', 45)->nullable();
            $table->date('fecNacimiento')->nullable();
            $table->char('sexo', 1)->nullable();
            $table->string('telefono', 50)->nullable();
            $table->string('celular', 50)->nullable();
            $table->string('email', 225)->unique()->nullable();
            $table->string('dni', 45)->nullable();
            $table->text('descripcion')->nullable();
            $table->char('estado', 1)->nullable();
            $table->boolean('editado')->default(false);
            $table->timestamps();

            $table->index(['apePaterno', 'apeMaterno']);
            $table->index('dni');
            $table->index('cargo');
            $table->index('estado');
        });

        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Usuario_id')->constrained('users')->onDelete('cascade')->unique();
            $table->string('codDocente', 10)->unique();
            $table->char('codUni', 9)->nullable();
            $table->string('depAcademico', 5)->nullable();
            $table->string('dedicacion', 10)->nullable();
            $table->text('observacion')->nullable();
            $table->string('condicion', 100)->nullable();
            $table->char('estado', 1)->nullable();
            $table->timestamps();
        });

        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Usuario_id')->constrained('users')->onDelete('cascade')->unique();
            $table->string('codAlumno', 10)->unique();
            $table->char('especialidad', 2);
            $table->char('espAnterior', 2)->nullable();
            $table->integer('perIngreso')->nullable();
            $table->dateTime('fecIngreso')->nullable();
            $table->string('usuSistema', 45);
            $table->timestamps();
        });

        Schema::create('InfoProfesional', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Usuario_id')->constrained('users')->onDelete('cascade');
            $table->string('formacion_profesional', 255);
            $table->string('pais', 100);
            $table->string('universidad', 255);
            $table->string('especialidad', 255);
            $table->date('fecha_inicio');
            $table->date('fecha_final');
            $table->string('grado_obtenido', 255);
            $table->string('documento_sustentatorio')->nullable();
            $table->text('observacion')->nullable();
            $table->timestamps();
        });

        Schema::create('InfoFamiliar', function (Blueprint $table) {
            $table->id();
            $table->string('codUsuario', 10);
            $table->foreignId('Usuario_id')->constrained('users')->onDelete('cascade');
            $table->string('nombres', 50);
            $table->string('apellidos', 50);
            $table->string('parentesco', 10);
            $table->string('estado', 10);
            $table->string('estudios', 15);
            $table->string('ocupacion', 100)->nullable();
            $table->string('celular', 10);
            $table->char('depenEco', 1);
            $table->timestamps();
        });

        Schema::create('direcciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Usuario_id')->constrained('users')->onDelete('cascade');
            $table->string('pais', 100);
            $table->string('departamento', 100);
            $table->string('provincia', 100);
            $table->string('distrito', 100);
            $table->string('tipo_via', 50);
            $table->string('nombre_via', 150);
            $table->string('tipo', 50);
            $table->string('numero', 20)->nullable();
            $table->timestamps();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('docentes');
        Schema::dropIfExists('alumnos');
        Schema::dropIfExists('InfoProfesional');
        Schema::dropIfExists('InfoFamiliar');
        Schema::dropIfExists('direcciones');
    }
};
