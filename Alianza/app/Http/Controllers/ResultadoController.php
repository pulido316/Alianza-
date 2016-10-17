<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ResultadoController extends Controller
{
    public function arriendoCasa(){
    	return view('resultados.arriendoCasa');
    }

    public function arriendoApartamen(){
    	return view('resultados.arriendoApartamen');
    }

      public function arriendoApartaes(){
    	return view('resultados.arriendoApartaes');
    }

    public function arriendoLocal(){
    	return view('resultados.arriendoLocal');
    }

    public function ventaCasa(){
    	return view('resultados.ventaCasa');
    }

    public function ventaApartamen(){
    	return view('resultados.ventaApartamen');
    }

      public function ventaApartaes(){
    	return view('resultados.ventaApartaes');
    }

    public function ventaLote(){
    	return view('resultados.ventaLote');
    }
}