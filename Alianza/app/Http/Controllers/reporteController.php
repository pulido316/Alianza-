<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use PDF;
use DB;
use Redirect;
use App\Inmueble;
use App\Distribucion;
use App\Postulacion;
use App\Imagen;
use App\Dotacion;
use App\Persona;
use App\Servicio;
use App\Detalle;
use App\Lugar;
use App\Tipo;
use Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Input;

class ObjectPersona
{
    public $nombre;
    public $cc;

}

class ObjectDetalle
{
    public $nombre;
    public $cantidad;

}
class ObjectOperacion
{
    public $nombre;
    public $precio;

}

class ObjectInmueble
{
    public $id;
    public $lugar;
    public $tipo;
    public $detalles;
    public $direccion;
    public $operacion;
    public $imagenes;
    public $area_total;
    public $area_construccion;
    public $observacion;
    public $persona;
}
class ObjectServicio
{
    public $nombre;

}

class reporteController extends Controller
{
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
   return view('administrador.reportes');
}
public function ventas(){
    $ventas=DB::select('SELECT i.id id,p.email email,i.direccion direccion,i.area_total total,o.nombre operacion,i.area_construccion construccion,l.nombre barrio,concat(p.nombre," ",p.apellido)as nombre,p.documento_id cc,t.nombre tipo,po.precio precio,po.fecha_inicio inicio,po.fecha_fin fin FROM tipos t ,inmuebles i,lugares l,personas p, postulaciones po,operaciones o WHERE i.`lugar_id`=l.id
        and i.`persona_id`=p.id
        and i.tipo_id=t.id
        and po.inmueble_id=i.id
        and po.operacion_id=o.id  
        and o.id=1
        ');
    $data=array(
        'ventas'=>$ventas,
        );
    $pdf= PDF::loadView('administrador.ventasreporte',$data);
    return $pdf->download('ventas.pdf');
}
public function arriendo(){
    $arriendos=DB::select('SELECT i.id id,p.email email,i.direccion direccion,i.area_total total,o.nombre operacion,i.area_construccion construccion,l.nombre barrio,concat(p.nombre," ",p.apellido)as nombre,p.documento_id cc,t.nombre tipo,po.precio precio,po.fecha_inicio inicio,po.fecha_fin fin FROM tipos t ,inmuebles i,lugares l,personas p, postulaciones po,operaciones o WHERE i.`lugar_id`=l.id
        and i.`persona_id`=p.id
        and i.tipo_id=t.id
        and po.inmueble_id=i.id
        and po.operacion_id=o.id  
        and o.id=2
        ');
    $data=array(
        'arriendos'=>$arriendos,
        );
    $pdf= PDF::loadView('administrador.arriendoreporte',$data);
    return $pdf->download('arriendo.pdf');
}
public function activo(){
    $activos=DB::select("SELECT i.id id,i.direccion direccion,i.area_total total,o.nombre operacion,i.area_construccion construccion,l.nombre barrio,concat(p.nombre,' ',p.apellido)as nombre,p.email email,p.documento_id cc,t.nombre tipo,po.precio precio,po.fecha_inicio inicio,po.fecha_fin fin FROM tipos t ,inmuebles i,lugares l,personas p, postulaciones po,operaciones o WHERE i.`lugar_id`=l.id and i.`persona_id`=p.id and i.tipo_id=t.id and po.inmueble_id=i.id and po.operacion_id=o.id and po.estado_pustulacion = 'activo'");
    $data=array(
        'activos'=>$activos,
        );
    $pdf= PDF::loadView('administrador.activoreporte',$data);
    return $pdf->download('inmueblesActivos.pdf');
}public function inactivo(){
    $inactivos=DB::select("SELECT i.id id,i.direccion direccion,i.area_total total,o.nombre operacion,i.area_construccion construccion,l.nombre barrio,concat(p.nombre,' ',p.apellido)as nombre,p.email email,p.documento_id cc,t.nombre tipo,po.precio precio,po.fecha_inicio inicio,po.fecha_fin fin FROM tipos t ,inmuebles i,lugares l,personas p, postulaciones po,operaciones o WHERE i.`lugar_id`=l.id and i.`persona_id`=p.id and i.tipo_id=t.id and po.inmueble_id=i.id and po.operacion_id=o.id and po.estado_pustulacion = 'inactivo'");
    $data=array(
        'inactivos'=>$inactivos,
        );
    $pdf= PDF::loadView('administrador.inactivoreporte',$data);
    return $pdf->download('inmueblesInactivos.pdf');
}
public function totales(){
    $inmuebles = Inmueble::all();
    $dataInmuebles = array();
    $contar=DB::select("SELECT COUNT(id) numero FROM `inmuebles`");
    foreach ($inmuebles as $inmueble){
        $detalles = Distribucion::where('inmueble_id', $inmueble->id)->get();
        $dataDetalles = array();
        foreach ($detalles as $detalle){
            $detalleObj = new ObjectDetalle();
            $detalleObj->nombre = $detalle->detalle->nombre;
            $detalleObj->cantidad = $detalle->cantidad;
            $dataDetalles[] =  $detalleObj ;    
                //print $detalleObj.'/////';
        }

        /*operaciones*/
        $operaciones = Postulacion::where('inmueble_id', $inmueble->id)->get();
        $dataOperaciones = array();
        foreach ($operaciones as $operacion){
            $operacionObj = new ObjectOperacion();
            $operacionObj->nombre = $operacion->operacion->nombre;
            $operacionObj->precio = $operacion->precio;
            $dataOperaciones[] =  $operacionObj;

        }

        /*servicios*/
        $servicios = Dotacion::where('inmueble_id', $inmueble->id)->get();
        $dataServicios = array();
        foreach ($servicios as $servicio){
            $servicioObj = new ObjectServicio();
            $servicioObj->nombre = $servicio->servicio->nombre;
            $dataServicios[] =  $servicioObj;

        }

        /*Imagen*/
        $imagen=Imagen::where('inmueble_id',  $inmueble->id)->get();
        //personas loco re loco
        $personaObj= new ObjectPersona();
        $personaObj->nombre=$inmueble->persona->nombre.' '.$inmueble->persona->apellido;
        $personaObj->cc=$inmueble->persona->documento_id;
        $personaObj->email=$inmueble->persona->email;
        $inmuebleObj = new ObjectInmueble();
        $inmuebleObj->lugar = $inmueble->lugar->nombre;
        $inmuebleObj->tipo = $inmueble->tipo->nombre;
        $inmuebleObj->area_total = $inmueble->area_total;
        $inmuebleObj->area_construccion = $inmueble->area_construccion;
        $inmuebleObj->observacion = $inmueble->observacion;
        $inmuebleObj->detalles = $dataDetalles;
        $inmuebleObj->operaciones = $dataOperaciones;
        $inmuebleObj->imagenes = $imagen;
        $inmuebleObj->servicios = $dataServicios;
        $inmuebleObj->persona = $personaObj;
        $inmuebleObj->direccion = $inmueble->direccion;
        // esta person esta en el objeto definido arriba de inmueble
        $dataInmuebles[]= $inmuebleObj;
    }


    $barrio = DB::select("SELECT l.id id,l.nombre nombre,l.tipo tipo,u.nombre zona FROM lugares l, lugares u WHERE l.ubicacion_id=u.id");
    $zonas = DB::select("SELECT id,nombre FROM `lugares` where tipo = 'Zona'");
    $data=array(
        'inmuebles'=>$dataInmuebles,
        'personas'=>Persona::all(),
        'servicios'=>Servicio::all(),
        'detalles'=>Detalle::all(),
        'barrios'=>$barrio,
        'zonas'=>$zonas,
        'tipos'=>Tipo::all(),
        'contar'=>$contar,
        );
    $pdf= PDF::loadView('administrador.prueba',$data);
    return $pdf->download('inmuebles_totales.pdf');
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
