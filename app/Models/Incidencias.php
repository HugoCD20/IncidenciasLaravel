<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Incidencias extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'descripcion',
        'evidencias',
        'etapa',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function asignacion()
    {
        return $this->hasMany(Asignacion::class);
    }
    public function Tarea():HasMany{
        return $this->hasMany(Tarea::class);
    }
    public function prueba(): HasMany{
        return $this->hasMany(Pruebas::class);
    }
    
}
