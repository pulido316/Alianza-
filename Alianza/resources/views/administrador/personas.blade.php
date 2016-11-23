
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
							Personas
						</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="panel panel-info">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-users  fa-4x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge">
											@foreach($contar as $cuenta)

										{!! $cuenta->numero !!}

										@endforeach
										</div>
										<div>Personas</div>
									</div>
								</div>
							</div>
							<a href="#">
								<div id="listar" class="panel-footer">
									<span class="pull-left">Listar</span>
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
										<i class="fa fa-user fa-4x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><br></div>
										<div>Nueva Persona</div>
									</div>
								</div>
							</div>
							<a href="#">
								<div id="persona-nueva" class="panel-footer">
									<span class="pull-left">Crear</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div id="tabla-lista" class="table-responsive table tabla-lista" style="display: none;">
							<table id="example"  class="table table-hover table-striped  table-striped table-borderedSeen" >
								<thead>
									<tr>
										<th>CC</th>
										<th>Nombres</th>
										<th>Apellidos</th>
										<th>Correo</th>
										<th>Teléfono</th>
										<th>Observación</th>
										<th>Editar</th>                                      
									</tr>
								</thead>
								<tbody>
									@foreach($personas as $persona)
									<tr>
										<td>{!! $persona->CC!!}</td>
										<td>{!! $persona->nombres!!}</td>
										<td>{!! $persona->apellidos!!}</td>
										<td>{!! $persona->correo!!}</td>
										<td>{!! $persona->telefono!!}</td>
										<td>{!! $persona->observacion!!}</td>
										<td>
											<button class="btn btn-primary editar-boton" id="{!! $persona->CC !!}">editar</button>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<div id="add-persona" class="col-lg-6" style="display: none;">
							<h3>Agregar Persona</h3>
							<form role="form" method="POST" action="{{url('personas')}}">
							{{csrf_field()}}
							<div class="form-group has-success">
								<label class="control-label" for="inputSuccess">Nombres</label>
								<input type="text" class="form-control" id="nombre" name="nombre" required>
								<label class="control-label" for="inputSuccess">Apellidos</label>
								<input type="text" class="form-control" id="apellido" name="apellido" required>
								<label class="control-label" for="inputSuccess">Identificación (C.C)</label>
								<input type="number" class="form-control" id="cc" name="cc" required>
								<label class="control-label" for="inputSuccess">Correo</label>
								<input type="email" class="form-control" id="correo" name="correo" required>
								<label class="control-label" for="inputSuccess">Teléfono</label>
								<input type="number" class="form-control" id="telefono" name="telefono" required>
								<label class="control-label" for="inputSuccess">Observaciones</label>
								<textarea class="form-control" rows="5" id="observacion" name="observacion"></textarea>
								<br>
								<center>
									<button type="submit" class="btn btn-primary">Guardar</button>
									<button id="cancelar" name="cancelar" type="reset" class="btn btn-warning">Cancelar</button>
								</center>
								
							</div>

						</form>
					</div>
					<div id="editar-persona" class="col-lg-6" style="display: none;">
							<h3>Editar Persona</h3>
							<form role="form"  id="editar_persona" method="POST">
							{{csrf_field()}}
							<div class="form-group has-success">
								<label class="control-label" for="inputSuccess">Nombres</label>
								<input type="text" class="form-control" id="edi_nombre" name="edi_nombre" required>
								<label class="control-label" for="inputSuccess">Apellidos</label>
								<input type="text" class="form-control" id="edi_apellido" name="edi_apellido" required>
								<label class="control-label" for="inputSuccess">Identificacion (C.C)</label>
								<input type="number" class="form-control" id="edi_cc" name="edi_cc" required>
								<label class="control-label" for="inputSuccess">Correo</label>
								<input type="email" class="form-control" id="edi_correo" name="edi_correo" required>
								<label class="control-label" for="inputSuccess">Telefono</label>
								<input type="number" class="form-control" id="edi_telefono" name="edi_telefono" required>
								<label class="control-label" for="inputSuccess">Observaciones</label>
								<textarea class="form-control" rows="5" id="edi_observacion" name="edi_observacion"></textarea>
								<br>
								<center>
									<button type="submit" id="button_update" class="btn btn-primary modify-course">Salvar</button>
									<button id="cancelar_edi" name="cancelar_edi" type="reset" class="btn btn-warning">Cancelar</button>
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
 $('#example').dataTable();

	$("#listar").click(function(){
		$(".tabla-lista").show()
		$("#add-persona").hide()
		$("#editar-persona").hide()
	});
	$("#persona-nueva").click(function(){
		$(".tabla-lista").hide()
		$("#add-persona").show()
		$("#editar-persona").hide()
	});
	$("#cancelar").click(function(){
		$(".tabla-lista").hide()
		$("#add-persona").hide()
		$("#editar-persona").hide()
	});
	$("#cancelar_edi").click(function(){
		$(".tabla-lista").hide()
		$("#add-persona").hide()
		$("#editar-persona").hide()
	});
	$(".editar-boton").click(function(){
		$(".tabla-lista").hide()
		$("#add-persona").hide()
		$("#editar-persona").show()
		var dataId = this.id;
		$("#button_update").attr("id", dataId);
		$('#editar_persona').attr("action", '{{url('actualizarpersona')}}/'+dataId);
		$.ajax({ 
			type: 'GET', 
			url: '/buscarpersona/'+dataId, 
			dataType: 'json',
			success: function (data) {
				$("#edi_nombre").val(data.nombre);
				$("#edi_apellido").val(data.apellido);
				$("#edi_cc").val(data.documento_id);
				$("#edi_correo").val(data.email);
				$("#edi_telefono").val(data.telefono);
				$("#edi_observacion").val(data.observacion);
				
			},
			error:function(msg) {
	   			// body...
	   			console.log(msg+"fallo");
	   		}
	   	});
	});
	
	
</script>
@stop