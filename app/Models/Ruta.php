<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    use HasFactory;

    protected $table = 'ruta';
    protected $fillable = [
        'tipo',
        'linea_id'
    ];

    public function linea() {
        return $this->belongsTo(Linea::class, 'linea_id');
    }
    public function coordenada() {
        return $this->hasMany(Coordenada::class, 'ruta_id');
    }
}
