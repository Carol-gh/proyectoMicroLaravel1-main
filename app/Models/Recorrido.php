<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recorrido extends Model
{
    use HasFactory;
    protected $table = 'recorridos';
    protected $fillable = [
        'fecha',
        'horaSalida',
        'horaLLegada',
        'latitud',
        'longitud',
        'tiempo',
        'tipo',
        'micro_id'
    ];

    public function micro() {
        return $this->belongsTo(Microbus::class, 'micro_id');
    }

    /*public function ubicaciones() {
        return $this->hasMany(Ubicacion::class, 'recorrido_id');
    }*/
}
