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
        'drive_id'
    ];

    public function micro() {
        return $this->belongsTo(MicroConductor::class, 'drive_id');
    }
}
