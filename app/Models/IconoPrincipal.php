<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IconoPrincipal extends Model
{
    use HasFactory;

    protected $table = 'icono_principal';
    protected $primaryKey = 'id_icono_principal';
    protected $fillable = [
        'titulo_principal',
        'descripcion_principal',
    ];

    public function iconos()
    {
        return $this->hasMany(Icono::class, 'id_icono_principal');
    }
}
