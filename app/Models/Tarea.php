<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tarea extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'incidencia_id',
        'titulo',
        'descripcion',
        'estado',
    ];
    public function user():HasMany{
        return $this->hasMany(User::class);
    }
    public function incidencia():HasMany{
        return $this->hasMany(Incidencias::class);
    }
}
