<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Curso
 * 
 * @property int $id
 * @property string $codCursos
 * @property string $nomCursos
 * @property string $especialidad
 * @property string $sisEvaluacion
 * @property int|null $horTeoria
 * @property int|null $horPractica
 * @property int|null $horLaboratorio
 * @property int $creditos
 * @property string|null $preRequisitos
 * @property int $verCurricular
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Docente[] $docentes
 *
 * @package App\Models
 */
class Curso extends Model
{
	protected $table = 'cursos';

	protected $casts = [
		'horTeoria' => 'int',
		'horPractica' => 'int',
		'horLaboratorio' => 'int',
		'creditos' => 'int',
		'verCurricular' => 'int'
	];

	protected $fillable = [
		'codCursos',
		'nomCursos',
		'especialidad',
		'sisEvaluacion',
		'horTeoria',
		'horPractica',
		'horLaboratorio',
		'creditos',
		'preRequisitos',
		'verCurricular'
	];

	public function docentes()
	{
		return $this->belongsToMany(Docente::class)
					->withPivot('id', 'seccion')
					->withTimestamps();
	}
}
