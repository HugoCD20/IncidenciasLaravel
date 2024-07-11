<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asignacion;
use App\Models\Incidencias;
class mostrarTareas extends Controller
{
    public function show($id)
    {
        $tareas = [];
        $asignaciones = Asignacion::where('user_id', $id)->get();

        foreach ($asignaciones as $asignacion) {
            $tarea = Incidencias::find($asignacion->incidencia_id);
            if ($tarea) {
                $tareas[] = $tarea;
            }
        }

        return view('TareasTecnico', compact('tareas'));
    }

}
