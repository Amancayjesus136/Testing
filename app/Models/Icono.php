<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Icono extends Model
{
    use HasFactory;

    protected $table = 'iconos';
    protected $primaryKey = 'id_icono';
    protected $fillable = [
        'titulo_icono',
        'descripcion_icono',
        'icono',
        'id_icono_principal',
    ];

    public function iconoPrincipal()
    {
        return $this->belongsTo(IconoPrincipal::class, 'id_icono_principal');
    }
}
