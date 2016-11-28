
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
						Más Opciones
					</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="panel panel-info">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="fa fa-plus-circle fa-4x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="huge">
										@foreach($contar_servicios as $cuenta_ser)

										{!! $cuenta_ser->numero !!}

										@endforeach
									</div>
									<div>Servicios de inmuebles</div>
								</div>
							</div>
						</div>
						<a href="#">
							<div id="servicios" class="panel-footer">
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
									<i class="fa fa-puzzle-piece  fa-4x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="huge">
										@foreach($contar_detalles as $contar_detalle)

										{!! $contar_detalle->numero !!}

										@endforeach
									</div>
									<div>Detalles de Inmuebles</div>
								</div>
							</div>
						</div>
						<a href="#">
							<div id="distribucion" class="panel-footer">
								<span class="pull-left">listar</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="panel panel-danger">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="fa  fa-suitcase  fa-4x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="huge">
										@foreach($contar_operaciones as $cuenta_op)

										{!! $cuenta_op->numero !!}

										@endforeach
									</div>
									<div>Operaciones Empresa
									</div>
								</div>
							</div>
						</div>
						<a href="#">
							<div id="operacion" class="panel-footer">
								<span class="pull-left">listar</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
			</div>


			
			<div class="row" id="panel_servicios" style="display: none;">
				<div class="col-lg-6">
					<div class="table-responsive table_servicio" style="display: none;">
						<legend>Listado de servicios</legend>
						<table id="example" class=" table-hover table-striped table table-striped table-borderedSeen display" >
							<thead>
								<tr>									
									<th>Nombre</th>
									<th>Editar</th>                                      
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Nombre</th>
									<th>Editar</th>   
								</tr>
							</tfoot>
							<tbody>
								@foreach($servicio as $serv)
								<tr>
									<td>
										{!! $serv->nombre !!}
									</td>					
									<td>
										<button class="btn btn-primary editar_boton_serv" id="{!! $serv->id !!}">editar</button>
									</td>
								</tr>


								@endforeach

							</tbody>
						</table>
					</div>
				</div>
				<div class="col-lg-4" id="add_servicio">
				<legend>Agregar servicio</legend>
				<form role="form" method="POST" action="{{url('opciones')}}">
							{{csrf_field()}}

							<div class="form-group has-success">
								<label class="control-label" for="inputSuccess">Nombre del servicio</label>
								<input type="text" class="form-control" id="nombre_servicio" name="nombre_servicio" required>
								<center>
									<br>
									<button type="submit" class="btn btn-primary">Guardar</button>
									<button id="limpiar" type="reset" class="btn btn-warning">Limpiar</button>
								</center>
							</div>

						</form>
				</div>
				<div class="col-lg-4" id="editar_servicio" style="display: none;">
				<legend>Editar servicio</legend>
				<form role="form" id="editar" method="POST">
							{{csrf_field()}}

							<div class="form-group has-success">
								<label class="control-label" for="inputSuccess">Nombre del servicio</label>
								<input type="text" class="form-control" id="nombre_edi_ser" name="nombre_edi_ser" required>
								<center>
									<br>
									<button type="submit" id="button_update1" class="btn btn-primary modify-course">Salvar</button>
									<button id="cancelar_edi_ser" name="cancelar_edi_ser" type="reset" class="btn btn-warning cancelar_edi_ser">Cancelar</button>
								</center>
							</div>

						</form>
				</div>
			</div>

			<div class="row" id="panel_distri" style="display: none;">
				<div class="col-lg-6">
					<div class="table-responsive table_distri" style="display: none;">
						<legend>Listado detalles</legend>
						<table id="example2" class=" table-hover table-striped table table-striped table-borderedSeen display" >
							<thead>
								<tr>									
									<th>Nombre</th>
									<th>Editar</th>                                      
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Nombre</th>
									<th>Editar</th>   
								</tr>
							</tfoot>
							<tbody>
								@foreach($distribuciones as $detalle)
								<tr>
									<td>
										{!! $detalle->nombre !!}
									</td>					
									<td>
										<button class="btn btn-primary editar_boton_det" id="{!! $detalle->id !!}">editar</button>
									</td>
								</tr>


								@endforeach

							</tbody>
						</table>
					</div>
				</div>
				<div class="col-lg-4" id="add_detalle">
				<legend>Agregar detalle de inmuebles</legend>
				<form role="form" method="POST" action="{{url('opciones')}}">
							{{csrf_field()}}

							<div class="form-group has-success">
								<label class="control-label" for="inputSuccess">Nombre del detalle</label>
								<input type="text" class="form-control" id="nombre_detalle" name="nombre_detalle" required>
								<center>
									<br>
									<button type="submit" class="btn btn-primary">Guardar</button>
									<button id="limpiar" type="reset" class="btn btn-warning">Limpiar</button>
								</center>
							</div>

						</form>
				</div>
				<div class="col-lg-4" id="editar_deta" style="display: none;">
				<legend>Editar detalle inmueble</legend>
				<form role="form" id="editar2" method="POST">
							{{csrf_field()}}

							<div class="form-group has-success">
								<label class="control-label" for="inputSuccess">Nombre del detalle</label>
								<input type="text" class="form-control" id="nombre_edi_det" name="nombre_edi_det" required>
								<center>
									<br>
									<button type="submit" id="button_update2" class="btn btn-primary modify-course">Salvar</button>
									<button  type="reset" class="btn btn-warning cancelar_edi_det">Cancelar</button>
								</center>
							</div>

						</form>
				</div>
			</div>

			<div class="row" id="panel_opcion" style="display: none;">
				<div class="col-lg-6">
					<div class="table-responsive table_opcion" style="display: none;">
						<legend>Listado de operaciones de la empresa</legend>
						<table id="example3" class=" table-hover table-striped table table-striped table-borderedSeen display" >
							<thead>
								<tr>									
									<th>Nombre</th>
									<th>Editar</th>                                      
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Nombre</th>
									<th>Editar</th>   
								</tr>
							</tfoot>
							<tbody>
								@foreach($opciones as $opcion)
								<tr>
									<td>
										{!! $opcion->nombre !!}
									</td>					
									<td>
										<button class="btn btn-primary editar_boton_op" id="{!! $opcion->id !!}">editar</button>
									</td>
								</tr>


								@endforeach

							</tbody>
						</table>
					</div>
				</div>
				<div class="col-lg-4" id="add_operacion">
				<legend>Agregar operacion</legend>
				<form role="form" method="POST" action="{{url('opciones')}}">
							{{csrf_field()}}

							<div class="form-group has-success">
								<label class="control-label" for="inputSuccess">Nombre de la operacion</label>
								<input type="text" class="form-control" id="nombre_operacion" name="nombre_operacion" required>
								<center>
									<br>
									<button type="submit" class="btn btn-primary">Guardar</button>
									<button id="limpiar" type="reset" class="btn btn-warning">Limpiar</button>
								</center>
							</div>
						</form>
				</div>
				<div class="col-lg-4" id="editar_operacion" style="display: none;">
				<legend>Editar detalle operacion</legend>
				<form role="form" id="editar3" method="POST">
							{{csrf_field()}}

							<div class="form-group has-success">
								<label class="control-label" for="inputSuccess">Nombre de la operacion</label>
								<input type="text" class="form-control" id="nombre_edi_opc" name="nombre_edi_opc" required>
								<center>
									<br>
									<button type="submit" id="button_update2" class="btn btn-primary modify-course">Salvar</button>
									<button  type="reset" class="btn btn-warning cancelar_edi_det">Cancelar</button>
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
/*$(".show-edit").click(function(){
		$(".table").hide()
		$("#editar-barrio").hide()
		$("#add-barrio").hide()
	});*/


	$('#example').dataTable();
	$('#example2').dataTable();
	$('#example3').dataTable();

	$("#servicios").click(function(){
		$("#panel_servicios").show()
		$("#panel_distri").hide()
		$("#panel_opcion").hide()
		$('.table_servicio').show()
	});	
	
	$(".editar_boton_serv").click(function(){
		$("#panel_servicios").show()
		$("#panel_distri").hide()
		$("#panel_opcion").hide()
		$('.table_servicio').show()
		$('#add_servicio').hide()
		$('#editar_servicio').show()

		var dataId = this.id;
		$("#button_update1").attr("id", dataId);
		$('#editar').attr("action", '{{url('actualizarservicio')}}/'+dataId);
		$.ajax({ 
			type: 'GET', 
			url: '/buscarservicio/'+dataId, 
			dataType: 'json',
			success: function (data) {
				$("#nombre_edi_ser").val(data.nombre);			
			},
			error:function(msg) {
	   			// body...
	   			console.log(msg+"fallo");
	   		}
	   	});

	});
	$(".cancelar_edi_ser").click(function(){
		$("#panel_servicios").show()
		$("#panel_distri").hide()
		$("#panel_opcion").hide()
		$('.table_servicio').show()
		$('#add_servicio').show()
		$('#editar_servicio').hide()
	});

	
	$("#distribucion").click(function(){
		$("#panel_servicios").hide()
		$("#panel_distri").show()
		$("#panel_opcion").hide()
		$(".table_distri").show()
	});

		$(".editar_boton_det").click(function(){
		$("#panel_servicios").hide()
		$("#panel_distri").show()
		$("#panel_opcion").hide()
		$('.table_distri').show()
		$('#add_detalle').hide()
		$('#editar_deta').show()

		var dataId = this.id;
		$("#button_update2").attr("id", dataId);
		$('#editar2').attr("action", '{{url('actualizardetalle')}}/'+dataId);
		$.ajax({ 
			type: 'GET', 
			url: '/buscardetalle/'+dataId, 
			dataType: 'json',
			success: function (data) {
				$("#nombre_edi_det").val(data.nombre);			
			},
			error:function(msg) {
	   			// body...
	   			console.log(msg+"fallo");
	   		}
	   	});
	});
	$(".cancelar_edi_det").click(function(){
		$("#panel_servicios").hide()
		$("#panel_distri").show()
		$("#panel_opcion").hide()
		$('.table_distri').show()
		$('#add_detalle').show()
		$('#editar_deta').hide()
	});

	$("#operacion").click(function(){
		$("#panel_servicios").hide()
		$("#panel_distri").hide()
		$("#panel_opcion").show()
		$(".table_opcion").show()
	});

		$(".editar_boton_op").click(function(){
		$("#panel_servicios").hide()
		$("#panel_distri").hide()
		$("#panel_opcion").show()
		$(".table_opcion").show()
		$('#add_operacion').hide()
		$('#editar_operacion').show()

		var dataId = this.id;
		$("#button_update3").attr("id", dataId);
		$('#editar3').attr("action", '{{url('actualizaropcion')}}/'+dataId);
		$.ajax({ 
			type: 'GET', 
			url: '/buscaropcion/'+dataId, 
			dataType: 'json',
			success: function (data) {
				$("#nombre_edi_opc").val(data.nombre);			
			},
			error:function(msg) {
	   			// body...
	   			console.log(msg+"fallo");
	   		}
	   	});
	});
	$(".cancelar_edi_det").click(function(){
		$("#panel_servicios").hide()
		$("#panel_distri").hide()
		$("#panel_opcion").show()
		$(".table_opcion").show()
		$('#add_operacion').show()
		$('#editar_operacion').hide()
	});



</script>
@stop