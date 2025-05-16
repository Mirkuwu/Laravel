<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Horario
 *
 * @property int $id
 * @property string $codHorario
 * @property int $curso_docente_id
 * @property int $aula_id
 * @property string $dia
 * @property string $hora
 * @property string $tipo_sesion
 * @property int $tope
 * @property bool $estado
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Aula $aula
 * @property CursoDocente $curso_docente
 * @property Collection|MatriculaCurso[] $matricula_cursos
 *
 * @package App\Models
 */
class Horario extends Model
{
	protected $table = 'horarios';

	protected $casts = [
		'curso_docente_id' => 'int',
		'aula_id' => 'int',
		'tope' => 'int',
		'estado' => 'bool'
	];

	protected $fillable = [
		'codHorario',
		'curso_docente_id',
		'aula_id',
		'dia',
		'hora',
		'tipo_sesion',
		'tope',
		'estado'
	];

	public function aula()
	{
		return $this->belongsTo(Aula::class);
	}

	public function curso_docente()
	{
		return $this->belongsTo(CursoDocente::class);
	}

	public function matricula_cursos()
	{
		return $this->hasMany(MatriculaCurso::class);
	}
}
