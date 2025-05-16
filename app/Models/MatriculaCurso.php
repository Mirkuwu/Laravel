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
 * @property int $horario_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Horario $horario
 * @property Matricula $matricula
 *
 * @package App\Models
 */
class MatriculaCurso extends Model
{
	protected $table = 'matricula_cursos';

	protected $casts = [
		'matricula_id' => 'int',
		'horario_id' => 'int'
	];

	protected $fillable = [
		'matricula_id',
		'horario_id'
	];

	public function horario()
	{
		return $this->belongsTo(Horario::class);
	}

	public function matricula()
	{
		return $this->belongsTo(Matricula::class);
	}
}
