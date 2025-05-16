<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CursoDocente
 * 
 * @property int $id
 * @property int $curso_id
 * @property int $docente_id
 * @property string $seccion
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Curso $curso
 * @property Docente $docente
 * @property Collection|Horario[] $horarios
 *
 * @package App\Models
 */
class CursoDocente extends Model
{
	protected $table = 'curso_docente';

	protected $casts = [
		'curso_id' => 'int',
		'docente_id' => 'int'
	];

	protected $fillable = [
		'curso_id',
		'docente_id',
		'seccion'
	];

	public function curso()
	{
		return $this->belongsTo(Curso::class);
	}

	public function docente()
	{
		return $this->belongsTo(Docente::class);
	}

	public function horarios()
	{
		return $this->hasMany(Horario::class);
	}
}
