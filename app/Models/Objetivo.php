<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// En el modelo Objetivo
class Objetivo extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_objetivo';
    protected $fillable = [
        'nombre',
        'id_project',  // Asegúrate de tener esta columna en tu base de datos
    ];

    public function project() {
        return $this->belongsTo(Project::class, 'id_project');
    }

    public function indicadores() {
        return $this->hasMany(Indicador::class, 'id_objetivo');
    }

    public function actividades() {
        return $this->hasManyThrough(Actividad::class, Indicador::class, 'id_objetivo', 'id_indicador');
    }
}

