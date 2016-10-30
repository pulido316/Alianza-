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
						Tipos de Inmuebles
					</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="panel panel-primary">
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
							<div id="listar-tipo" class="panel-footer">
								<span class="pull-left">Tipos</span>
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
									<i class="fa fa-plus-square fa-4x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="huge"><br></div>
									<div>Nuevo Tipo</div>
								</div>
							</div>
						</div>
						<a href="#">
							<div id="crear-tipo" class="panel-footer">
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
				<div class="col-lg-8">
					<div class="table-responsive table" style="display: none;">
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
								@foreach($tipos as $tipo)
								<tr>
									
									<td>
										{!! $tipo->nombre !!}
									</td>
									<td>
										<button class="btn btn-primary editar-boton" id="{!! $tipo->id !!}">editar</button>
									</td>
								</tr>


								@endforeach

							</tbody>
						</table>

					</div>

					<div id="add-tipo" class="col-lg-6" style="display: none;">
						<h3>Agregar Tipo de Inmueble</h3>

						<form role="form" method="POST" action="{{url('tipos')}}">
							{{csrf_field()}}

							<div class="form-group has-success">
								<label class="control-label" for="inputSuccess">Nombre del tipo</label>
								<input type="text" class="form-control" id="nombre" name="nombre" required>
								<center>
									<br>
									<button type="submit" class="btn btn-primary">Guardar</button>
									<button id="cancelar" type="reset" class="btn btn-warning">Cancelar</button>
								</center>
							</div>

						</form>
					</div>

						<div id="editar-tipo" class="col-lg-6" style="display: none;">
							<h3>Editar Inmubele</h3>
							<form role="form"  id="editar_tipo" method="POST">
							{{csrf_field()}}
							<div class="form-group has-success">
								<label class="control-label" for="inputSuccess">Nombre del tipo de Inmueble</label>
								<input type="text" class="form-control" id="edi_nombre" name="edi_nombre" required>
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
			<!-- /.container-fluid -->

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
	

	$("#listar-tipo").click(function(){
		$(".table").show()
		$("#editar-tipo").hide()
		$("#add-tipo").hide()
	});

	$("#crear-tipo").click(function(){
		$(".table").hide()
		$("#editar-tipo").hide()
		$("#add-tipo").show()
	});
	$("#cancelar").click(function(){
		$(".table").hide()
		$("#editar-tipo").hide()
		$("#add-tipo").hide()
	});
	$("#cancelar_edi").click(function(){
		$(".table").hide()
		$("#add-tipo").hide()
		$("#editar-tipo").hide()
		
	});
	$(".editar-boton").click(function(){
		$(".table").hide()
		$("#add-tipo").hide()
		$("#editar-tipo").show()
			var dataId = this.id;
		$("#button_update").attr("id", dataId);
	
		$('#editar_tipo').attr("action", '{{url('actualizartipo')}}/'+dataId);
		$.ajax({ 
			type: 'GET', 
			url: '/buscartipo/'+dataId, 
			dataType: 'json',
			success: function (data) {
				$("#edi_nombre").val(data.nombre);			
			},
			error:function(msg) {
	   			// body...
	   			console.log(msg+"fallo");
	   		}
	   	});
	});
	
</script>
@stop