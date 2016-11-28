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
                          @foreach($contar as $cuenta)

                          {!! $cuenta->numero !!}

                          @endforeach
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
            @if(count($errors)>0)
            <div class="alert alert-danger" role="alert">
              <ul>
               <li>Error al guardar</li>
               <script type="text/javascript">
                history.back()
              </script>
            </ul>
          </div>
          @endif

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

                      {!! number_format($inmueble->area_total)!!} m<sup>2</sup><br>
                      <strong>area construccion:</strong><br>
                      {!! number_format($inmueble->area_construccion)!!} m<sup>2</sup>
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
                    <button class="btn btn-primary editar_boton" id="{!! $inmueble->id !!}">editar</button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div id="add-inmueble" class="col-lg-6 " style="display: none;">
           <h3>Agregar Tipo de Inmueble</h3>
           <form files=true role="form"  method="POST" action="{{url('inmueble')}}" enctype="multipart/form-data">
             {{csrf_field()}}
             <div class="form-group ">

               <label class="form-control-static" for="inputSuccess">Seleccione propietario del inmueble</label>
               <select id="persona_select" name="persona_select" required style="width: 29em">
                 @foreach( $personas as $persona)
                 <option value="{!!$persona->id!!}">CC: {!!$persona->documento_id!!} Nombres:  {!!$persona->nombre!!} {!!$persona->apellido!!}</option>
                 @endforeach
               </select>

               <label class="form-control-static" for="inputSuccess">Seleccione los servicios del inmueble</label><br>
               <select id="select_servicio" name="select_servicio[]" class="js-example-basic-multiple" multiple="multiple" style="width: 29em">
                 @foreach( $servicios as $servicio)
                 <option value="{!!$servicio->id!!}">{!!$servicio->nombre!!}</option>
                 @endforeach
               </select>

               <label class="form-control-static" for="inputSuccess">Seleccione Detalles del inmueble</label><br>
                 <!-- <select class="js-example-basic-multiple" name="select_detalle[]" multiple="multiple" style="width: 29em" >
                   @foreach( $detalles as $detalle)
                   <option value="{!!$detalle->id!!}">{!!$detalle->nombre!!}
                   </option>
                   @endforeach
                 </select> -->
                 <div class="form-group">
                   <div style="width: 400px; height: 200px; overflow-y: scroll;">
                     @foreach( $detalles as $detalle)
                     <label class="form-control-static" for="inputSuccess">{!!$detalle->nombre!!}</label><br>
                     <input type="number" class="form-control" id="{!!$detalle->id!!}" name="{!!$detalle->nombre!!}">
                     <br>
                     @endforeach
                   </div>

                 </div>

                 <label class="form-control-static" for="inputSuccess">Seleccione el barrio del inmueble</label><br>
                 <br>
                 <br>

                 <select id="lugar_select" name="lugar_select"  style="width: 29em" required>
                   @foreach( $barrios as $barrio)
                   <option value="{!!$barrio->id!!}">{!!$barrio->nombre!!}</option>
                   @endforeach
                 </select><br>
                 <label class="form-control-static" for="inputSuccess">Tipo de Inmueble</label>
                 <select id="tipo_select" name="tipo_select" style="width: 29em" required>
                   @foreach( $tipos as $tipo)
                   <option value="{!!$tipo->id!!}">{!!$tipo->nombre!!}</option>
                   @endforeach
                 </select>
                 <br>
                 <label class="form-control-static" for="inputSuccess">Direccion</label>
                 <input type="text" class="form-control" id="direccion" name="direccion" required>
                 @if($errors->has('direccion'))
                 <br>
                 <div class="alert alert-danger" role="alert">
                  <li>{{$errors->first('direccion')}}</li>
                </div>
                @endif
                <label class="form-control-static" for="inputSuccess">Area de Inmueble (m<sup>2</sup>)</label>
                <input type="number" class="form-control" id="are_inmueble" name="are_inmueble" required>
                @if($errors->has('are_inmueble'))
                <br>
                <div class="alert alert-danger" role="alert">
                  <li>{{$errors->first('are_inmueble')}}</li>
                </div>
                @endif
                <label class="form-control-static" for="inputSuccess">Area construccion Inmueble (m<sup>2</sup>)</label>
                <input type="number" class="form-control" id="cons_inmueble" name="cons_inmueble" required>
                @if($errors->has('cons_inmueble'))
                <br>
                <div class="alert alert-danger" role="alert">
                  <li>{{$errors->first('cons_inmueble')}}</li>
                </div>
                @endif
                <label class="form-control-static" for="inputSuccess">Observaciones</label>
                <textarea class="form-control" rows="5" id="observacion" name="observacion"></textarea>
                @if($errors->has('observacion'))
                <br>
                <div class="alert alert-danger" role="alert">
                  <li>{{$errors->first('observacion')}}</li>
                </div>
                @endif
                <br>
                <label class="form-control-static" for="inputSuccess">Cargar imagenes</label>
                <input type="file" accept="image/jpg,image/png" id="img_url" name="img_url[]" multiple="multiple" class="form-control" required>
                <br>
                <center>
                  <button type="submit" class="btn btn-primary">Guardar</button>
                  <button id="cancelar" type="reset" class="btn btn-warning">Cancelar</button>
                  <button id="limpiar" type="reset" class="btn btn-success">Limpiar</button>
                </center>

              </div>
            </form>
          </div>
          <div id="editar_inmueble" class="col-lg-6 " style="display: none;">
            <h3>Editar inmueble</h3>
            <form files=true role="form"  method="POST"  enctype="multipart/form-data">
             {{csrf_field()}}
             <div class="form-group ">

               <label class="form-control-static" for="inputSuccess">Seleccione propietario del inmueble</label>
               <select id="persona_selectedi" name="persona_selectedi" required style="width: 29em">
                 @foreach( $personas as $persona)
                 <option value="{!!$persona->id!!}">CC: {!!$persona->documento_id!!} Nombres:  {!!$persona->nombre!!} {!!$persona->apellido!!}</option>
                 @endforeach
               </select>

               <label class="form-control-static" for="inputSuccess">Seleccione los servicios del inmueble</label><br>
               <select id="select_servicio" name="select_servicio[]" class="js-example-basic-multiple" multiple="multiple" style="width: 29em">
                 @foreach( $servicios as $servicio)
                 <option value="{!!$servicio->id!!}">{!!$servicio->nombre!!}</option>
                 @endforeach
               </select>

               <label class="form-control-static" for="inputSuccess">Seleccione Detalles del inmueble</label><br>
                 <!-- <select class="js-example-basic-multiple" name="select_detalle[]" multiple="multiple" style="width: 29em" >
                   @foreach( $detalles as $detalle)
                   <option value="{!!$detalle->id!!}">{!!$detalle->nombre!!}
                   </option>
                   @endforeach
                 </select> -->
                 <div class="form-group">
                   <div style="width: 400px; height: 200px; overflow-y: scroll;">
                     @foreach( $detalles as $detalle)
                     <label class="form-control-static" for="inputSuccess">{!!$detalle->nombre!!}</label><br>
                     <input type="number" class="form-control" id="{!!$detalle->id!!}" name="{!!$detalle->nombre!!}">
                     <br>
                     @endforeach
                   </div>

                 </div>

                 <label class="form-control-static" for="inputSuccess">Seleccione el barrio del inmueble</label><br>
                 <br>
                 <br>

                 <select id="lugar_select_edi" name="lugar_select_edi"  style="width: 29em" required>
                   @foreach( $barrios as $barrio)
                   <option value="{!!$barrio->id!!}">{!!$barrio->nombre!!}</option>
                   @endforeach
                 </select><br>
                 <label class="form-control-static" for="inputSuccess">Tipo de Inmueble</label>
                 <select id="tipo_select_edi" name="tipo_select_edi" style="width: 29em" required>
                   @foreach( $tipos as $tipo)
                   <option value="{!!$tipo->id!!}">{!!$tipo->nombre!!}</option>
                   @endforeach
                 </select>
                 <br>
                 <label class="form-control-static" for="inputSuccess">Direccion</label>
                 <input type="text" class="form-control" id="direccion_edi" name="direccion_edi" required>

                 <label class="form-control-static" for="inputSuccess">Area de Inmueble (m<sup>2</sup>)</label>
                 <input type="number" class="form-control" id="are_inmueble_edi" name="are_inmueble_edi" required>

                 <label class="form-control-static" for="inputSuccess">Area construccion Inmueble (m<sup>2</sup>)</label>
                 <input type="number" class="form-control" id="cons_inmueble_edi" name="cons_inmueble_edi" required>

                 <label class="form-control-static" for="inputSuccess">Observaciones</label>
                 <textarea class="form-control" rows="5" id="observacion_edi" name="observacion_edi"></textarea>
                 <br>
                 <label class="form-control-static" for="inputSuccess">Cargar imagenes</label>
                 <input type="file" accept="image/jpg,image/png" id="img_url_edi" name="img_url[]" multiple="multiple" class="form-control" required>
                 <br>
                 <center>
                  <button id="cancelar_edi" type="reset" class="btn btn-primary button_update">Actualizar</button>
                  <button id="cancelar_edi" type="reset" class="btn btn-warning">Cancelar</button>
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

  $("#persona_select").select2(),
  $("#persona_selectedi").select2(),
  $("#lugar_select_edi").select2(),
  $("#tipo_select_edi").select2(),

  $("#lugar_select").select2(),
  $("#tipo_select").select2(),
  $(".js-example-basic-multiple").select2();

  $('#example').dataTable();
  $("#listar").click(function(){
    $(".tabla-lista").show()
    $("#add-inmueble").hide()
    $("#editar_inmueble").hide()

  });
  $("#crear").click(function(){
    $(".tabla-lista").hide()
    $("#add-inmueble").show()
    $("#editar_inmueble").hide()

  });
  $("#cancelar_edi").click(function(){
    $(".tabla-lista").hide()
    $("#add-inmueble").hide()
    $("#editar_inmueble").hide()

  });
  $("#cancelar").click(function(){
    $(".tabla-lista").hide()
    $("#add-inmueble").hide()
    $("#editar_inmueble").hide()

  });
  $(".editar_boton").click(function(){
    $("#editar_inmueble").show()
    $(".tabla-lista").hide()
    $("#add-inmueble").hide()
    var dataId = this.id;

    $(".button_update").attr("id", dataId);
    $.ajax({ 

      type: 'GET', 
      url: '/buscarInmueble/'+dataId, 
      dataType: 'json',

      success: function (data) {
        /*
        lugar_select_edi
        tipo_select_edi
        direccion_edi
        are_inmueble_edi
        cons_inmueble_edi
        observacion_edi
        img_url_edi*/
/*
        $("#persona_selectedi option[value='"+data.id+"']").attr("selected","selected");
        $("#select2-persona_selectedi-container").attr("title",data.nombres);
        $("#select2-persona_selectedi-container").text(data.nombres);
        $("#edi_fecha_fin").val(data.fin);*/
      },
      error:function(msg) {
              // body...
              console.log(msg+"fallo");
            }
          });


  });



</script>
@stop
