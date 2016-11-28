<?php

    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Postulacion;
    use App\Inmueble;
    use App\Operacion;
    use App\Http\Requests;
    use DB;
    use Redirect;

    class postulacionController extends Controller
    {
        /**
        * Display a listing of the resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function index()
        {
            $contar=DB::select("SELECT COUNT(operacion_id) numero FROM postulaciones;");
            $publicacion=DB::select("SELECT i.id id, i.direccion direccion,lu.nombre barrio,o.nombre operacion,p.fecha_inicio inicio,p.fecha_fin fin,p.estado_pustulacion estado,p.precio precio FROM lugares lu, postulaciones p, operaciones o,inmuebles i WHERE o.id=p.operacion_id and p.inmueble_id=i.id and i.lugar_id=lu.id");

        // dd($publicacion);
            $inmueble=DB::select("SELECT i.id id, i.direccion direccion, l.nombre barrio from inmuebles i, lugares l where l.id=i.`lugar_id`
                ");
            $operacion=DB::select("SELECT id id, nombre operacion FROM `operaciones`");
            $data=array('valores'=>$publicacion,
                'contar'=>$contar,    
                'inmuebles'=>$inmueble,
                'operaciones'=>$operacion,
                );
        //dd($publicacion);

            return view('administrador.publicaciones',$data);
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

           $this->validate($request, [
            'inmueble_id'=>'required|unique:postulaciones',
            'venta'=>'numeric',
            'arriendo'=>'numeric',
            /*'are_inmueble'=>'numeric',
            'cons_inmueble'=>'numeric',
            'observacion'=> 'min:4|max:300',*/
            
            ]);


           $valor="";
           $direccion_inmueble= $request->inmueble_id;
           $fecha_fin= $request->fecha_fin;    
           $venta= $request->venta;
           $arriendo= $request->arriendo;
           $fecha=DB::select("select CURDATE() fecha");
           $arriendo_p=$request->precio_arriendo;
           $venta_p=$request->precio_venta;
           foreach ($fecha as $key) {

            $valor=$key->fecha;
        } 
        if ($venta==null && $arriendo!= null) {
            //'operacion_id','inmueble_id','fecha_inicio','fecha_fin','precio','estado_pustulacion',
          if ( $fecha_fin=="") {
            Postulacion::insert(['operacion_id'=>$arriendo,'inmueble_id'=>$direccion_inmueble,'fecha_inicio'=>$valor,'precio'=>$arriendo_p,'estado_pustulacion'=>"activo"]);
            return Redirect::to('publicaciones');
        }else{
            if ($valor>$fecha_fin) {
             Postulacion::insert(['operacion_id'=>$arriendo,'inmueble_id'=>$direccion_inmueble,'fecha_inicio'=>$valor,'fecha_fin'=>$fecha_fin,'precio'=>$arriendo_p,'estado_pustulacion'=>"inactivo"]);
             return Redirect::to('publicaciones');
         }else{
            Postulacion::insert(['operacion_id'=>$arriendo,'inmueble_id'=>$direccion_inmueble,'fecha_inicio'=>$valor,'fecha_fin'=>$fecha_fin,'precio'=>$arriendo_p,'estado_pustulacion'=>"activo"]);
            return Redirect::to('publicaciones');
        }
    }
}elseif ($venta!=null && $arriendo== null) {
    if ( $fecha_fin=="") {
        Postulacion::insert(['operacion_id'=>$venta,'inmueble_id'=>$direccion_inmueble,'fecha_inicio'=>$valor,'precio'=>$venta_p,'estado_pustulacion'=>"activo"]);
        return Redirect::to('publicaciones');
    }else{
        if ($valor>$fecha_fin) {
            Postulacion::insert(['operacion_id'=>$venta,'inmueble_id'=>$direccion_inmueble,'fecha_inicio'=>$valor,'fecha_fin'=>$fecha_fin,'precio'=>$venta_p,'estado_pustulacion'=>"inactivo"]);
            return Redirect::to('publicaciones');
        }else{
            Postulacion::insert(['operacion_id'=>$venta,'inmueble_id'=>$direccion_inmueble,'fecha_inicio'=>$valor,'fecha_fin'=>$fecha_fin,'precio'=>$venta_p,'estado_pustulacion'=>"activo"]);
            return Redirect::to('publicaciones');
        }
    }
}else{
        //insert de dos valores.
    if ( $fecha_fin=="") {
        Postulacion::insert(['operacion_id'=>$venta,'inmueble_id'=>$direccion_inmueble,'fecha_inicio'=>$valor,'precio'=>$venta_p,'estado_pustulacion'=>"activo"]);
        Postulacion::insert(['operacion_id'=>$arriendo,'inmueble_id'=>$direccion_inmueble,'fecha_inicio'=>$valor,'precio'=>$arriendo_p,'estado_pustulacion'=>"activo"]);
        return Redirect::to('publicaciones');
    }else{
        if ($valor>$fecha_fin) {
            Postulacion::insert(['operacion_id'=>$arriendo,'inmueble_id'=>$direccion_inmueble,'fecha_inicio'=>$valor,'fecha_fin'=>$fecha_fin,'precio'=>$arriendo_p,'estado_pustulacion'=>"inactivo"]);
            Postulacion::insert(['operacion_id'=>$venta,'inmueble_id'=>$direccion_inmueble,'fecha_inicio'=>$valor,'fecha_fin'=>$fecha_fin,'precio'=>$venta_p,'estado_pustulacion'=>"inactivo"]);
            return Redirect::to('publicaciones');
        }else{

            Postulacion::insert(['operacion_id'=>$arriendo,'inmueble_id'=>$direccion_inmueble,'fecha_inicio'=>$valor,'fecha_fin'=>$fecha_fin,'precio'=>$arriendo_p,'estado_pustulacion'=>"activo"]);
            Postulacion::insert(['operacion_id'=>$venta,'inmueble_id'=>$direccion_inmueble,'fecha_inicio'=>$valor,'fecha_fin'=>$fecha_fin,'precio'=>$venta_p,'estado_pustulacion'=>"activo"]);
            return Redirect::to('publicaciones');
        }
    }
}
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
        public function buscarDesactivar($id){
            $inmueble_id = intval(preg_replace('/[^0-9]+/', '', $id), 10);
            $arriendo=substr($id, 0,8);
            
            if (substr($id, 0,8)=="Arriendo") {
                $insertArriendo= Postulacion::where([
                    ['inmueble_id', '=', $inmueble_id],
                    ['operacion_id', '=', '2'],
                    ])->update(['estado_pustulacion'=>'inactivo' ]);
                return Redirect::to('publicaciones');
            } elseif(substr($id, 0,5)=="Venta"){
               $insertArriendo= Postulacion::where([
                ['inmueble_id', '=', $inmueble_id],
                ['operacion_id', '=', '1'],
                ])->update(['estado_pustulacion'=>'inactivo' ]);
               return Redirect::to('publicaciones');
           }

       }
       public function buscarActivar($id){
        $inmueble_id = intval(preg_replace('/[^0-9]+/', '', $id), 10);
        $arriendo=substr($id, 0,8);

        if (substr($id, 0,8)=="Arriendo") {
            $insertArriendo= Postulacion::where([
                ['inmueble_id', '=', $inmueble_id],
                ['operacion_id', '=', '2'],
                ])->update(['estado_pustulacion'=>'activo' ]);
            return Redirect::to('publicaciones');
        } elseif(substr($id, 0,5)=="Venta"){
           $insertArriendo= Postulacion::where([
            ['inmueble_id', '=', $inmueble_id],
            ['operacion_id', '=', '1'],
            ])->update(['estado_pustulacion'=>'activo' ]);
           return Redirect::to('publicaciones');
       }
   }
   public function buscarPublicacion($id)
   {
        // 'operacion_id','inmueble_id','fecha_inicio','fecha_fin','precio','estado_pustulacion',

    $inmueble = intval(preg_replace('/[^0-9]+/', '', $id), 10);
    if (substr($id, 0,8)=="Arriendo") {

     $busqueda=DB::select("SELECT i.id id, i.direccion direccion,o.nombre operacion,p.fecha_inicio inicio,p.fecha_fin fin,p.estado_pustulacion estado, p.precio precio FROM postulaciones p, operaciones o,inmuebles i WHERE o.id=p.operacion_id and p.inmueble_id=i.id and i.id= $inmueble and o.nombre LIKE 'Arriendo'");
        //dd($busqueda);

     foreach ($busqueda as $buscar ) {
        return response()->json($buscar);
    }
}elseif (substr($id, 0,5)=="Venta") {

    $busqueda=DB::select("SELECT i.id id, i.direccion direccion,o.nombre operacion,p.fecha_inicio inicio,p.fecha_fin fin,p.estado_pustulacion estado, p.precio precio FROM postulaciones p, operaciones o,inmuebles i WHERE o.id=p.operacion_id and p.inmueble_id=i.id and i.id= $inmueble and o.nombre LIKE 'Venta'");
         //dd($busqueda);
    foreach ($busqueda as $buscar ) {
        return response()->json($buscar);
    }
}


}

