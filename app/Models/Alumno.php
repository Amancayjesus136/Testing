<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $table = 'alumno';
    protected $primaryKey = 'id_alumno';
    protected $fillable = [
        'nombre_alumno',
        'apellido_alumno',
    ];

    public function actividades()
    {
        return $this->belongsToMany(Actividad::class, 'actividad_alumno', 'id_alumno', 'id_actividad');
    }
}
