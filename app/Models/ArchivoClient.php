<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchivoClient extends Model
{
    use HasFactory;
    protected $table = 'archivo_cliente';
    protected $primaryKey = 'id_evento';
    protected $fillable = [
        'id_cliente',
        'id_archivo',
    ];
}
