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

class ResultadoController extends Controller
{
    public function arriendoCasa(){
        $postulaciones = Postulacion::where('operacion_id',2)->get();

        $dataInmuebles = array();

        foreach ($postulaciones as $postulacion) {
          if ($postulacion->inmueble->tipo->id==1) {
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
        
        $data=array(
            'postulaciones'=>$dataInmuebles,
           
        );
         if(sizeof($dataInmuebles) != 0){
       return view('resultados.arriendoCasa',$data);
    }else{
        return view('usuario.noArriendo');
        //return response()->json($data);
    }
    	
    }

    public function arriendoApartamen(){
       
       $postulaciones = Postulacion::where('operacion_id',2)->get();
        $dataInmuebles = array();

        foreach ($postulaciones as $postulacion) {
          if ($postulacion->inmueble->tipo->id==3) {
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
        
        $data=array(
            'postulaciones'=>$dataInmuebles,
           
        );
        if(sizeof($dataInmuebles) != 0){
      return view('resultados.arriendoApartamen',$data);
    }else{
        return view('usuario.noArriendo');
        //return response()->json($data);
    }
    	
    }

      public function arriendoApartaes(){
        $postulaciones = Postulacion::where('operacion_id',2)->get();
        $dataInmuebles = array();

        foreach ($postulaciones as $postulacion) {
          if ($postulacion->inmueble->tipo->id==4) {
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
        
        $data=array(
            'postulaciones'=>$dataInmuebles,
           
        );
        if(sizeof($dataInmuebles) != 0){
      return view('resultados.arriendoApartaes',$data);
    }else{
        return view('usuario.noArriendo');
        //return response()->json($data);
    }
    	
    }

    public function arriendoLocal(){
        $postulaciones = Postulacion::where('operacion_id',2)->get();
        $dataInmuebles = array();

        foreach ($postulaciones as $postulacion) {
          if ($postulacion->inmueble->tipo->id==5) {
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
        
        $data=array(
            'postulaciones'=>$dataInmuebles,
           
        );
        if(sizeof($dataInmuebles) != 0){
      return view('resultados.arriendoLocal',$data);
    }else{
        return view('usuario.noArriendo');
        //return response()->json($data);
    }
    	
    }

    public function ventaCasa(){
         $postulaciones = Postulacion::where('operacion_id',1)->get();

        $dataInmuebles = array();

        foreach ($postulaciones as $postulacion) {
          if ($postulacion->inmueble->tipo->id==1) {
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
        
        $data=array(
            'postulaciones'=>$dataInmuebles,
           
        );
        if(sizeof($dataInmuebles) != 0){
     return view('resultados.ventaCasa',$data);
    }else{
        return view('usuario.noVenta');
        //return response()->json($data);
    }
    	
    }

    public function ventaApartamen(){
         $postulaciones = Postulacion::where('operacion_id',1)->get();

        $dataInmuebles = array();

        foreach ($postulaciones as $postulacion) {
          if ($postulacion->inmueble->tipo->id==3) {
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
        
        $data=array(
            'postulaciones'=>$dataInmuebles,
           
        );
         if(sizeof($dataInmuebles) != 0){
    return view('resultados.ventaApartamen',$data);
    }else{
        return view('usuario.noVenta');
        //return response()->json($data);
    }
    	
    }

      public function ventaApartaes(){
         $postulaciones = Postulacion::where('operacion_id',1)->get();

        $dataInmuebles = array();

        foreach ($postulaciones as $postulacion) {
          if ($postulacion->inmueble->tipo->id==4) {
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
        
        $data=array(
            'postulaciones'=>$dataInmuebles,
           
        );
        if(sizeof($dataInmuebles) != 0){
     return view('resultados.ventaApartaes',$data);
    }else{
        return view('usuario.noVenta');
        //return response()->json($data);
    }
    	
    }

    public function ventaLote(){
         $postulaciones = Postulacion::where('operacion_id',1)->get();

        $dataInmuebles = array();

        foreach ($postulaciones as $postulacion) {
          if ($postulacion->inmueble->tipo->id==2) {
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
        
        $data=array(
            'postulaciones'=>$dataInmuebles,
           
        );
        if(sizeof($dataInmuebles) != 0){
   return view('resultados.ventaLote',$data);
    }else{
        return view('usuario.noVenta');
        //return response()->json($data);
    }
    	
    }
}