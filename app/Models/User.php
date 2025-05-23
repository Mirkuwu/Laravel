<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class User
 *
 * @property int $id
 * @property string $codUsuario
 * @property string $apePaterno
 * @property string $apeMaterno
 * @property string $nombres
 * @property string $password
 * @property string|null $cargo
 * @property string|null $area
 * @property Carbon|null $fecNacimiento
 * @property string|null $sexo
 * @property string|null $telefono
 * @property string|null $celular
 * @property string|null $email
 * @property string|null $dni
 * @property string|null $descripcion
 * @property string|null $estado
 * @property bool $editado
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|Alumno[] $alumnos
 * @property Collection|Direccione[] $direcciones
 * @property Collection|Docente[] $docentes
 * @property Collection|Infofamiliar[] $infofamiliars
 * @property Collection|Infoprofesional[] $infoprofesionals
 *
 * @package App\Models
 */
class User extends Model
{
    use HasApiTokens;
	protected $table = 'users';

	protected $casts = [
		'fecNacimiento' => 'datetime',
		'editado' => 'bool'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'codUsuario',
		'apePaterno',
		'apeMaterno',
		'nombres',
		'password',
		'cargo',
		'area',
		'fecNacimiento',
		'sexo',
		'telefono',
		'celular',
		'email',
		'dni',
		'descripcion',
		'estado',
		'editado'
	];

	public function alumnos()
	{
		return $this->hasMany(Alumno::class, 'Usuario_id');
	}

	public function direcciones()
	{
		return $this->hasMany(Direccione::class, 'Usuario_id');
	}

	public function docentes()
	{
		return $this->hasMany(Docente::class, 'Usuario_id');
	}

	public function infofamiliars()
	{
		return $this->hasMany(Infofamiliar::class, 'Usuario_id');
	}

	public function infoprofesionals()
	{
		return $this->hasMany(Infoprofesional::class, 'Usuario_id');
	}
    public function asistencias() {
    return $this->hasMany(Asistencia::class, 'usuario_id');
    }
}
