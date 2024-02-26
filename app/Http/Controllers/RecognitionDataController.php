<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecognitionData;

class RecognitionDataController extends Controller
{
    public function store(Request $request)
    {
        // Obtener los datos del JSON enviado
        $jsonData = $request->json()->all();

        // Iterar sobre los resultados del JSON
        foreach ($jsonData['results'] as $result) {
            // Crear una nueva instancia de RecognitionData
            $recognitionData = new RecognitionData();

            // Asignar valores a los campos individuales
            $recognitionData->epoch_time = $jsonData['epoch_time'];
            $recognitionData->img_width = $jsonData['img_width'];
            $recognitionData->img_height = $jsonData['img_height'];
            $recognitionData->error = $jsonData['error'];
            $recognitionData->version = $jsonData['version'];
            $recognitionData->credit_cost = $jsonData['credit_cost'];
            $recognitionData->uuid = $jsonData['uuid'];
            $recognitionData->processing_time_plates = $jsonData['processing_time']['plates'];
            $recognitionData->processing_time_vehicles = $jsonData['processing_time']['vehicles'];
            $recognitionData->processing_time_total = $jsonData['processing_time']['total'];
            $recognitionData->region_of_interest_y = $jsonData['regions_of_interest'][0]['y'];
            $recognitionData->region_of_interest_height = $jsonData['regions_of_interest'][0]['height'];
            $recognitionData->region_of_interest_x = $jsonData['regions_of_interest'][0]['x'];
            $recognitionData->region_of_interest_width = $jsonData['regions_of_interest'][0]['width'];
            $recognitionData->credits_monthly_used = $jsonData['credits_monthly_used'];
            $recognitionData->credits_monthly_total = $jsonData['credits_monthly_total'];

            // ... asigna otros campos según sea necesario ...

            // Asignar valores para candidates (puedes ajustar esto según la estructura real)
            $recognitionData->plate_index = $result['plate_index'];
            $recognitionData->plate = $result['plate'];
            $recognitionData->region = $result['region'];
            $recognitionData->plate_confidence = $result['confidence'];
            $recognitionData->plate_coordinates_x1 = $result['coordinates'][0]['x'];
            $recognitionData->plate_coordinates_y1 = $result['coordinates'][0]['y'];
            $recognitionData->plate_coordinates_x2 = $result['coordinates'][2]['x'];
            $recognitionData->plate_coordinates_y2 = $result['coordinates'][2]['y'];
            $recognitionData->vehicle_detected = $result['vehicle_detected'];

            // Asignar valores para vehicle_region
            $recognitionData->vehicle_region_y = $result['vehicle_region']['y'];
            $recognitionData->vehicle_region_x = $result['vehicle_region']['x'];
            $recognitionData->vehicle_region_width = $result['vehicle_region']['width'];
            $recognitionData->vehicle_region_height = $result['vehicle_region']['height'];

            // Iterar sobre candidates y guardar en la base de datos
            foreach ($result['candidates'] as $candidate) {
                $recognitionData->candidate_matches_template = $candidate['matches_template'];
                $recognitionData->candidate_plate = $candidate['plate'];
                $recognitionData->candidate_confidence = $candidate['confidence'];

                // ... asigna otros campos relacionados con candidates ...

                // Guardar el registro en la base de datos
                $recognitionData->save();
            }

            // ... lógica para manejar otros campos y relaciones ...
        }

        // Retorna una respuesta exitosa o algún mensaje según sea necesario
        return response()->json(['message' => 'Datos de reconocimiento almacenados correctamente'], 201);
    }
}
