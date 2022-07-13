<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = [
        'motivo',
        'horaRetiro',
        'recorrido_id',
    ];

    public function recorrido() {
        return $this->belongsTo(Recorrido::class, 'recorrido_id');
    }
}
