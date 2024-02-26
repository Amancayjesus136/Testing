<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objetivo;
use App\Models\Indicador;
use App\Models\Actividad;

class ProjectController extends Controller
{
    public function index()
    {
        return view('project.index');
    }

    public function listado()
    {
        $objetivos = Objetivo::all();
        return view('project.listado', compact('objetivos'));
    }

    public function store(Request $request)
    {
        // Crear objetivos
        $objetivosData = $request->input('objetivos');
        
        if ($objetivosData && is_array($objetivosData)) {
            foreach ($objetivosData as $objetivoData) {
                // Verificar si 'nombre' está presente antes de intentar acceder a él
                $nombreObjetivo = $objetivoData['nombre'] ?? null;
    
                if ($nombreObjetivo) {
                    $objetivo = Objetivo::create([
                        'nombre' => $nombreObjetivo,
                        'proyecto' => $request->input('proyecto'),
                        'dimension' => $request->input('dimension'),
                    ]);
    
                    // Crear indicadores
                    $indicadoresData = $objetivoData['indicadores'] ?? [];
                    
                    foreach ($indicadoresData as $indicadorData) {
                        // Verificar si 'nombre' está presente antes de intentar acceder a él
                        $nombreIndicador = $indicadorData['nombre'] ?? null;
    
                        if ($nombreIndicador) {
                            $indicador = Indicador::create([
                                'nombre' => $nombreIndicador,
                                'id_objetivo' => $objetivo->id_objetivo,
                            ]);
    
                            // Crear actividades
                            $actividadesData = $indicadorData['actividades'] ?? [];
    
                            foreach ($actividadesData as $actividadData) {
                                // Verificar si 'nombre' está presente antes de intentar acceder a él
                                $nombreActividad = $actividadData['nombre'] ?? null;
    
                                if ($nombreActividad) {
                                    Actividad::create([
                                        'nombre' => $nombreActividad,
                                        'id_indicador' => $indicador->id_indicador,
                                    ]);
                                }
                            }
                        }
                    }
                }
            }
        }
    
        return redirect()->back()->with('success', 'Detalles editados correctamente');
    }
    




}
