<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Docente
 * 
 * @property int $id
 * @property int $Usuario_id
 * @property string $codDocente
 * @property string|null $codUni
 * @property string|null $depAcademico
 * @property string|null $dedicacion
 * @property string|null $observacion
 * @property string|null $condicion
 * @property string|null $estado
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 * @property Collection|Curso[] $cursos
 *
 * @package App\Models
 */
class Docente extends Model
{
	protected $table = 'docentes';

	protected $casts = [
		'Usuario_id' => 'int'
	];

	protected $fillable = [
		'Usuario_id',
		'codDocente',
		'codUni',
		'depAcademico',
		'dedicacion',
		'observacion',
		'condicion',
		'estado'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'Usuario_id');
	}

	public function cursos()
	{
		return $this->belongsToMany(Curso::class)
					->withPivot('id', 'seccion')
					->withTimestamps();
	}
}
