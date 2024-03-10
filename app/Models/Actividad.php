<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;

    protected $table = 'actividades';
    protected $primaryKey = 'id_actividades';
    protected $fillable = ['nombre', 'id_indicador', 'id_project'];

    public function indicador()
    {
        return $this->belongsTo(Indicador::class, 'id_indicador');
    }

    public function objetivo()
    {
        return $this->hasOneThrough(Objetivo::class, Indicador::class, 'id_objetivo', 'id_indicador');
    }
}


