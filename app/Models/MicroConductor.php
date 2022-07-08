<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MicroConductor extends Model
{
    use HasFactory;
    protected $table = 'micro_conductor';
    protected $fillable = [
        'fecha',
        'conductor_id',
        'micro_id'
    ];

    public function conductor() {
        return $this->belongsTo(Conductor::class, 'conductor_id');
    }

    public function micro() {
        return $this->belongsTo(Microbus::class, 'micro_id');
    }

    public function recorridos() {
        return $this->hasMany(Recorrido::class, 'drive_id');
    }
}
