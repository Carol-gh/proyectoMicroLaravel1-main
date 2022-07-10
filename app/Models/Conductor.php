<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{ use HasFactory;

    protected $table = 'conductor';
    protected $fillable = [
        'ci',
        'fecha_nacimiento',
        'telefono',
        'categoria_lic',
        'foto',
        'users_id'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function drives() {
        return $this->hasMany(MicroConductor::class, 'conductor_id');
    }
}
