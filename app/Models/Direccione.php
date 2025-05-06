<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Direccione
 * 
 * @property int $id
 * @property int $Usuario_id
 * @property string $pais
 * @property string $departamento
 * @property string $provincia
 * @property string $distrito
 * @property string $tipo_via
 * @property string $nombre_via
 * @property string $tipo
 * @property string|null $numero
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class Direccione extends Model
{
	protected $table = 'direcciones';

	protected $casts = [
		'Usuario_id' => 'int'
	];

	protected $fillable = [
		'Usuario_id',
		'pais',
		'departamento',
		'provincia',
		'distrito',
		'tipo_via',
		'nombre_via',
		'tipo',
		'numero'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'Usuario_id');
	}
}
