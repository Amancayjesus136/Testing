<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;
    protected $table = 'actividad';
    protected $primaryKey = 'id_actividad';
    protected $fillable = [
        'nombre_actividad'
    ];

    public function actividades()
    {
        return $this->Alumno::belongsToMany(Alumno::class, 'actividad_alumno, id_alumno, id_actividad');
    }
}
