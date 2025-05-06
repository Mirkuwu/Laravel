<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Horario
 * 
 * @property int $id
 * @property string $codHorario
 * @property int $curso_profesor_id
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
 * @property CursoProfesor $curso_profesor
 *
 * @package App\Models
 */
class Horario extends Model
{
	protected $table = 'horarios';

	protected $casts = [
		'curso_profesor_id' => 'int',
		'aula_id' => 'int',
		'tope' => 'int',
		'estado' => 'bool'
	];

	protected $fillable = [
		'codHorario',
		'curso_profesor_id',
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

	public function curso_profesor()
	{
		return $this->belongsTo(CursoProfesor::class);
	}
}
