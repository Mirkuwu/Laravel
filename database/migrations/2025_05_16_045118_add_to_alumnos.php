<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
 public function up()
    {

        Schema::table('alumnos', function (Blueprint $table) {
            $table->unique('codAlumno');
        });

        Schema::table('matricula_alumnos', function (Blueprint $table) {
            $table->unique(['alumno_id', 'matricula_id']);
        });
    }

    public function down()
    {
        Schema::table('alumnos', function (Blueprint $table) {
            $table->dropUnique(['codAlumno']);
        });

        Schema::table('matricula_alumnos', function (Blueprint $table) {
            $table->dropUnique(['alumno_id', 'matricula_id']);
        });
    }
};
