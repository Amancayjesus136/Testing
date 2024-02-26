<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $table = 'results';

    protected $fillable = [
        'image_id',
        'requested_topn',
        'matches_template',
        'region_confidence',
        'plate_index',
        'plate',
        'region',
        'confidence',
        // Otros campos de Result
    ];

    // Relaciones
    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }

    public function vehicle()
    {
        return $this->hasOne(Vehicle::class);
    }
}
