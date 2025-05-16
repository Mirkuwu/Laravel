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
        Schema::create('acceso_oeraae', function (Blueprint $table) {
            $table->id();
            $table->string('codAcceso', 9)->unique();
            $table->string('clave', 100);
            $table->char('rol', 1);
            $table->dateTime('ultFecIngreso')->nullable();
            $table->char('perfil', 1);
            $table->string('claInicial', 100)->nullable();
            $table->char('verClave', 1)->nullable();
            $table->timestamps();
        });
        Schema::create('semestres', function (Blueprint $table) {
            $table->id();
            $table->string('semestre', 25);
            $table->date('fecInicio');
            $table->date('fecFinal');
            $table->integer('estado');
            $table->timestamps();
        });
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('semestre_id')->constrained('semestres')->onDelete('cascade');
            $table->dateTime('fec_ingreso');
            $table->string('ciclo');
            $table->timestamps();
        });
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('codCursos', 10);
            $table->string('nomCursos', 255);
            $table->string('especialidad', 5);
            $table->char('sisEvaluacion', 1);
            $table->integer('horTeoria')->nullable();
            $table->integer('horPractica')->nullable();
            $table->integer('horLaboratorio')->nullable();
            $table->integer('creditos');
            $table->string('preRequisitos', 255)->nullable();
            $table->integer('verCurricular');
            $table->timestamps();
        });
        Schema::create('aulas', function (Blueprint $table) {
            $table->id();
            $table->string('codAula', 10)->unique();
            $table->string('nombreAula');
            $table->integer('capacidad');
            $table->string('tipSilla', 50);
            $table->string('tipEntrada', 50);
            $table->boolean('taburete')->default(false);
            $table->string('tipPizarra', 50);
            $table->boolean('proyector')->default(false);
            $table->integer('pcAlumno')->default(0);
            $table->integer('pcDocente')->default(0);
            $table->integer('canPuertas')->default(1);
            $table->string('equVentilacion', 100)->nullable();
            $table->text('observacion')->nullable();
            $table->timestamps();
        });

        Schema::create('matricula_alumnos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alumno_id')->constrained('alumnos')->onDelete('cascade');
            $table->foreignId('matricula_id')->constrained('matriculas')->onDelete('cascade');
            $table->unique(['alumno_id', 'matricula_id']);
            $table->timestamps();
        });

        Schema::create('curso_docente', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curso_id')->constrained('cursos');
            $table->foreignId('docente_id')->constrained('docentes');
            $table->string('seccion', 10);
            $table->timestamps();
        });


        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->string('codHorario',10);
            $table->foreignId('curso_docente_id')->constrained('curso_docente')->onDelete('cascade');
            $table->foreignId('aula_id')->constrained('aulas')->onDelete('cascade');
            $table->enum('dia', ['LU', 'MA', 'MI', 'JU', 'VI', 'SA']);
            $table->string('hora', 5);
            $table->enum('tipo_sesion', ['T', 'P', 'L']);
            $table->integer('tope');
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });

        Schema::create('matricula_cursos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('matricula_id')->constrained('matriculas')->onDelete('cascade');
            $table->foreignId('horario_id')->constrained('horarios')->onDelete('cascade'); //cambio de curso_profesor_id a horarios_id
            $table->timestamps();
        });

    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acceso_oeraae');
        Schema::dropIfExists('semestres');
        Schema::dropIfExists('matriculas');
        Schema::dropIfExists('matricula_alumnos');
        Schema::dropIfExists('matricula_cursos');
        Schema::dropIfExists('curso_profesor');
        Schema::dropIfExists('cursos');
        Schema::dropIfExists('horarios');
        Schema::dropIfExists('aulas');

    }
};
