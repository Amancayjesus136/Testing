<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleDetail extends Model
{
    use HasFactory;
    protected $table = 'vehicles_details';

    protected $fillable = [
        'vehicle_id',
        'orientation_name',
        'orientation_confidence',
        'make_name',
        'make_confidence',
        'color_name',
        'color_confidence',
        'year_name',
        'year_confidence',
        'make_model_name',
        'make_model_confidence',
        'body_type_name',
        'body_type_confidence',
    ];

    // Relaciones
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
