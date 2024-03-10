<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;
    protected $table = 'materias';
    protected $primaryKey = 'id_materia';
    protected $fillable = [
        'nombre_materia',
    ];

    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'materias_evento', 'id_alumno', 'id_materia');
    }
}
