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
        'retraso',
        'tipo',
        'estado',
        'conductor_id'
    ];

    public function conductor() {
        return $this->belongsTo(Conductor::class, 'conductor_id');
    }

    public function comentario() {
        return $this->hasOne(Comment::class, 'recorrido_id');
    }
}
