<?php

namespace App\Http\Controllers;

use App\Models\Trabajo;
use Illuminate\Http\Request;

class TrabajoController extends Controller
{
    // Mostrar listado de trabajos
    public function index()
    {
        $trabajos = Trabajo::getTrabajos();
        return view('trabajos.index', compact('trabajos'));
    }


    public function create()
    {
        return view('trabajos.create');
    }


    public function store(Request $request)
    {
        $request->validate(
            [
                'tipo_prenda' => 'required|max:50',
                'arreglo' => 'required|max:100',
                'cliente_nombre' => 'required|max:100|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
                'cliente_telefono' => 'required|numeric|digits_between:7,15',
                'estado' => 'required|max:20',
            ],
            [
                'tipo_prenda.required' => 'El tipo de prenda es obligatorio.',
                'arreglo.required' => 'El arreglo es obligatorio.',
                'cliente_nombre.required' => 'El nombre del cliente es obligatorio.',
                'cliente_nombre.regex' => 'El nombre solo debe contener letras.',
                'cliente_telefono.required' => 'El teléfono es obligatorio.',
                'cliente_telefono.numeric' => 'El teléfono solo debe contener números.',
                'cliente_telefono.digits_between' => 'El teléfono debe tener entre 7 y 15 dígitos.',
                'estado.required' => 'El estado es obligatorio.',
            ]
        );



        Trabajo::createTrabajo($request->all());

        return redirect()->route('trabajos.index')
            ->with('success', 'Trabajo registrado correctamente.');
    }


    public function edit(Trabajo $trabajo)
    {
        return view('trabajos.edit', compact('trabajo'));
    }


    public function update(Request $request, Trabajo $trabajo)
    {
        $request->validate(
            [
                'tipo_prenda' => 'required|max:50',
                'arreglo' => 'required|max:100',
                'cliente_nombre' => 'required|max:100|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
                'cliente_telefono' => 'required|numeric|digits_between:7,15',
                'estado' => 'required|max:20',
            ],
            [
                'tipo_prenda.required' => 'El tipo de prenda es obligatorio.',
                'arreglo.required' => 'El arreglo es obligatorio.',
                'cliente_nombre.required' => 'El nombre del cliente es obligatorio.',
                'cliente_nombre.regex' => 'El nombre solo debe contener letras.',
                'cliente_telefono.required' => 'El teléfono es obligatorio.',
                'cliente_telefono.numeric' => 'El teléfono solo debe contener números.',
                'cliente_telefono.digits_between' => 'El teléfono debe tener entre 7 y 15 dígitos.',
                'estado.required' => 'El estado es obligatorio.',
            ]
        );



        $trabajo->updateTrabajo($request->all());

        return redirect()->route('trabajos.index')
            ->with('success', 'Trabajo actualizado correctamente.');
    }


    public function destroy(Trabajo $trabajo)
    {
        Trabajo::deleteTrabajo($trabajo);

        return redirect()->route('trabajos.index')
            ->with('success', 'Trabajo eliminado.');
    }
}
