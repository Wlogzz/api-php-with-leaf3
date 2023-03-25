<?php

app()->get("/", function () {
    response()->json(["message" => "Hola putos, este es el inicio"]);
});

app()->get("/contactos", 'ContactosController@index');

app()->get("/contactos/{id}", 'ContactosController@consultar');

app()->post("/contactos", 'ContactosController@agregar');

app()->delete("/contactos/{id}", 'ContactosController@eliminar');

app()->put("/contactos/{id}", 'ContactosController@actualizar');

app()->get("/app", function () {
    // app() returns $app
    response()->json(app()->routes());
});
