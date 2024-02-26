<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objetivo extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_objetivo';
    protected $fillable = [
        'proyecto',
        'dimension',
        'nombre',
    ];

    public function indicadores()
    {
        return $this->hasMany(Indicador::class, 'id_objetivo');
    }

    public function actividades()
    {
        return $this->hasManyThrough(Actividad::class, Indicador::class, 'id_objetivo', 'id_indicador');
    }
}