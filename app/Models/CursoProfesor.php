<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CursoProfesor
 * 
 * @property int $id
 * @property int $curso_id
 * @property int $profesor_id
 * @property string $seccion
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Curso $curso
 * @property Docente $docente
 * @property Collection|Horario[] $horarios
 * @property Collection|MatriculaCurso[] $matricula_cursos
 *
 * @package App\Models
 */
class CursoProfesor extends Model
{
	protected $table = 'curso_profesor';

	protected $casts = [
		'curso_id' => 'int',
		'profesor_id' => 'int'
	];

	protected $fillable = [
		'curso_id',
		'profesor_id',
		'seccion'
	];

	public function curso()
	{
		return $this->belongsTo(Curso::class);
	}

	public function docente()
	{
		return $this->belongsTo(Docente::class, 'profesor_id');
	}

	public function horarios()
	{
		return $this->hasMany(Horario::class);
	}

	public function matricula_cursos()
	{
		return $this->hasMany(MatriculaCurso::class);
	}
}
