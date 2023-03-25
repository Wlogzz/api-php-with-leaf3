<?php

namespace App\Controllers;

use App\Models\Contactos;

class ContactosController extends Controller
{

    // Método para acceder a los registros de la tabla contactos
    public function index()
    {
        $datosContactos = Contactos::all();
        // response()->json(["message" => "Hola putos, este es el modelo de Contactos"]);
        response()->json($datosContactos);
    }

    public function consultar($id){
        $datosContactos = Contactos::find($id);
        response()->json($datosContactos);
    }
}
