<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use App\Models\Incidencias;
use Illuminate\Http\Request;

class IncidenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('dashboard',[
            'Incidencia'=>Incidencias::with('user')->latest()->get(),
        ]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Encuentra la incidencia por su ID
        $incidencia = Incidencias::find($id);
        return view('mostrar', compact('incidencia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Incidencias $incidencias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Incidencias $incidencias)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Incidencias $incidencias)
    {
        //
    }
}
