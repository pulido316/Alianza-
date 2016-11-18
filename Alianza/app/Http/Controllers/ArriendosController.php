<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Inmueble;

use App\Distribucion;

use App\Postulacion;

use App\Imagen;

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

class ArriendosController extends Controller
{
    public function indexArriendos(){


    	$postulaciones = Postulacion::where('operacion_id',2)->get();

    	$dataInmuebles = array();

        foreach ($postulaciones as $postulacion) {

            $activos = Postulacion::where('inmueble_id', $postulacion->inmueble_id)->get();
            foreach ($activos as $activo) {
                if($activo->estado_pustulacion=="activo"){               
           
           		/*Detalles*/
    		$detalles = Distribucion::where('inmueble_id', $postulacion->inmueble_id)->get();
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
    		$operaciones = Postulacion::where('inmueble_id', $postulacion->inmueble_id)->get();
    		$dataOperaciones = array();
    		foreach ($operaciones as $operacion){
    			$operacionObj = new ObjectOperacion();
    			$operacionObj->nombre = $operacion->operacion->nombre;
    			$operacionObj->precio = $operacion->precio;
    			$dataOperaciones[] =  $operacionObj;
    					    			
    		}

    		/*Imagen*/
    		$imagen=Imagen::where('inmueble_id',  $postulacion->inmueble_id)->first();
    		
    		$inmuebleObj = new ObjectInmueble();
    		$inmuebleObj->id = $postulacion->inmueble_id;
    		$inmuebleObj->lugar = $postulacion->inmueble->lugar->nombre;
    		$inmuebleObj->tipo = $postulacion->inmueble->tipo->nombre;
    		$inmuebleObj->detalles = $dataDetalles;
    		$inmuebleObj->operaciones = $dataOperaciones;
    		$inmuebleObj->imagen = $imagen->url_img;

    		$dataInmuebles[]= $inmuebleObj;
    		}
        }
    	}
    	
    	$data=array(
    		'postulaciones'=>$dataInmuebles,
           
        );
    	return view('usuario.arriendos', $data);
    }
}