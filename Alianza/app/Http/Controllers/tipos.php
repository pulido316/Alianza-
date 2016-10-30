<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Tipo; 
use Redirect;
class tipos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $tipos = DB::select("SELECT `id`id,`nombre` nombre FROM `tipos` WHERE 1");
        $contar= DB::select("SELECT COUNT(`id`)numero FROM tipos");
       $data=array(
        'tipos'=>$tipos,
        'contar'=>$contar,
        );
        // dd($data);
       return view('administrador.tipos',$data);
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
       // dd($nombre);
        Tipo::insert(['nombre' => $nombre]);
        return Redirect::to('tipos');
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
    public function buscar($id)
    {


        $busqueda=Tipo::where('id',$id)->first();
        //dd($busqueda);
        return response()->json($busqueda);
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
        // echo  $id;
       //  echo  $nombre;
     
     $dato =  Tipo::where('id',$id)->update(['nombre' => $nombre]);
     return Redirect::to('tipos');
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
