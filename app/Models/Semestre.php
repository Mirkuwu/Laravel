<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Semestre
 * 
 * @property int $id
 * @property string $semestre
 * @property Carbon $fecInicio
 * @property Carbon $fecFinal
 * @property int $estado
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Matricula[] $matriculas
 *
 * @package App\Models
 */
class Semestre extends Model
{
	protected $table = 'semestres';

	protected $casts = [
		'fecInicio' => 'datetime',
		'fecFinal' => 'datetime',
		'estado' => 'int'
	];

	protected $fillable = [
		'semestre',
		'fecInicio',
		'fecFinal',
		'estado'
	];

	public function matriculas()
	{
		return $this->hasMany(Matricula::class);
	}
}
