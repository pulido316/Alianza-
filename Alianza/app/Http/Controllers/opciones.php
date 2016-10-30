<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Redirect;
use App\Detalle;
use App\Servicio;
use App\Operacion;
class opciones extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contar_servicios= DB::select("SELECT COUNT(`id`)numero FROM servicios");
        $contar_detalles= DB::select("SELECT COUNT(`id`)numero FROM detalles");
        $contar_operaciones= DB::select("SELECT COUNT(`id`)numero FROM operaciones");
        $servicio=DB::select("SELECT id id,nombre nombre FROM `servicios`");
        $distribuciones=DB::select("SELECT id id,nombre nombre FROM `detalles`");
        $opciones=DB::select("SELECT id id,nombre nombre FROM `operaciones`");
        $data=array(
            'contar_servicios'=>$contar_servicios,
            'contar_detalles'=>$contar_detalles,
            'contar_operaciones'=>$contar_operaciones,
            'servicio'=>$servicio,
            'distribuciones'=>$distribuciones,
            'opciones'=>$opciones,
            );
        return view('administrador.opciones',$data);
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
       $nombre_servicio= $request->nombre_servicio;
       $nombre_detalle=  $request->nombre_detalle;
       $nombre_operacion= $request->nombre_operacion;
          // $barrio->tipo='barrio';
       if ($request->nombre_servicio) {
        Servicio::insert(['nombre' => $nombre_servicio]);
        return Redirect::to('opciones');
    }elseif ($request->nombre_detalle) {
      Detalle::insert(['nombre' => $nombre_detalle]);
      return Redirect::to('opciones');
      
  }
  elseif ($request->nombre_operacion) {
     Operacion::insert(['nombre' => $nombre_operacion]);
     return Redirect::to('opciones');
     
 }

         // Lugar::insert(['nombre' => $nombre, 'ubicacion_id'=> $zona, 'tipo'=> 'barrio']);
         // return Redirect::to('lugares');

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
