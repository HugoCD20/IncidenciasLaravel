<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Incidencias;

class IncidenciasTotales extends Controller
{
    public function index(): View
    {
        return view('IncidenciasTotales',[
            'Incidencia'=>Incidencias::with('user')->latest()->get(),
        ]);
    }
}
