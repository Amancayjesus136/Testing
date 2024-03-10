<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActividadAlumno extends Model
{
    use HasFactory;
    protected $table = 'actividad_alumno';
    protected $primaryKey = 'id_evento';
    protected $fillable = [
        'id_alumno',
        'id_actividad',
    ];
}
