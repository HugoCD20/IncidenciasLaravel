<?php

namespace App\Http\Controllers;

use App\Models\Incidencias;
use App\Models\Pruebas;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Tarea;
use Illuminate\Support\Facades\Auth;
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
    public function store(Request $request):RedirectResponse
    {
        $accion=$request->accion;
        if($accion== "cancelar"){
            return redirect(route("Tarea.show", $request->incidenciaID));
        }else{
            $request->validate([
                "incidenciaID"=> "required|string",
                "resultados"=> "required|string|max:255",
                "estado"=> "required|string",
            ]);
            $datos=[
                "incidencia_id"=>$request->incidenciaID,
                "user_id"=>Auth::user()->id,
                "resultados"=> $request->resultados,
                "estado"=> $accion,
            ];
            Pruebas::create($datos);
            if($accion== "no pasa"){
                return redirect(route("Tarea.show", $request->incidenciaID));
            }else{
                $incidencia=Incidencias::findOrFail($request->incidenciaID);
                $incidencia->update([
                    "etapa"=>'Finalizado',
                ]);
                return redirect(route("Tareas.show",Auth::user()->id));
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id):RedirectResponse
    {
        $tareas = Tarea::where("incidencia_id", $id)->get();
        
        if ($tareas->isEmpty()) {
            return redirect(route("Tarea.show", $id));
        } else {       
            $count=0;
            foreach($tareas as $tarea){
                if($tarea->estado != 'finalizado'){
                    $count++;
                }

            }
            if($count==0){
                return redirect(route("verPruebas.show", $id));
            }else{
                return redirect(route("Tarea.show", $id));
            }              
        }
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
