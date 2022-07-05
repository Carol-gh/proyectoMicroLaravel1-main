<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Microbus extends Model
{
    use HasFactory;

    protected $table = 'microbus';
    protected $fillable = [
        'foto',
        'placa',
        'modelo',
        'nro_asientos',
        'nro_linea',
        'nroInterno',
        'fecha_asignacion',
        'fecha_baja',
        'conductor_id',
        'linea_id'
    ];

    public function conductor() {
        return $this->belongsTo(Conductor::class, 'conductor_id');
    }

    public function linea() {
        return $this->belongsTo(Linea::class, 'linea_id');
    }

    public function ubicaciones() {
        return $this->hasMany(Ubicacion::class, 'micro_id');
    }

    public function getBus($bus) {
        return $this->where(['conductor_id' => $bus])->first();
    }
}
