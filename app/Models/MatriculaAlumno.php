<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MatriculaAlumno
 * 
 * @property int $id
 * @property int $alumno_id
 * @property int $matricula_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Alumno $alumno
 * @property Matricula $matricula
 *
 * @package App\Models
 */
class MatriculaAlumno extends Model
{
	protected $table = 'matricula_alumnos';

	protected $casts = [
		'alumno_id' => 'int',
		'matricula_id' => 'int'
	];

	protected $fillable = [
		'alumno_id',
		'matricula_id'
	];

	public function alumno()
	{
		return $this->belongsTo(Alumno::class);
	}

	public function matricula()
	{
		return $this->belongsTo(Matricula::class);
	}
}
