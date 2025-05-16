<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Matricula
 *
 * @property int $id
 * @property int $semestre_id
 * @property Carbon $fec_ingreso
 * @property string $ciclo
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Semestre $semestre
 * @property Collection|Alumno[] $alumnos
 * @property Collection|MatriculaCurso[] $matricula_cursos
 *
 * @package App\Models
 */
class Matricula extends Model
{
	protected $table = 'matriculas';

	protected $casts = [
		'semestre_id' => 'int',
		'fec_ingreso' => 'datetime'
	];

	protected $fillable = [
		'semestre_id',
		'fec_ingreso',
		'ciclo'
	];

	public function semestre()
	{
		return $this->belongsTo(Semestre::class);
	}

	public function alumnos()
	{
		return $this->belongsToMany(Alumno::class, 'matricula_alumnos')
					->withPivot('id')
					->withTimestamps();
	}

    public function matricula_alumnos()
    {
        return $this->hasMany(MatriculaAlumno::class);
    }
	public function matricula_cursos()
	{
		return $this->hasMany(MatriculaCurso::class);
	}
}
