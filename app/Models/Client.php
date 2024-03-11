<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = 'cliente';
    protected $primaryKey = 'id_cliente';
    protected $fillable = [
        'nombre_cliente',
    ];

    public function archivos()
    {
        return $this->belongsToMany(Archivo::class, 'archivo_cliente', 'id_cliente', 'id_archivo');
    }
}
