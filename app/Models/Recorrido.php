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
        'distancia',
    ];

    public function ubicaciones() {
        return $this->hasMany(Ubicacion::class, 'recorrido_id');
    }
}
