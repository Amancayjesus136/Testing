<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objetivo;
use App\Models\Indicador;
use App\Models\Actividad;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        return view('project.index');
    }

    public function listado()
{
    $projects = Project::with('objetivos.indicadores.actividades')->get();
    return view('project.listado', compact('projects'));
}

public function store(Request $request)
{
    // Crear proyecto
    $proyecto = Project::create([
        'titulo' => $request->input('titulo'),
        'dimension' => $request->input('dimension'),
    ]);

    // Verificar si existe el campo 'objetivos' en la solicitud
    if ($request->has('objetivos')) {
        $objetivosData = $request->input('objetivos');

        // Iterar sobre los datos de los objetivos
        foreach ($objetivosData as $objetivoData) {
            // Verificar si 'nombre' está presente antes de intentar acceder a él
            $nombreObjetivo = $objetivoData['nombre'] ?? null;

            // Verificar si 'nombre' tiene un valor
            if ($nombreObjetivo) {
                // Crear un objetivo asociado al proyecto
                $objetivo = $proyecto->objetivos()->create([
                    'nombre' => $nombreObjetivo,
                ]);

                // Crear indicadores asociados al objetivo
                $indicadoresData = $objetivoData['indicadores'] ?? [];

                foreach ($indicadoresData as $indicadorData) {
                    $nombreIndicador = $indicadorData['nombre'] ?? null;

                    if ($nombreIndicador) {
                        $indicador = Indicador::create([
                            'nombre' => $nombreIndicador,
                            'id_objetivo' => $objetivo->id_objetivo,
                            'id_project' => $proyecto->id_project,
                        ]);

                        // Crear actividades asociadas al indicador
                        $actividadesData = $indicadorData['actividades'] ?? [];

                        foreach ($actividadesData as $actividadData) {
                            $nombreActividad = $actividadData['nombre'] ?? null;

                            if ($nombreActividad) {
                                Actividad::create([
                                    'nombre' => $nombreActividad,
                                    'id_indicador' => $indicador->id_indicador,
                                    'id_project' => $proyecto->id_project,
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
