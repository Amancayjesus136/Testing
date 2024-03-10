<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvidenciaAlumno extends Model
{
    use HasFactory;
    protected $table = 'evidencia_alumno';
    protected $primaryKey = 'id_evento_alumno';
    protected $fillable = [
        'id_alumno',
        'id_evidencia',
    ];
}
