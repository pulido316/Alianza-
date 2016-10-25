<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Inmueble;
class prueba extends Controller
{

  
    public  function prueba($id){
        $prueba = Inmueble::all();
    	/* $prueba = Inmueble::find($id);
    	   $prueba->lugar;
    		$prueba->dotaciones;
    		$prueba->distribuciones;
    		$prueba->persona;
    		$prueba->tipo;
    		$prueba->postulaciones;*/
    dd($prueba);
    }
}
