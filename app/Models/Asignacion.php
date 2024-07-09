<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'incidencia_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function incidencia()
    {
        return $this->belongsTo(Incidencias::class);
    }
}
