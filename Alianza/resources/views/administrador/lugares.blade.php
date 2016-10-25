@extends('layouts.app_index')

@section('content')



<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js" ></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js" ></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<div id="wrapper">
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
						Lugares
					</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="fa fa-map-marker  fa-4x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="huge">26</div>
									<div>Lugares</div>
								</div>
							</div>
						</div>
						<a href="#">
							<div id="listar-lugar" class="panel-footer">
								<span class="pull-left">Barrios</span>
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
									<i class="fa fa-tasks fa-3x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="huge"><br></div>
									<div>Nuevo Lugar</div>
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
					<div class="table-responsive table">
						<table id="example" style="display: none;" class="table table-hover table-striped table table-striped table-borderedSeen" >
							<thead>
								<tr>
									<th>Identificacion</th>
									<th>Nombre</th>
									<th>Tipo</th>
									<th>Zona</th>
									<th>Editar</th>                                      
								</tr>
							</thead>
							<tbody>
								@foreach($barrios as $barrio)
								<tr>
									<td>
										{!! $barrio->id !!}
									</td>
									<td>
										{!! $barrio->nombre !!}
									</td>
									<td>
										{!! $barrio->tipo !!}
									</td>
									<td>
										{!! $barrio->zona !!}
									</td>
									<td>
										<button class="show-edit editar-boton" id="{!! $barrio->id !!}">editar</button>
									</td>
								</tr>


								@endforeach

							</tbody>
						</table>
					</div>

					<div id="add-barrio" class="col-lg-6" style="display: none;">
						<center>
							<h1>Agregar barrio</h1>

							<form role="form" method="POST" action="{{url('lugares')}}">
								{{csrf_field()}}
								<div class="form-group has-success">
									<label class="control-label" for="inputSuccess">Nombre del barrio</label>
									<input type="text" class="form-control" id="nombre" name="nombre" required>
									<label class="control-label" for="inputSuccess">Seleccione zona</label>
									<select name="zona" class="form-control" id="zona">

										@foreach($zonas as $zona)

										<option value="{{ $zona->id }}">{{ $zona->nombre }}</option>

										@endforeach

									</select>
									<br>
									<button type="submit" class="btn btn-primary">Submit Button</button>
									<button id="cancelar" type="reset" class="btn btn-warning">Reset Button</button>
								</div>

							</form>

						</center>
					</div>

					<div id="editar-barrio" class="col-lg-6" style="display: none;">
						<center>
							<h1>Editar barrio</h1>

							<form role="form" id="editar_barrios" method="POST">
								{{csrf_field()}}
								<div class="form-group has-success">
									<label class="control-label" for="inputSuccess">Nombre del barrio</label>
									<input type="text" class="form-control" id="nombre_edi" name="nombre_edi" required>
									<label class="control-label" for="inputSuccess">Seleccione zona</label>
									<select name="zona_edi" class="form-control" id="zona_edi">

										@foreach($zonas as $zona)

										<option value="{{ $zona->id }}">{{ $zona->nombre }}</option>

										@endforeach

									</select>
									<br>
									<button type="submit" id="button_update" class="btn btn-primary modify-course">Salvar</button>
									<button id="cancelar_editar" type="reset" class="btn btn-warning">Cancelar</button>
								</div>

							</form>

						</center>
					</div>

				</div>

			</div>
			<!-- /.container-fluid -->

		</div>

		<script type="text/javascript">
			$(".show-edit").click(function(){
				$(".table").hide()
				$("#editar-barrio").hide()
				$("#add-barrio").hide()
			});

			$("#listar-lugar").click(function(){
				$(".table").show()
				$("#editar-barrio").hide()
				$("#add-barrio").hide()
			});
			$("#mostrar-barrio").click(function(){
				$(".table").hide()
				$("#editar-barrio").hide()
				$("#add-barrio").show()
			});
			$("#cancelar").click(function(){
				$(".table").hide()
				$("#add-barrio").hide()
			});
			$("#cancelar_editar").click(function(){
				$(".table").hide()
				$("#add-barrio").hide()
				$("#editar-barrio").hide()

			});
			$(".editar-boton").click(function(){
				$(".table").hide()
				$("#add-barrio").hide()
				$("#editar-barrio").show()

				var dataId = this.id;
				$("#button_update").attr("id", dataId);
				$('#editar_barrios').attr("action", '{{url('actualizar')}}/'+dataId);
				$.ajax({ 
					type: 'GET', 
					url: '/buscar/'+dataId, 
					dataType: 'json',
					success: function (data) {
						$("#nombre_edi").val(data.nombre);
						$("#zona_edi option[value='"+data.ubicacion_id+"']").attr("selected","selected");
					},
					error:function(msg) {
	   			// body...
	   			console.log(msg+"fallo");
	   		}
	   	});
			});
			


		</script>
		@stop