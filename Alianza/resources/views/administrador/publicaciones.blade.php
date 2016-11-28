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
                  <div>Nueva Publicación</div>
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
                  <th>Dirección</th>
                  <th>Detalles de la publicación</th>
                  <th>Estado publicación</th>
                  <th>Editar</th>

                </tr>
              </thead>
              <tbody>
               @foreach ($valores as $valor)
               <tr>
                 <td>
                   {!! $valor->direccion !!}
                   <br>
                   <strong>Barrio:</strong>
                   <li>{!! $valor->barrio !!}</li>
                 </td>
                 <td>
                   <strong>Operación: </strong>
                   <br>
                   {!! $valor->operacion !!}
                   <br>
                   <strong>Se publico el: </strong>
                   <em><p>{!! $valor->inicio !!}</p></em>

                   <strong>La publicacion termina el : </strong>
                   <br>
                   @if($valor->fin =="")
                   <em>Indefinida</em>
                   @else
                   <em><p>{!! $valor->fin !!}</p></em>
                   @endif
                   <br>

                   <strong>Precio de la publicación: </strong>
                   <br>

                   ${!! number_format($valor->precio)!!}
                 </td>
                 <td> 
                   @if ($valor->estado === "activo")

                   <center>       

                     <input type="submit" class="btn btn-warning" value="Desactivar" onclick = "location='/buscarDesactivar/{!!$valor->operacion !!}{!! $valor->id !!}'"/>
                     <!--  <button  type="submit" class="btn btn-warning desactivar" id="{!!$valor->operacion !!}{!! $valor->id !!}" >Desactivar</button>
                   </form> -->
                 </center>

                 @elseif($valor->estado === "inactivo")
                 <center> 
                  <input type="submit" class="btn btn-success" value="Activar" onclick = "location='/buscarActivar/{!!$valor->operacion !!}{!! $valor->id !!}'"/>
                  <!-- <button class="btn btn-success activar" id="{!!$valor->operacion !!}{!! $valor->id !!}">Activar</button> -->


                </center>
              </td>
              @endif


              <td>
                <button class="btn btn-primary editar_boton" id="{!!$valor->operacion !!}{!! $valor->id !!}">editar</button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div id="add_publicacion" class="col-lg-6 " style="display: none;">
        <legend>Publicar</legend>
        <form role="form"  method="POST" action="{{url('publicaciones')}}">
          {{csrf_field()}}
          <div class="form-group has-success">
            <label class="control-label" for="inputSuccess">Seleccione dirección del inmueble</label><br>
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
                Tipo de publicación:
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
       <div id="editar_publicacion" class="col-lg-6 " style="display: none;">
         <legend>Editar Publicación</legend>
         <form role="form"  id="editar_publaciones" method="POST">

          {{csrf_field()}}
          <div class="form-group has-success">
            <label class="control-label" for="inputSuccess">Seleccione dirección del inmueble</label><br>
            <select id="edi_direccion_inmueble" name="edi_direccion_inmueble" required style="width: 29em">
              @foreach( $inmuebles as $inmueble)
              <option value="{!!$inmueble->id!!}"> {!!$inmueble->direccion!!}  Barrio: 
                {!!$inmueble->barrio!!} </option>
                @endforeach
              </select><br>
              <label class="control-label" for="inputSuccess">Seleccione fecha de cierre</label><br>
              <input type="date" name="edi_fecha_fin"  id="edi_fecha_fin" >

              <br>
              <br>
              <label class="control-label" for="inputSuccess">
                Tipo de publicación:
              </label>
              <br>
              <input name="edi_venta" type="checkbox" id="edi_venta" value="1" ><label id="lable_venta">Venta</label><br>
              <input type="number" name="edi_precio_venta" id="edi_precio_venta" placeholder="Precio de venta" style="display: none"> <br>
              <input name="edi_arriendo" id="edi_arriendo" type="checkbox" value="2" ><label id="lable_arriendo">Arriendo</label><br>
              <input type="number" placeholder="Precio de arriendo" name="edi_precio_arriendo" id="edi_precio_arriendo" style="display: none"> <br>

              <p id="seleccion_edi" class="bg-danger" style="display: none"><strong>Seleccione una opción</strong></p>


              <br>
              <center>

                <button type="submit" class="btn btn-primary button_update" id="checkBtnEdi">Actualizar</button>

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
  $(document).ready(function () {
    $('#checkBtnEdi').click(function() {
      checked = $("input[type=checkbox]:checked").length;

      if(!checked) {
           //alert("You must check at least one checkbox.");
           $("#seleccion_edi").show()
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
  $("#edi_venta").click(function(){
    if ($("#edi_venta").prop('checked')) {
     $("#edi_precio_venta").show()
     $("#edi_precio_venta").attr('required', 'required'); 
   }
   else{
     $("#edi_precio_venta").hide() 
     $("#edi_precio_venta").attr('required', false);
   }
 });
  $("#edi_arriendo").click(function(){
    if ($("#edi_arriendo").prop('checked')) {
     $("#edi_precio_arriendo").show()
     $("#edi_precio_arriendo").attr('required', 'required'); 
   }
   else{
     $("#edi_precio_arriendo").hide() 
     $("#edi_precio_arriendo").attr('required', false);
   }
 });

  $("#direccion_inmueble").select2(),
  $("#edi_direccion_inmueble").select2(),
  $('#example').dataTable();


  $("#listar").click(function(){
    $(".tabla_lista").show()
    $("#add_publicacion").hide()
    $("#editar_publicacion").hide()
  });
  $("#crear").click(function(){
    $(".tabla_lista").hide()
    $("#add_publicacion").show()
    $("#editar_publicacion").hide()

  });
  $("#cancelar").click(function(){
    $(".tabla-lista").hide()
    $("#add_publicacion").hide()
    $("#editar_publicacion").hide()
  });
  $(".editar_boton").click(function(){
    $(".tabla_lista").hide()
    $("#add_publicacion").hide()
    $("#editar_publicacion").show()

    var dataId = this.id;
    $(".button_update").attr("id", dataId);
    $('#editar_publaciones').attr("action", '{{url('actualizarPublicacion')}}/'+dataId);
    $.ajax({ 
      type: 'GET', 
      url: '/buscarPublicacion/'+dataId, 
      dataType: 'json',
      success: function (data) {
        if (data.operacion==="Arriendo" ) {
          $("#edi_venta").hide()
          $("#lable_venta").hide()
          $("#edi_arriendo").prop("checked",true);
          $("#edi_precio_arriendo").val(data.precio);
          $("#edi_precio_arriendo").show()


        }else if(data.operacion==="Venta"){

          $("#edi_arriendo").hide()
          $("#lable_arriendo").hide()
          $("#edi_venta").prop("checked",true);
          $("#edi_precio_venta").val(data.precio);
          $("#edi_precio_venta").show()
        }
        $("#edi_direccion_inmueble option[value='"+data.id+"']").attr("selected","selected");
        $("#select2-edi_direccion_inmueble-container").attr("title",data.direccion);
        $("#select2-edi_direccion_inmueble-container").text(data.direccion);
        $("#edi_fecha_fin").val(data.fin);
      },
      error:function(msg) {
              // body...
              console.log(msg+"fallo");
            }
          });
  });



</script>
@stop




