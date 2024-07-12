<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
class tareascontroller extends Controller
{
    public function show($id){
        return view("AñadirSolucion",compact("id"));
    }
}
