
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
						Mas Opciones
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
									<div>Servicios</div>
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
										<button class="btn btn-primary editar-boton" id="{!! $serv->id !!}">editar</button>
									</td>
								</tr>


								@endforeach

							</tbody>
						</table>
					</div>
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
										<button class="btn btn-primary editar-boton" id="{!! $detalle->id !!}">editar</button>
									</td>
								</tr>


								@endforeach

							</tbody>
						</table>
					</div>
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
										<button class="btn btn-primary editar-boton" id="{!! $opcion->id !!}">editar</button>
									</td>
								</tr>


								@endforeach

							</tbody>
						</table>
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
	$("#distribucion").click(function(){
		$("#panel_servicios").hide()
		$("#panel_distri").show()
		$("#panel_opcion").hide()
		$(".table_distri").show()
	});
	$("#operacion").click(function(){
		$("#panel_servicios").hide()
		$("#panel_distri").hide()
		$("#panel_opcion").show()
		$(".table_opcion").show()
	});



</script>
@stop