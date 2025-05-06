<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Infofamiliar
 * 
 * @property int $id
 * @property string $codUsuario
 * @property int $Usuario_id
 * @property string $nombres
 * @property string $apellidos
 * @property string $parentesco
 * @property string $estado
 * @property string $estudios
 * @property string|null $ocupacion
 * @property string $celular
 * @property string $depenEco
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class Infofamiliar extends Model
{
	protected $table = 'infofamiliar';

	protected $casts = [
		'Usuario_id' => 'int'
	];

	protected $fillable = [
		'codUsuario',
		'Usuario_id',
		'nombres',
		'apellidos',
		'parentesco',
		'estado',
		'estudios',
		'ocupacion',
		'celular',
		'depenEco'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'Usuario_id');
	}
}
