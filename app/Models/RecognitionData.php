<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecognitionData extends Model
{
    protected $table = 'recognition_data';

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
        'region_of_interest_y',
        'region_of_interest_height',
        'region_of_interest_x',
        'region_of_interest_width',
        'credits_monthly_used',
        'credits_monthly_total',
        'plate_index',
        'plate',
        'region',
        'plate_confidence',
        'plate_coordinates_x1',
        'plate_coordinates_y1',
        'plate_coordinates_x2',
        'plate_coordinates_y2',
        'vehicle_detected',
        'vehicle_region_y',
        'vehicle_region_x',
        'vehicle_region_width',
        'vehicle_region_height',
        'candidate_matches_template',
        'candidate_plate',
        'candidate_confidence',
        'vehicle_make',
        'vehicle_make_confidence',
        'vehicle_year',
        'vehicle_year_confidence',
        'vehicle_color',
        'vehicle_color_confidence',
        'vehicle_orientation',
        'vehicle_orientation_confidence',
        'vehicle_body_type',
        'vehicle_body_type_confidence',
        'vehicle_make_model',
        'vehicle_make_model_confidence',
    ];
}
