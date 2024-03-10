<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evidencia extends Model
{
    use HasFactory;
    protected $table = 'evidencia';
    protected $primaryKey = 'id_evidencia';
    protected $fillable = [
        'nombre_evidencia'
    ];

    public function evidencias()
    {
        return $this->belongsToMany(Alumno::class, 'evidencia_alumno', 'id_alumno', 'id_evidencia');
    }
}
