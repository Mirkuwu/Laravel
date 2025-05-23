<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model {
    protected $fillable = [
     'horario_id',
     'usuario_id',
     'fecha',
     'estado',
     'hora_entrada',
     'hora_salida'];

    public function horario() {
        return $this->belongsTo(Horario::class);
    }

    public function usuario() {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}

