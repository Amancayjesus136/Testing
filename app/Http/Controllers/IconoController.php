<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Icono;
use App\Models\IconoPrincipal;

class IconoController extends Controller
{
    public function create()
    {
        $iconosPrincipales = IconoPrincipal::all();
        return view('icon.create', compact('iconosPrincipales'));
    }

    public function store(Request $request)
    {
        // Crear un nuevo IconoPrincipal
        $iconoPrincipal = IconoPrincipal::create([
            'titulo_principal' => $request->titulo_principal,
            'descripcion_principal' => $request->descripcion_principal,
        ]);

        // Guardar los iconos asociados al IconoPrincipal
        foreach ($request->icono as $key => $value) {
            $iconoNuevo = new Icono();
            $iconoNuevo->titulo_icono = $request->titulo_icono[$key];
            $iconoNuevo->descripcion_icono = $request->descripcion_icono[$key];
            $iconoNuevo->icono = $value;
            $iconoNuevo->id_icono_principal = $iconoPrincipal->id_icono_principal;
            $iconoNuevo->save();
        }

        return redirect()->back()->with('success', 'Icono exitosamente.');
    }


}
