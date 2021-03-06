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
        'nroInterno',
        'fecha_asignacion',
        'fecha_baja',
        'estado',
    ];

    public function conductor() {
        return $this->hasOne(Conductor::class, 'microbus_id');
    }


}
