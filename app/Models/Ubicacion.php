<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    use HasFactory;
    protected $table = 'ubicacion';
    protected $fillable = [
        'latitud',
        'longitud',
        'tiempo',
        'micro_id',
        'recorrido_id',
    ];

    public function micro() {
        return $this->belongsTo(Ubicacion::class, 'micro_id');
    }

    public function recorrido() {
        return $this->belongsTo(Ubicacion::class, 'recorrido_id');
    }
}
