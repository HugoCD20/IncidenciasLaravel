<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidencias;

class verTarea extends Controller
{
    public function show($id){
        $incidencia=Incidencias::find($id);
        return view("VerTarea",compact("incidencia"));
    }
}
