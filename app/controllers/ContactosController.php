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

    public function consultar($id)
    {
        $datosContactos = Contactos::find($id);
        response()->json($datosContactos);
    }

    // Método para crear un nuevo modelo en la db
    public function agregar()
    {
        $contacto = new Contactos;
        $contacto->nombre = app()->request()->get('nombre');
        $contacto->primer_apellido = app()->request()->get('primer_apellido');
        $contacto->segundo_apellido = app()->request()->get('segundo_apellido');
        $contacto->correo = app()->request()->get('correo');
        $contacto->save();

        response()->json(["Información" => "Contacto agregado exitosamente"]);
    }
    
    public function eliminar($id)
    {
        Contactos::destroy($id);
        response()->json(["Información" => "el Contacto con id 0".$id." ha sido eliminado exitosamente"]);
    }

    public function actualizar($id)
    {
        $nombre = app()->request()->get('nombre');
        $primer_apellido = app()->request()->get('primer_apellido');
        $segundo_apellido = app()->request()->get('segundo_apellido');
        $correo = app()->request()->get('correo');
        
        $contacto = Contactos::findOrFail($id);

        $contacto->nombre =($nombre!="")?$nombre:$contacto->nombre;
        $contacto->primer_apellido =($primer_apellido!="")?$primer_apellido:$contacto->primer_apellido;
        $contacto->segundo_apellido =($segundo_apellido!="")?$segundo_apellido:$contacto->segundo_apellido;
        $contacto->correo =($correo!="")?$correo:$contacto->correo;

        $contacto->update();

        response()->json(["Información" => "el Contacto con id 0".$id." ha sido actualizado exitosamente"]);
    }
}
