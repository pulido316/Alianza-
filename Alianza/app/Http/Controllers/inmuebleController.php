<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
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

class inmuebleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $contar=DB::select("SELECT COUNT(id) numero FROM `inmuebles`");
        $inmuebles = Inmueble::all();
        $dataInmuebles = array();

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
        // return response()->json($dataInmuebles);
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



    $persona=$request->persona_select;
    $servicios=$request->select_servicio;
    $detalles=$request->select_detalle;
    $lugar=$request->lugar_select;
    $tipo=$request->tipo_select;
    $direccion=$request->direccion;
    $area_total=$request->are_inmueble;
    $area_construccion=$request->cons_inmueble;
    $observacion=$request->observacion;
    $img=$request->file('img_url');
    



    $id= Inmueble::insertGetId(['persona_id'=>$persona,'lugar_id'=>$lugar,'tipo_id'=>$tipo,'area_total'=>$area_total,'direccion'=>$direccion,'area_construccion'=>$area_construccion,'observacion'=>$observacion]);
    if ($servicios != null) {
        foreach ($servicios as $servicio) {
          Dotacion::insert(['inmueble_id'=>$id,'servicio_id'=>$servicio,]);
      }
  }
  if ($detalles != null) {
   foreach ($detalles as $detalle) {
      Distribucion::insert(['inmueble_id'=>$id,'detalle_id'=>$detalle,'cantidad'=>'1',]);
  }
}

foreach ($img as $imagen ) {
    $file_url=time().'_'.$imagen->getClientOriginalName();
    Storage::disk('prueba')->put($file_url,file_get_contents( $imagen->getRealPath() ));
    Imagen::insert(['inmueble_id'=>$id,'url_img'=>$file_url]);
}
return Redirect::to('inmueble');  
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
    public function buscar($id)
    {
        echo $id;
        //SELECT * FROM `personas` WHERE documento_id =1049630805
     // $buscar= DB::select("SELECT id,documento_id CC, nombre nombres, apellido apellidos, email correo, telefono telefono, observacion observacion FROM `personas` WHERE documento_id = '".$id."'");
      //dd($buscar);
       // $busqueda=Persona::where('documento_id',$id)->first();
        //return response()->json($busqueda);
    }
}
