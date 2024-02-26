<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $table = 'vehicles';

    protected $fillable = [
        'result_id',
        'x',
        'y',
        'width',
        'height',
        'tipo',
        // Otros campos de Vehicle
    ];

    // Relaciones
    public function result()
    {
        return $this->belongsTo(Result::class);
    }

    // En el modelo Vehicle
public function details()
{
    return $this->hasMany(VehicleDetail::class);
}

}
