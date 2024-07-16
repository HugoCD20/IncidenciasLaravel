<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Tarea;

class FinalizarController extends Controller
{
    public function store(Request $request):RedirectResponse{
        $Datos=Tarea::findOrFail($request->id);
        $Datos->update(['estado'=>'finalizado']);
        return redirect(route('Tarea.show',$request->id_incidencia));
    }
}
