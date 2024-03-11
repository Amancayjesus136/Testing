<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;
    protected $table = 'archivos';
    protected $primaryKey = 'id_archivo';
    protected $fillable = [
        'nombre_archivo'
    ];
}
