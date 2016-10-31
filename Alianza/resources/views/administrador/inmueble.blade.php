@extends('layouts.app_index')

@section('content')

<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.css">
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Inmuebles
                    </h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa  fa-home  fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        26
                                    </div>
                                    <div>Inmuebles</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div id="listar" class="panel-footer">
                                <span class="pull-left">listar</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa  fa-plus-square-o fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><br></div>
                                    <div>Nuevo Inmueble</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div id="crear" class="panel-footer">
                                <span class="pull-left">Crear</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <br>
            </div>


            <div class="row">
                <div class="col-lg-12">
                 <div id="tabla-lista" class="table-responsive table tabla-lista" style="display: none;">
                    <table id="example"  class="table table-hover table-striped  table-striped table-borderedSeen" >
                        <thead>
                            <tr>

                                <th>Propietario</th>
                                <th>Direccion</th>
                                <th>Tipo</th>
                                <th>Dimensiones</th>  
                                <th>Observacion</th>
                                <th>Distribucion</th>
                                <th>Servicios</th>
                                <th>editar</th>                                      
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inmuebles as $inmueble)
                            <tr>
                                <td>
                                    <strong>
                                        {!! $inmueble->persona->nombre!!}<br>

                                        C.C: 
                                    </strong><em>{!! $inmueble->persona->cc!!}</em>
                                </td>
                                <td>
                                    <strong> {!! $inmueble->lugar!!}</strong>
                                    <br>
                                    <em>{!! $inmueble->direccion!!}</em>                                    
                                </td>
                                <td>
                                    {!! $inmueble->tipo!!}
                                </td>
                                <td>
                                    <strong>area total:</strong><br>
                                    {!! $inmueble->area_total!!} m<sup>2</sup><br>
                                    <strong>area construccion:</strong><br>
                                    {!! $inmueble->area_construccion!!} m<sup>2</sup>
                                </td>
                                <td>
                                   {!! $inmueble->observacion!!}
                               </td>
                               <td>
                                 @foreach( $inmueble->detalles as $detalle)

                                 <ul>
                                     <li><strong>{!!$detalle->nombre!!}: </strong>{!!$detalle->cantidad!!}</li>
                                 </ul>
                                 @endforeach
                               </td>
                               <td>
                                 @foreach( $inmueble->servicios as $servicio)

                                 <ul>
                                     <li>{!!$servicio->nombre!!}</li>
                                 </ul>
                                 @endforeach
                               </td>
                          <td>
                            <button class="btn btn-primary editar-boton" id="{!! $inmueble->id !!}">editar</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div id="add-inmueble" class="col-lg-6" style="display: none;">
         <h1>loco re loco</h1>
     </div>
 </div>
</div>
</div>
</div>
</div>

<script type="text/javascript">
    $('#example').dataTable();

    $("#listar").click(function(){
        $(".tabla-lista").show()
        $("#add-inmueble").hide()

    });
    $("#crear").click(function(){
        $(".tabla-lista").hide()
        $("#add-inmueble").show()
    });



</script>
@stop
