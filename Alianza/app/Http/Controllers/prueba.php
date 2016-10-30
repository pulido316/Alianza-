<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Inmueble;
use App\Persona;
use DB;
class prueba extends Controller
{

  
    public  function prueba(){
       // $busqueda=Persona::where('id',$id)->first();
        $busqueda=DB::select("SELECT COUNT(id) numero FROM `personas`");
        return response()->json($busqueda);
        /*$prueba = Inmueble::all();
    	/* $prueba = Inmueble::find($id);
    	   $prueba->lugar;
    		$prueba->dotaciones;
    		$prueba->distribuciones;
    		$prueba->persona;
    		$prueba->tipo;
    		$prueba->postulaciones;
    dd($prueba);*/
    }
}
