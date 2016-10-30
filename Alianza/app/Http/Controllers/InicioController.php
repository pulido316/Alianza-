<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Inmueble;

use App\Distribucion;

use App\Postulacion;

use App\Imagen;

use App\Dotacion;

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
    	
    	$data=array(
    		'inmuebles'=>$dataInmuebles,
           
        );
    	return view('usuario.inicio', $data);
    }

    public function acercaDe(){
    	return view('usuario.acercaDe');
    }

    public function contacto(){
    	return view ('usuario.contacto');
    }

    public function buscarInmueble(Request $request){
    	$lugar= $request->lugar;
        $tipo= $request->tipo;
        $habitacion= $request->habitacion;
        $baño= $request->baño;
        $operacion= $request->operacion;
        $precio= $request->precio;
        
        return response()->json($busqueda);
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
}