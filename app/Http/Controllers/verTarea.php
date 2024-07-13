<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidencias;
use App\Models\Tarea;

class verTarea extends Controller
{
    public function show($id){
        $incidencia=Incidencias::find($id);
        $tareas=Tarea::where("incidencia_id",$incidencia->id)->where("estado","iniciado")->get();
        return view("VerTarea",compact("incidencia","tareas"));
    }
}
