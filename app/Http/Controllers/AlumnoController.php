<?php

namespace App\Http\Controllers;
use App\Models\Alumno;
use App\Models\Materia;
use App\Models\MateriaEvento;
use App\Models\Usuarios;

use Illuminate\Http\Request;

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

        // if ($request->hasFile('nombre_materia')) {
        //     foreach ($request->file('nombre_materia') as $file) {
        //         $fileName = $file->getClientOriginalName();
    
        //         $materia = Materia::create([
        //             'nombre_materia' => $fileName,
        //         ]);
    
        //         $alumno->materias()->attach($materia->id_materia);
        //     }
        // }

        return redirect()->route('school/alumno.form_alumno')->with('success', 'Alumno y materias creados exitosamente.');
    }
}
