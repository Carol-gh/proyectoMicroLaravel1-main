<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{ use HasFactory;

    protected $table = 'conductor';
    protected $fillable = [
        'nombre',
        'email',
        'password',
        'ci',
        'fecha_nacimiento',
        'telefono',
        'categoria_lic',
        'foto',
        'users_id',
        'microbus_id'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function micro() {
        return $this->belongsTo(Microbus::class, 'microbus_id');
    }

    public function recorridos() {
        return $this->hasMany(Recorrido::class, 'conductor_id');
    }
}
