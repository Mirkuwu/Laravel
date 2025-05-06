<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Alumno
 * 
 * @property int $id
 * @property int $Usuario_id
 * @property string $codAlumno
 * @property string $especialidad
 * @property string|null $espAnterior
 * @property int|null $perIngreso
 * @property Carbon|null $fecIngreso
 * @property string $usuSistema
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 * @property Collection|Matricula[] $matriculas
 *
 * @package App\Models
 */
class Alumno extends Model
{
	protected $table = 'alumnos';

	protected $casts = [
		'Usuario_id' => 'int',
		'perIngreso' => 'int',
		'fecIngreso' => 'datetime'
	];

	protected $fillable = [
		'Usuario_id',
		'codAlumno',
		'especialidad',
		'espAnterior',
		'perIngreso',
		'fecIngreso',
		'usuSistema'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'Usuario_id');
	}

	public function matriculas()
	{
		return $this->belongsToMany(Matricula::class, 'matricula_alumnos')
					->withPivot('id')
					->withTimestamps();
	}
}
