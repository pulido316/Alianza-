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
							<div id="mostrar-barrio" class="panel-footer">
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

					<div id="add-barrio" class="col-lg-6" style="display: none;">
						<center>
							

						</center>
					</div>

					<div id="editar-barrio" class="col-lg-6" style="display: none;">
											</div>

				</div>

			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$("#listar").click(function(){
		$(".tabla-lista").show()
		//$("#editar-barrio").hide()
		//$("#add-barrio").hide()
	});
</script>
@stop