<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Infoprofesional
 * 
 * @property int $id
 * @property int $Usuario_id
 * @property string $formacion_profesional
 * @property string $pais
 * @property string $universidad
 * @property string $especialidad
 * @property Carbon $fecha_inicio
 * @property Carbon $fecha_final
 * @property string $grado_obtenido
 * @property string|null $documento_sustentatorio
 * @property string|null $observacion
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class Infoprofesional extends Model
{
	protected $table = 'infoprofesional';

	protected $casts = [
		'Usuario_id' => 'int',
		'fecha_inicio' => 'datetime',
		'fecha_final' => 'datetime'
	];

	protected $fillable = [
		'Usuario_id',
		'formacion_profesional',
		'pais',
		'universidad',
		'especialidad',
		'fecha_inicio',
		'fecha_final',
		'grado_obtenido',
		'documento_sustentatorio',
		'observacion'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'Usuario_id');
	}
}
