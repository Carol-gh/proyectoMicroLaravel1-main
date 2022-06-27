<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordenada extends Model
{
    use HasFactory;

    protected $table = 'coordenada';
    protected $fillable = [
        'latitud',
        'longitud',
        'ruta_id'
    ];

    public function ruta() {
        return $this->belongsTo(Ruta::class, 'ruta_id');
    }
   
}
