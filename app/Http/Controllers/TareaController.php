<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TareaController extends Controller
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
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            "titulo"=> "required|string|max:255",
            "descripcion"=> "required|string|max:255",
            "id"=>"required|string",
        ]);
        $data=[
            'user_id'=>auth()->user()->id,
            'incidencia_id'=>$request->id,
            'titulo'=>$request->titulo,
            'descripcion'=>$request->descripcion,
            'estado'=>'iniciado',
        ];
        Tarea::create($data);
        return redirect(route('Tarea.show',$request->id));
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarea $tarea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarea $tarea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarea $tarea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarea $tarea)
    {
        //
    }
}
