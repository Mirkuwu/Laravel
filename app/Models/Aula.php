<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Aula
 * 
 * @property int $id
 * @property string $codAula
 * @property string $nombreAula
 * @property int $capacidad
 * @property string $tipSilla
 * @property string $tipEntrada
 * @property bool $taburete
 * @property string $tipPizarra
 * @property bool $proyector
 * @property int $pcAlumno
 * @property int $pcDocente
 * @property int $canPuertas
 * @property string|null $equVentilacion
 * @property string|null $observacion
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Horario[] $horarios
 *
 * @package App\Models
 */
class Aula extends Model
{
	protected $table = 'aulas';

	protected $casts = [
		'capacidad' => 'int',
		'taburete' => 'bool',
		'proyector' => 'bool',
		'pcAlumno' => 'int',
		'pcDocente' => 'int',
		'canPuertas' => 'int'
	];

	protected $fillable = [
		'codAula',
		'nombreAula',
		'capacidad',
		'tipSilla',
		'tipEntrada',
		'taburete',
		'tipPizarra',
		'proyector',
		'pcAlumno',
		'pcDocente',
		'canPuertas',
		'equVentilacion',
		'observacion'
	];

	public function horarios()
	{
		return $this->hasMany(Horario::class);
	}
}
