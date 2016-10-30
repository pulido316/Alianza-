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
        $contar= DB::select("SELECT COUNT(`id`)numero FROM personas");
        $data=array(
            'personas'=>$persona,
            'contar'=>$contar,
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
       return Redirect::to('personas');
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
    public function buscar($id)
    {

        //SELECT * FROM `personas` WHERE documento_id =1049630805
     // $buscar= DB::select("SELECT id,documento_id CC, nombre nombres, apellido apellidos, email correo, telefono telefono, observacion observacion FROM `personas` WHERE documento_id = '".$id."'");
      //dd($buscar);
        $busqueda=Persona::where('documento_id',$id)->first();
        return response()->json($busqueda);
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
    public function actualizar(Request $request, $id)
    {
       

        $nombre= $request->edi_nombre;
        $apellido=$request->edi_apellido;
        $cc=$request->edi_cc;
        $correo=$request->edi_correo;
        $telefono=$request->edi_telefono;
        $observacion=$request->edi_observacion;

       // dd($id,$nombre,$apellido,$cc,$correo,$telefono,$observacion);

       $dato=Persona::where('documento_id',$id)->update(['nombre'=> $nombre,'apellido'=> $apellido,'email'=> $correo,'documento_id'=> $cc,'telefono'=> $telefono,'observacion'=> $observacion]);
        return Redirect::to('personas');
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
