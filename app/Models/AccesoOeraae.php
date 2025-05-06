<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AccesoOeraae
 * 
 * @property int $id
 * @property string $codAcceso
 * @property string $clave
 * @property string $rol
 * @property Carbon|null $ultFecIngreso
 * @property string $perfil
 * @property string|null $claInicial
 * @property string|null $verClave
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class AccesoOeraae extends Model
{
	protected $table = 'acceso_oeraae';

	protected $casts = [
		'ultFecIngreso' => 'datetime'
	];

	protected $fillable = [
		'codAcceso',
		'clave',
		'rol',
		'ultFecIngreso',
		'perfil',
		'claInicial',
		'verClave'
	];
}
