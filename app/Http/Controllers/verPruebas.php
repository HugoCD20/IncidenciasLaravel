<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;

class verPruebas extends Controller
{
    public function show($id){
        $datos = Tarea::join('users', 'tareas.user_id', '=', 'users.id')
                        ->where('tareas.incidencia_id', $id)
                        ->select('tareas.*', 'users.name as usuario_nombre')
                        ->get();
                        
            return view('Pruebas', compact('datos'));
    }
}
