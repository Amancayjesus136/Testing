<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionOfInterest extends Model
{
    use HasFactory;
    protected $table = 'regions_of_interest';
    
    protected $fillable = [
        'image_id',
        'y',
        'height',
        'x',
        'width',
    ];

    // Relaciones
    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
