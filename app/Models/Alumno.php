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

    public function materias()
    {
        return $this->belongsToMany(Materia::class, 'materias_evento', 'id_alumno', 'id_materia');
    }

    public function evidencias()
    {
        return $this->belongsToMany(Evidencia::class, 'evidencia_alumno', 'id_alumno', 'id_evidencia');
    }
}
