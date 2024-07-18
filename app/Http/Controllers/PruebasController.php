<?php

namespace App\Http\Controllers;

use App\Models\Pruebas;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Tarea;

class PruebasController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $datos = Tarea::join('users', 'tareas.user_id', '=', 'users.id')
                       ->where('tareas.incidencia_id', $id)
                       ->select('tareas.*', 'users.name as usuario_nombre')
                       ->get();
        return view("Pruebas",compact("datos"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pruebas $pruebas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pruebas $pruebas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pruebas $pruebas)
    {
        //
    }
}
