<?php

namespace App\Http\Controllers;
use App\Models\Alumno;
use App\Models\Materia;
use App\Models\MateriaEvento;
use App\Models\Usuarios;
use App\Models\Evidencia;
use App\Models\EvidenciaAlumno;
use App\Models\Actividad;
use App\Models\Client;
use App\Models\Archivo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlumnoController extends Controller
{
    public function list_alumno()
    {
        $alumnos = Alumno::all();
        return view('client.list', compact('alumnos'));
    }

    public function form_alumno()
    {
        $users = Usuarios::all();
        return view('client.create', compact('users'));
    }

    public function form_evidence()
    {
        return view('client.file');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $alumno = Alumno::create($data);
    
        if ($request->has('nombre_materia')) {
            $materiasIds = $request->input('nombre_materia');
    
            foreach ($materiasIds as $materiaId) {
                $materia = Materia::firstOrCreate(['id_materia' => $materiaId], ['nombre_materia' => $materiaId]);
                $alumno->materias()->syncWithoutDetaching($materia->id_materia);
            }
        }
    
        if ($request->hasFile('nombre_evidencia')) {
            foreach ($request->file('nombre_evidencia') as $file) {
                $fileName = $file->getClientOriginalName();
    
                $evidencia = Evidencia::create([
                    'nombre_evidencia' => $fileName,
                ]);
    
                $alumno->evidencias()->attach($evidencia->id_evidencia);
            }
        }

        if ($request->has('nombre_actividad')) {
            $nombreActividades = $request->input('nombre_actividad');

            foreach ($nombreActividades as $actividadSeparada) {
                $valores = explode(',', $actividadSeparada);

                foreach ($valores as $valor) {
                    $actividad = Actividad::create([
                        'nombre_actividad' => $valor,
                    ]);

                    $alumno->actividades()->attach($actividad->id_actividad);
                }
            }
        }
    
        return redirect()->route('school/alumno.form_alumno')->with('success', 'Alumno y materias creados exitosamente.');
    }


    public function store_evidence(Request $request)
    {

        $cliente = new Client;
        $cliente->nombre_cliente = $request->input('nombre_cliente');
        $cliente->save();

        if ($request->hasFile('nombre_archivo')) {
            $archivos = $request->file('nombre_archivo');

            foreach ($archivos as $archivo) {
                if ($archivo->isValid()) {
                    $nombreArchivo = $archivo->getClientOriginalName();
                    $archivo->storeAs('archivos', $nombreArchivo, 'public');

                    $cliente->archivos()->create([
                        'nombre_archivo' => $nombreArchivo,
                    ]);
                }
            }

            return redirect()->back()->with('success', 'Archivos y cliente subidos correctamente');
        }

        return redirect()->back()->with('error', 'No se han seleccionado archivos para subir');
    }
    
}
