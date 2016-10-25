	@extends('layouts.app_index')

	@section('content')
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
						<div class="panel panel-primary">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-users  fa-4x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge">26</div>
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
						<div class="panel panel-green">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-user fa-4x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge">12</div>
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
						<div id="tabla-lista" class="table-responsive">
							<table id="example" style="display: none;" class="table table-hover table-striped tabla-lista table-striped table-borderedSeen" >
								<thead>
									<tr>
										<th>CC</th>
										<th>Nombres</th>
										<th>Apellidos</th>
										<th>Correo</th>
										<th>Telefono</th>
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
											<button class="btn btn-primary editar-boton" id="{!! $persona->id !!}">editar</button>
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
								<label class="control-label" for="inputSuccess">Identificacion (C.C)</label>
								<input type="number" class="form-control" id="cc" name="cc" required>
								<label class="control-label" for="inputSuccess">Correo</label>
								<input type="email" class="form-control" id="correo" name="correo" required>
								<label class="control-label" for="inputSuccess">Telefono</label>
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
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$("#listar").click(function(){
		$(".tabla-lista").show()
		$("#add-persona").hide()
	});
	$("#persona-nueva").click(function(){
		$(".tabla-lista").hide()
		$("#add-persona").show()
	});
	$("#cancelar").click(function(){
		$(".tabla-lista").hide()
		$("#add-persona").hide()
	});
</script>
@stop