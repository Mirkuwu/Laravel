<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MatriculaCurso
 * 
 * @property int $id
 * @property int $matricula_id
 * @property int $curso_profesor_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property CursoProfesor $curso_profesor
 * @property Matricula $matricula
 *
 * @package App\Models
 */
class MatriculaCurso extends Model
{
	protected $table = 'matricula_cursos';

	protected $casts = [
		'matricula_id' => 'int',
		'curso_profesor_id' => 'int'
	];

	protected $fillable = [
		'matricula_id',
		'curso_profesor_id'
	];

	public function curso_profesor()
	{
		return $this->belongsTo(CursoProfesor::class);
	}

	public function matricula()
	{
		return $this->belongsTo(Matricula::class);
	}
}
