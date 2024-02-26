<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\RegionOfInterest;
use App\Models\Result;
use App\Models\Candidate;
use App\Models\Vehicle;
use App\Models\VehicleDetail;

class ApiController extends Controller
{
    public function store(Request $request)
    {
        $jsonData = $request->json()->all();

        // Crear Image
        $image = Image::create([
            'epoch_time' => $jsonData['epoch_time'],
            'img_width' => $jsonData['img_width'],
            'img_height' => $jsonData['img_height'],
            'error' => $jsonData['error'],
            'version' => $jsonData['version'],
            'credit_cost' => $jsonData['credit_cost'],
            'uuid' => $jsonData['uuid'],
            'processing_time_plates' => $jsonData['processing_time']['plates'],
            'processing_time_vehicles' => $jsonData['processing_time']['vehicles'],
            'processing_time_total' => $jsonData['processing_time']['total'],
            'credits_monthly_used' => $jsonData['credits_monthly_used'],
            'credits_monthly_total' => $jsonData['credits_monthly_total'],
            'entry_timestamp' => now(),
        ]);

        // Crear RegionsOfInterest
        foreach ($jsonData['regions_of_interest'] as $roiData) {
            RegionOfInterest::create([
                'image_id' => $image->id,
                'y' => $roiData['y'],
                'height' => $roiData['height'],
                'x' => $roiData['x'],
                'width' => $roiData['width'],
            ]);
        }

        // Crear Results
        foreach ($jsonData['results'] as $resultData) {
            $result = Result::create([
                'image_id' => $image->id,
                'requested_topn' => $resultData['requested_topn'],
                'matches_template' => $resultData['matches_template'],
                'region_confidence' => $resultData['region_confidence'],
                'plate_index' => $resultData['plate_index'],
                'plate' => $resultData['plate'],
                'region' => $resultData['region'],
                'confidence' => $resultData['confidence'],
            ]);

            // Crear Candidates
            foreach ($resultData['candidates'] as $candidateData) {
                Candidate::create([
                    'result_id' => $result->id,
                    'matches_template' => $candidateData['matches_template'],
                    'plate' => $candidateData['plate'],
                    'confidence' => $candidateData['confidence'],
                ]);
            }

            // Crear Vehicle
$vehicleData = $resultData['vehicle'];

// Verificar si la clave 'vehicle_region' está presente en $vehicleData
if (isset($vehicleData['vehicle_region'])) {
    $vehicleRegionData = $vehicleData['vehicle_region'];

    $vehicle = $result->vehicle()->create([
        'x' => $vehicleRegionData['x'],
        'y' => $vehicleRegionData['y'],
        'width' => $vehicleRegionData['width'],
        'height' => $vehicleRegionData['height'],
        'tipo' => isset($vehicleData['tipo']) ? $vehicleData['tipo'] : null,
    ]);

    // Crear VehicleDetail
    $vehicleDetailData = isset($vehicleData['details']) ? $vehicleData['details'] : null;

    if ($vehicleDetailData) {
        foreach ($vehicleDetailData as $category => $details) {
            foreach ($details as $detail) {
                $vehicle->details()->create([
                    'category' => $category,
                    'name' => $detail['name'],
                    'confidence' => $detail['confidence'],
                ]);
            }
        }
    }
}


            // Crear VehicleDetail
            // Crear VehicleDetail
$vehicleDetailData = isset($vehicleData['details']) ? $vehicleData['details'] : null;

if ($vehicleDetailData) {
    // Verificar si 'make' está presente en $vehicleDetailData
    if (isset($vehicleDetailData['make'])) {
        foreach ($vehicleDetailData['make'] as $detail) {
            VehicleDetail::create([
                'vehicle_id' => $vehicle->id,
                'make_name' => $detail['name'],
                'make_confidence' => $detail['confidence'],
            ]);
        }
    }

    // Repite el proceso para 'year', 'color', 'orientation', 'body_type', 'make_model', etc.
    // ...

    // Verificar si 'year' está presente en $vehicleDetailData
    if (isset($vehicleDetailData['year'])) {
        foreach ($vehicleDetailData['year'] as $detail) {
            VehicleDetail::create([
                'vehicle_id' => $vehicle->id,
                'year_name' => $detail['name'],
                'year_confidence' => $detail['confidence'],
            ]);
        }
    }

    // Repite el proceso para 'color', 'orientation', 'body_type', 'make_model', etc.
    // ...

    // Verificar si 'color' está presente en $vehicleDetailData
    if (isset($vehicleDetailData['color'])) {
        foreach ($vehicleDetailData['color'] as $detail) {
            VehicleDetail::create([
                'vehicle_id' => $vehicle->id,
                'color_name' => $detail['name'],
                'color_confidence' => $detail['confidence'],
            ]);
        }
    }

    // Repite el proceso para 'orientation', 'body_type', 'make_model', etc.
    // ...

    // Verificar si 'orientation' está presente en $vehicleDetailData
    if (isset($vehicleDetailData['orientation'])) {
        foreach ($vehicleDetailData['orientation'] as $detail) {
            VehicleDetail::create([
                'vehicle_id' => $vehicle->id,
                'orientation_name' => $detail['name'],
                'orientation_confidence' => $detail['confidence'],
            ]);
        }
    }

    // Repite el proceso para 'body_type', 'make_model', etc.
    // ...

    // Verificar si 'body_type' está presente en $vehicleDetailData
    if (isset($vehicleDetailData['body_type'])) {
        foreach ($vehicleDetailData['body_type'] as $detail) {
            VehicleDetail::create([
                'vehicle_id' => $vehicle->id,
                'body_type_name' => $detail['name'],
                'body_type_confidence' => $detail['confidence'],
            ]);
        }
    }

    // Repite el proceso para 'make_model', etc.
    // ...

    // Verificar si 'make_model' está presente en $vehicleDetailData
    if (isset($vehicleDetailData['make_model'])) {
        foreach ($vehicleDetailData['make_model'] as $detail) {
            VehicleDetail::create([
                'vehicle_id' => $vehicle->id,
                'make_model_name' => $detail['name'],
                'make_model_confidence' => $detail['confidence'],
            ]);
        }
    }
}

        }

        return response()->json(['message' => 'Datos almacenados correctamente'], 201);
    }
}
