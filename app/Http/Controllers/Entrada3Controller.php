<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use Illuminate\Http\Request;

class Entrada3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      //Diversos modos de enviar una respuesta


  /*
     Simple return insertamnete laravel recibira esa cadena de respuesta la convertira en un Http Response para enviarla a el Cliente
  */
    //  return "respuesta";



      /*
         Cuando devolvemos una vista ya sea  desde un controllador o desde una funcion anomina un clouse en el sismtea de ruting tambien
         se pone en marcha el sistema de Response de laravel sin que el programador necesite usarlo diretamente.
      */

    //return view(entrada.index);




          /*
            A travez del Helper "response" podemos crear facilmente una instancia  del objeto response, en este primer
            ejemplo tenemos una respuesta exactamente igual a la que consigeriamos con un simple return,
            este caso el helper return esta recibiendo dos prametros el contenido de la respuesta y el codigo de Estatus.
          */

          return response("Error",404);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function show(Entrada $entrada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function edit(Entrada $entrada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entrada $entrada)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entrada $entrada)
    {
        //
    }
}
