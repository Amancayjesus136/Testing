<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table = 'images';

    protected $fillable = [
        'epoch_time',
        'img_width',
        'img_height',
        'error',
        'version',
        'credit_cost',
        'uuid',
        'processing_time_plates',
        'processing_time_vehicles',
        'processing_time_total',
        'credits_monthly_used',
        'credits_monthly_total',
        'entry_timestamp',
    ];

    // Relaciones
    public function regionsOfInterest()
    {
        return $this->hasMany(RegionOfInterest::class);
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
