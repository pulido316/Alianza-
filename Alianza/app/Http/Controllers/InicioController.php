<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

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

use App\Operacion;

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
		    public $operacion;
		    public $imagenes;
		    public $area_total;
		    public $area_construccion;
		    public $observacion;
		    
		}
class ObjectServicio
		{
		    public $nombre;
		    
		}

class InicioController extends Controller
{
    public function indexInicio(){
    	
        $acutlizarDatos=DB::update('UPDATE `postulaciones` SET `estado_pustulacion`= "inactivo" WHERE `fecha_inicio`>`fecha_fin`');

    	$inmuebles = Inmueble::all();
            
    	$dataInmuebles = array();

            foreach ($inmuebles as $inmueble){
         
            /*Detalles*/
            $detalles = Distribucion::where('inmueble_id', $inmueble->id)->get();
            $dataDetalles = array();
            foreach ($detalles as $detalle){
                if ($detalle->detalle_id==1  || $detalle->detalle_id==2) {
                    $detalleObj = new ObjectDetalle();
                    $detalleObj->nombre = $detalle->detalle->nombre;
                    $detalleObj->cantidad = $detalle->cantidad;
                    $dataDetalles[] =  $detalleObj ;    
                }
                
            }
            /*operaciones*/
            $operaciones = Postulacion::where('inmueble_id', $inmueble->id)->get();
            $dataOperaciones = array();
            $activo = false;
            foreach ($operaciones as $operacion){
                if($operacion->estado_pustulacion=="activo"){
                $operacionObj = new ObjectOperacion();
                $operacionObj->nombre = $operacion->operacion->nombre;
                $operacionObj->precio = $operacion->precio;
                $dataOperaciones[] =  $operacionObj;
                $activo = true;
                  }                      
            }

            if($activo == true){
                /*Imagen*/
            $imagen=Imagen::where('inmueble_id',  $inmueble->id)->first();
            
            $inmuebleObj = new ObjectInmueble();
            $inmuebleObj->id = $inmueble->id;
            $inmuebleObj->lugar = $inmueble->lugar->nombre;
            $inmuebleObj->tipo = $inmueble->tipo->nombre;
            $inmuebleObj->detalles = $dataDetalles;
            $inmuebleObj->operaciones = $dataOperaciones;
            $inmuebleObj->imagen = $imagen->url_img;

            $dataInmuebles[]= $inmuebleObj;
            }
            
    }
        
        $barrio = DB::select("SELECT l.id id,l.nombre nombre,l.tipo tipo,u.nombre zona FROM lugares l, lugares u WHERE l.ubicacion_id=u.id");
        $zonas = DB::select("SELECT id,nombre FROM `lugares` where tipo = 'Zona'");
        $data=array(
            'inmuebles'=>$dataInmuebles,
            'barrios'=>$barrio,
            'zonas'=>$zonas,
            'tipos'=>Tipo::all(),
            'operaciones'=>Operacion::all(),
            'postulaciones'=>Postulacion::all(),
            );
        return view('usuario.inicio', $data);
       	
    }

    public function acercaDe(){
    	return view('usuario.acercaDe');
    }

    public function contacto(){
    	return view ('usuario.contacto');
    }

  
/**
    public function verInmueble(){
    	$inmuebles = Inmueble::all();
    	return response()->json($inmuebles);
    }*/

    public function detallesInmueble($id){
    	$inmueble = Inmueble::where('id', $id)->first();

    	$detalles = Distribucion::where('inmueble_id', $id)->get();
    		$dataDetalles = array();
    		foreach ($detalles as $detalle){
    				$detalleObj = new ObjectDetalle();
    				$detalleObj->nombre = $detalle->detalle->nombre;
    				$detalleObj->cantidad = $detalle->cantidad;
    				$dataDetalles[] =  $detalleObj ;	
    				//print $detalleObj.'/////';
    		}

    		/*operaciones*/
    		$operaciones = Postulacion::where('inmueble_id', $id)->get();
    		$dataOperaciones = array();
    		foreach ($operaciones as $operacion){
    			$operacionObj = new ObjectOperacion();
    			$operacionObj->nombre = $operacion->operacion->nombre;
    			$operacionObj->precio = $operacion->precio;
    			$dataOperaciones[] =  $operacionObj;
    					    			
    		}

    		/*servicios*/
    		$servicios = Dotacion::where('inmueble_id', $id)->get();
    		$dataServicios = array();
    		foreach ($servicios as $servicio){
    			$servicioObj = new ObjectServicio();
    			$servicioObj->nombre = $servicio->servicio->nombre;
    			$dataServicios[] =  $servicioObj;
    					    			
    		}

    		/*Imagen*/
    		$imagen=Imagen::where('inmueble_id',  $id)->get();
    		    
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

    		
    		$data=array(
    		'inmueble'=>$inmuebleObj,
           
        	);
        	//return response()->json($data);
    		return view('usuario.inmueble', $data);
    	
    }

    public function buscarInmueble(Request $request){
        $lugar= $request->lugar;
        $tipo= $request->tipo;
        $habitacion= $request->habitacion;
        $baño= $request->baño;
        $operacionReq= $request->operacionReq;
        $precio= $request->precio;

        $inmuebles = Inmueble::all();
        $dataInmuebles = array();

        foreach ($inmuebles as $inmueble){
            /*Detalles*/
            $detalles = Distribucion::where('inmueble_id', $inmueble->id)->get();
            $dataDetalles = array();
            foreach ($detalles as $detalle){
                if ($detalle->detalle_id==1  || $detalle->detalle_id==2) {
                    $detalleObj = new ObjectDetalle();
                    $detalleObj->nombre = $detalle->detalle->nombre;
                    $detalleObj->cantidad = $detalle->cantidad;
                    $dataDetalles[] =  $detalleObj ;    
                }
                
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

            /*Imagen*/
            $imagen=Imagen::where('inmueble_id',  $inmueble->id)->first();
            
            $inmuebleObj = new ObjectInmueble();
            $inmuebleObj->id = $inmueble->id;
            $inmuebleObj->lugar = $inmueble->lugar->nombre;
            $inmuebleObj->tipo = $inmueble->tipo->nombre;
            $inmuebleObj->detalles = $dataDetalles;
            $inmuebleObj->operaciones = $dataOperaciones;
            $inmuebleObj->imagen = $imagen->url_img;

            $dataInmuebles[]= $inmuebleObj;
            
        }
        
        $busqueda = array();
        foreach ($dataInmuebles as $inmueble){
            if($inmueble->lugar==$lugar && $inmueble->tipo==$tipo){
                foreach ($inmueble->operaciones as $operacion) {
                    if ($operacion->nombre == $operacionReq || $operacion->precio <= $precio) {
                        $baños = false;
                        $habitaciones = false;
                        foreach ($inmueble->detalles as $detalle) {
                            if ($detalle->nombre=="Baños" || $detalle->cantidad==$baño) {
                                $baños = true;
                            }
                            elseif ($detalle->nombre=="Habitación" || $detalle->cantidad==$habitacion) {
                                $habitaciones = true;
                            }
                        }
                        if ($baños==true || $habitaciones==true) {
                            $busqueda[]= $inmueble;
                        }
                    }
                }
            }
        
        }

         $data=array(
            'inmuebles'=>$busqueda,
            
            );
         if(sizeof($busqueda) != 0){
        return view('usuario.resultadoInmueble', $data);
    }else{
        return view('usuario.noResultado');
        //return response()->json($data);
    }
    }
}