<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Persona; 
use Redirect;

class Personas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persona=DB::select("SELECT id,documento_id CC, nombre nombres, apellido apellidos, email correo, telefono telefono, observacion observacion FROM  personas");
        $data=array(
            'personas'=>$persona,
            );
        

        return view('administrador.personas',$data);
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
       $nombre= $request->nombre;
       $apellido=$request->apellido;
       $cc=$request->cc;
       $correo=$request->correo;
       $telefono=$request->telefono;
       $observacion=$request->observacion;
      // dd($nombre,$apellido,$cc,$correo,$telefono,$observacion);
       Persona::insert(['nombre' => $nombre, 'apellido'=> $apellido, 'email' => $correo,'documento_id'=>$cc,'telefono'=>$telefono,'observacion'=>$observacion]);
        return Redirect::to('administrador.personas');
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
