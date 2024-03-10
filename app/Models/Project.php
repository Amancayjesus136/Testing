<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'project';
    protected $primaryKey = 'id_project';
    protected $fillable = [
        'titulo',
        'dimension'
    ];

    public function objetivos()
    {
        return $this->hasMany(Objetivo::class, 'id_project');
    }

    public function indicadores()
    {
        return $this->hasManyThrough(Indicador::class, Objetivo::class, 'id_project', 'id_objetivo', 'id_project', 'id_objetivo');
    }

    public function actividades()
    {
        return $this->hasManyThrough(Actividad::class, Indicador::class, 'id_project', 'id_indicador', 'id_project', 'id_indicador');
    }
}
