<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linea extends Model
{ use HasFactory;

    protected $table = 'linea';
    protected $fillable = [
        'nombre',
        'tipo',
        'tiempo',
    ];

    public function ruta() {
        return $this->hasMany(Ruta::class, 'linea_id');
    }

    public function microbus() {
        return $this->hasMany(Microbus::class, 'linea_id');
    }

    public function getLineas() {
        return $this->orderBy('id', 'ASC')->get();
    }
}
