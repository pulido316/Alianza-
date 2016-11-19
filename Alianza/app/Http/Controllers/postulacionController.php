<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Postulacion;
use App\Http\Requests;
use DB;
use Redirect;

class postulacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contar=DB::select("SELECT COUNT(operacion_id) numero FROM postulaciones;");
        $publicacion=DB::select("SELECT i.id id, i.direccion direccion,o.nombre operacion,p.fecha_inicio inicio,p.fecha_fin fin,p.estado_pustulacion estado FROM postulaciones p, operaciones o,inmuebles i WHERE o.id=p.operacion_id and p.inmueble_id=i.id;");
       // dd($publicacion);
        $inmueble=DB::select("SELECT i.id id, i.direccion direccion, l.nombre barrio from inmuebles i, lugares l where l.id=i.`lugar_id`
            ");
        $operacion=DB::select("SELECT id id, nombre operacion FROM `operaciones`");
        $data=array('valores'=>$publicacion,
            'contar'=>$contar,    
            'inmuebles'=>$inmueble,
            'operaciones'=>$operacion,
            );
        //dd($publicacion);

        return view('administrador.publicaciones',$data);
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
       $valor="";
        $direccion_inmueble= $request->direccion_inmueble;
        $fecha_fin= $request->fecha_fin;
        $venta= $request->venta;
        $arriendo= $request->arriendo;
        $fecha=DB::select("select CURDATE() fecha");
        $arriendo_p=$request->precio_arriendo;
        $venta_p=$request->precio_venta;
        foreach ($fecha as $key) {
            $valor=$key->fecha;
         } 
        if ($venta==null && $arriendo!= null) {
            //'operacion_id','inmueble_id','fecha_inicio','fecha_fin','precio','estado_pustulacion',
            Postulacion::insert(['operacion_id'=>$arriendo,'inmueble_id'=>$direccion_inmueble,'fecha_inicio'=>$valor,'fecha_fin'=>$fecha_fin,'precio'=>$arriendo_p,'estado_pustulacion'=>"activo"]);
            return Redirect::to('publicaciones');
          //insert en arriendo   Lugar::insert(['nombre' => $nombre, 'ubicacion_id'=> $zona, 'tipo'=> 'barrio']);    return Redirect::to('lugares');
           /* echo "direccion ".$direccion_inmueble. " fecha fin " . $fecha_fin ." arriendo".$arriendo."  fecha sistema ".$valor." valor arriendo ".$arriendo_p." valor venta ". $venta_p;*/
        }elseif ($venta!=null && $arriendo== null) {
            Postulacion::insert(['operacion_id'=>$venta,'inmueble_id'=>$direccion_inmueble,'fecha_inicio'=>$valor,'fecha_fin'=>$fecha_fin,'precio'=>$venta_p,'estado_pustulacion'=>"activo"]);
            return Redirect::to('publicaciones');
          //insert ventas
           /* echo "direccion ".$direccion_inmueble. " fecha fin " . $fecha_fin ." venta".$venta."  fecha sistema ".$valor." valor arriendo ".$arriendo_p." valor venta ". $venta_p;*/
        }else{
            Postulacion::insert(['operacion_id'=>$arriendo,'inmueble_id'=>$direccion_inmueble,'fecha_inicio'=>$valor,'fecha_fin'=>$fecha_fin,'precio'=>$arriendo_p,'estado_pustulacion'=>"activo"]);
            Postulacion::insert(['operacion_id'=>$venta,'inmueble_id'=>$direccion_inmueble,'fecha_inicio'=>$valor,'fecha_fin'=>$fecha_fin,'precio'=>$venta_p,'estado_pustulacion'=>"activo"]);
            return Redirect::to('publicaciones');
            /*
            echo "direccion ".$direccion_inmueble. " fecha fin " . $fecha_fin ." arriendo = ".$arriendo ." venta= " .$venta." ".$valor." valor arriendo ".$arriendo_p." valor venta ". $venta_p;*/
        }
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
