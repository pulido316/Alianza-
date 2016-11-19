@extends('layouts.app_index')

@section('content')

<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.css">
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/select2.min.css">
<script type="text/javascript" src="js/select2.min.js"></script>

<div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Publicaciones
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa  fa-tags  fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        @foreach($contar as $cantidad)

                                        {!! $cantidad->numero !!}

                                        @endforeach
                                    </div>
                                    <div>Publicaciones</div>
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
                                    <div>Nueva Publicacion</div>
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
                    <div id="tabla_lista" class="table-responsive table tabla_lista" style="display: none;">
                        <table id="example"  class="table table-hover table-striped  table-striped table-borderedSeen">
                            <thead>
                                <tr>
                                    <th>Direccion</th>
                                    <th>Operacion</th>
                                    <th>Fecha de publicacion</th>
                                    <th>Fecha de cierre publicacion</th>
                                    <th>Estado</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($valores as $valor)
                               <tr>
                                   <td>{!! $valor->direccion !!}</td>
                                   <td>{!! $valor->operacion !!}</td>
                                   <td>{!! $valor->inicio !!}</td>
                                   <td>{!! $valor->fin !!}</td>
                                   <td>{!! $valor->estado !!}</td>
                                   <td>
                                    <button class="btn btn-primary editar_boton" id="{!! $valor->id !!}">editar</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="add_publicacion" class="col-lg-6 " style="display: none;">
                    <form role="form"  method="POST" action="{{url('publicaciones')}}">
                        {{csrf_field()}}
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess">Seleccione direccion del inmueble</label><br>
                            <select id="direccion_inmueble" name="direccion_inmueble" required style="width: 29em">
                                @foreach( $inmuebles as $inmueble)
                                <option value="{!!$inmueble->id!!}"> {!!$inmueble->direccion!!}  Barrio: 
                                    {!!$inmueble->barrio!!} </option>
                                    @endforeach
                                </select><br>
                                <label class="control-label" for="inputSuccess">Seleccione fecha de cierre</label><br>
                                <input type="date" name="fecha_fin" required="">
                                <br>
                                <br>
                                <label class="control-label" for="inputSuccess">
                                    Tipo de publicacion:
                                </label>
                                <br>
                                
                                

                                <input name="venta" type="checkbox" id="venta" value="1" ><label>Venta</label><br>
                                <input type="number" name="precio_venta" id="precio_venta" placeholder="Precio de venta" style="display: none"> <br>
                                <input name="arriendo" id="arriendo" type="checkbox" value="2" ><label>Arriendo</label><br>
                                <input type="number" placeholder="Precio de arriendo" name="precio_arriendo" id="precio_arriendo" style="display: none"> <br>

                                <p id="seleccion" class="bg-danger" style="display: none"><strong>Seleccione una opción</strong></p>


                                <br>
                                <center>
                                   <button type="submit" class="btn btn-primary" id="checkBtn">Publicar</button>
                                   <button id="cancelar" type="reset" class="btn btn-warning">Cancelar</button>
                               </center>
                           </div>
                       </form>

                   </div>
               </div>
           </div>
       </div>
   </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#checkBtn').click(function() {
          checked = $("input[type=checkbox]:checked").length;

          if(!checked) {
             //alert("You must check at least one checkbox.");
             $("#seleccion").show()
             return false;
         }

     });
    });

    $("#venta").click(function(){
        if ($("#venta").prop('checked')) {
         $("#precio_venta").show()
         $("#precio_venta").attr('required', 'required'); 
     }
     else{
         $("#precio_venta").hide() 
         $("#precio_venta").attr('required', false);
     }
 });
     $("#arriendo").click(function(){
        if ($("#arriendo").prop('checked')) {
         $("#precio_arriendo").show()
         $("#precio_arriendo").attr('required', 'required'); 
     }
     else{
         $("#precio_arriendo").hide() 
         $("#precio_arriendo").attr('required', false);
     }
 });

    $("#direccion_inmueble").select2(),
    $('#example').dataTable();


    $("#listar").click(function(){
        $(".tabla_lista").show()
        $("#add_publicacion").hide()

    });
    $("#crear").click(function(){
        $(".tabla_lista").hide()
        $("#add_publicacion").show()

    });
    $("#cancelar").click(function(){
      $(".tabla-lista").hide()
      $("#add_publicacion").hide()

  });




</script>
@stop




