<?php

namespace App\Http\Controllers;

use App\Models\Asignacion;
use App\Models\Incidencias;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
class AsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $data = [
            'user_id' => $request->tecnico,
            'incidencia_id' => $request->incidencia,
        ];
        Asignacion::create($data);

        $incidencia = Incidencias::findOrFail($request->incidencia);
        $incidencia->update([
            'etapa' => 'Asignado', // Cambia 'nueva_etapa' al valor deseado
            // Puedes actualizar otros campos según sea necesario
        ]);
        // Redirección
        return redirect(route('Incidencia.index', $request->incidencia));
    }

    /**
     * Display the specified resource.
     */
    public function show(Asignacion $asignacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asignacion $asignacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asignacion $asignacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asignacion $asignacion)
    {
        //
    }
}
