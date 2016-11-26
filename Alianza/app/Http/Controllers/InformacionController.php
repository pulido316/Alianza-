<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class InformacionController extends Controller
{
    /**
    * Create view file
    *
    * @return void
    */
    public function index(){

    	return view('administrador.informacion');
    }
    public function updateAvaluo(Request $request)
    {

     $request->infoAvaluo;
     $fp = fopen("js/avaluo.txt", "w");
     fputs($fp, $request->infoAvaluo);
     fclose($fp);

     return view('administrador.informacion');
 }

 public function updateLicencia(Request $request){

     $request->infoLicencia;
     $fp = fopen("js/licencia.txt", "w");
     fputs($fp, $request->infoLicencia);
     fclose($fp);

     return view('administrador.informacion');
 }

 public function updatePropiedad(Request $request){

     $request->infoPropiedad;
     $fp = fopen("js/propiedad.txt", "w");
     fputs($fp, $request->infoPropiedad);
     fclose($fp);

     return view('administrador.informacion');
 }

 public function updateRemodelacion(Request $request){

     $request->infoRemodelacion;
     $fp = fopen("js/remodelacion.txt", "w");
     fputs($fp, $request->infoRemodelacion);
     fclose($fp);

     return view('administrador.informacion');
 }

public function updateTramite(Request $request){

     $request->infoTramite;
     $fp = fopen("js/tramite.txt", "w");
     fputs($fp, $request->infoTramite);
     fclose($fp);

     return view('administrador.informacion');
 }

}