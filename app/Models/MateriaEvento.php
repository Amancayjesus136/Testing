<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriaEvento extends Model
{
    use HasFactory;
    protected $table = 'materias_evento';
    protected $primaryKey = 'id_evento';
    protected $fillable = [
        'id_alumno',
        'id_materia',
    ];
}