public function actualizarPublicacion(Request $request, $id)
{
    $valor="";
    $inmueble_id = intval(preg_replace('/[^0-9]+/', '', $id), 10);
    $fecha_inicio=DB::select("select CURDATE() fecha_inicio");
    $fecha_fin=$request->edi_fecha_fin;
    $precio_arriendo=$request->edi_precio_arriendo;
    $precio_venta=$request->edi_precio_venta;
    $activo="activo";
    foreach ($fecha_inicio as $key) {
        $valor=$key->fecha_inicio;
    } 
    if (substr($id, 0,8)=="Arriendo") {
        if ($fecha_fin=="") {
            $insertArriendo= Postulacion::where([
                ['inmueble_id', '=', $inmueble_id],
                ['operacion_id', '=', '2'],
                ])->update(['fecha_inicio' => $valor, 'fecha_fin' => null,  'precio'=>$precio_arriendo, 'estado_pustulacion'=>'activo' ]);
            return Redirect::to('publicaciones');
        }else{
            $insertArriendo= Postulacion::where([
                ['inmueble_id', '=', $inmueble_id],
                ['operacion_id', '=', '2'],
                ])->update(['fecha_inicio' => $valor, 'fecha_fin'=> $fecha_fin, 'precio'=>$precio_arriendo, 'estado_pustulacion'=>'activo' ]);
            return Redirect::to('publicaciones');
        }

    }elseif (substr($id, 0,5)=="Venta") {
        if ($fecha_fin=="") {
            $insertArriendo= Postulacion::where([
                ['inmueble_id', '=', $inmueble_id],
                ['operacion_id', '=', '1'],
                ])->update(['fecha_inicio' => $valor, 'fecha_fin' => null,'precio'=>$precio_venta, 'estado_pustulacion'=>'activo' ]);
            return Redirect::to('publicaciones');
        }else{
           $insertArriendo= Postulacion::where([
            ['inmueble_id', '=', $inmueble_id],
            ['operacion_id', '=', '1'],
            ])->update(['fecha_inicio' => $valor, 'fecha_fin'=> $fecha_fin, 'precio'=>$precio_venta, 'estado_pustulacion'=>'activo' ]);
           return Redirect::to('publicaciones');
       }
   }
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
