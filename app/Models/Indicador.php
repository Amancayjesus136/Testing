<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicador extends Model
{
    use HasFactory;
    protected $table = 'indicadores';
    protected $primaryKey = 'id_indicador';
    protected $fillable = ['nombre', 'id_objetivo'];

    public function objetivo()
    {
        return $this->belongsTo(Objetivo::class, 'id_objetivo');
    }

    public function actividades()
    {
        return $this->hasMany(Actividad::class, 'id_indicador');
    }
}