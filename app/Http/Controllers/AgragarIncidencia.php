<?php

namespace App\Http\Controllers;
use App\Models\Incidencias;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;
class AgragarIncidencia extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
        {
            // Validación de los datos
            $request->validate([
                'titulo' => 'required|string|max:255',
                'descripcion' => 'required|string|max:255',
                'evidencia' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Evidencia es opcional
            ]);
        
            // Preparación de los datos
            $data = [
                'titulo' => $request->titulo,
                'descripcion' => $request->descripcion,
                'etapa' => 'Sin Asignar',
            ];

            // Procesar la evidencia (ya validada como obligatoria)
            $file = $request->file('evidencia');
            $path = $file->store('evidencias', 'public'); // Guarda el archivo en el disco 'public' en el directorio 'evidencias'
            $path = "storage/".$path;
            $data['evidencias'] = $path;

            // Creación del registro
            $request->user()->incidencia()->create($data);

            // Redirección
            return redirect(route('Incidencia.index'));
        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
