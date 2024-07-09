<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Incidencias;
class asignacion extends Controller
{
    public function show($id){
        $incidencia = Incidencias::find($id);
        $Tecnicos= User::all();
        return view("asignacion",compact("incidencia","Tecnicos"));
    }
}
