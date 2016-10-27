<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Lugar; 
use Redirect;

class Lugares extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barrio = DB::select("SELECT l.id id,l.nombre nombre,l.tipo tipo,u.nombre zona FROM lugares l, lugares u WHERE l.ubicacion_id=u.id");
        $zona = DB::select("SELECT id,nombre FROM `lugares` where tipo = 'Zona'");

        $data=array('barrios'=>$barrio,
            'zonas'=>$zona,
            );
       // $lugar = DB::table('lugares')->paginate(5);
       // dd($lugar);
        return view('administrador.lugares',$data);
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
           $zona= $request->zona;
          // $barrio->tipo='barrio';
          // dd($barrio);
          Lugar::insert(['nombre' => $nombre, 'ubicacion_id'=> $zona, 'tipo'=> 'barrio']);
          return Redirect::to('lugares');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function buscar($id)
    {
       // dd($id);
        //$buscar= DB::select("SELECT * FROM `lugares` WHERE `id` = '".$id."'");
        $busqueda=Lugar::where('id',$id)->first();
        //dd($busqueda);
        return response()->json($busqueda);
    }
    public function show($id)
    {
      
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
    public function actualizar(Request $request, $id)
    {
         

           
           $nombre= $request->nombre_edi;
           $zona= $request->zona_edi;
          // $barrio->tipo='barrio';
           // dd($nombre,$zona);
        $dato =  Lugar::where('id',$id)->update(['nombre' => $nombre, 'ubicacion_id'=> $zona]);
       return Redirect::to('lugares');
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
