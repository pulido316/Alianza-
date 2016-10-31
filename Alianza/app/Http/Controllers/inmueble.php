<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
class inmueble extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $cantidad=DB::select("SELECT COUNT(`id`)numero FROM `inmuebles`");
       $todos=DB::select("SELECT i.id id, CONCAT(p.nombre, ' ', p.apellido) As nombre,p.documento_id cc,l.nombre barrio,t.nombre tipo , i.direccion direccion,i.area_total metros_total,i.area_construccion metros_construccion_total, i.observacion observacion FROM inmuebles i,personas p,lugares l, tipos t where i.`persona_id`=p.id and i.`lugar_id`=l.id and i.`tipo_id`=t.id");

       $data=array(
        'contar'=>$cantidad,
        'todos'=>$todos,
        );
       return view('administrador.inmueble',$data);
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
