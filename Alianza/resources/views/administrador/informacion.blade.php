
@extends('layouts.app_index')

@section('content')

<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.css">
<link type="text/css" rel="stylesheet" href="css/jquery-te-1.4.0.css">
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/jquery-te-1.4.0.min.js" charset="utf-8"></script>

<div id="wrapper">
	<div id="page-wrapper">
		<div class="container-fluid">
		<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
						Servicios adicionales
					</h1>
				</div>
			</div>
			<div class="row">
			<div class="col-lg-3 col-md-6">
				<div class="panel panel-info">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-money fa-4x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge">
								</div>
								<div>Avaluos</div>
							</div>
						</div>
					</div>
					<a href="#">
						<div id="avaluos" class="panel-footer">
							<span class="pull-left">ver</span>
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
								<i class="fa fa-check-square-o  fa-4x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge">
								</div>
								<div>Licencias y diseños arquitectónicos y estructurales</div>
							</div>
						</div>
					</div>
					<a href="#">
						<div id="licencias" class="panel-footer">
							<span class="pull-left">ver</span>
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
								<i class="fa fa-pencil-square  fa-4x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge">
								</div>
								<div>Propiedad horizontal</div>
							</div>
						</div>
					</div>
					<a href="#">
						<div id="propiedad" class="panel-footer">
							<span class="pull-left">ver</span>
							<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
			</div>

			<div class="col-lg-3 col-md-6">
				<div class="panel panel-default ">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-thumbs-up  fa-4x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge">
								</div>
								<div>Remodelaciones</div>
							</div>
						</div>
					</div>
					<a href="#">
						<div id="remodelacion" class="panel-footer">
							<span class="pull-left">ver</span>
							<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
			</div>
			</div>

			<div class="row">
			<div class="col-lg-3 col-md-6">
				<div class="panel panel-warning ">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-legal  fa-4x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge">
								</div>
								<div>Trámites inmobiliarios</div>
							</div>
						</div>
					</div>
					<a href="#">
						<div id="tramite" class="panel-footer">
							<span class="pull-left">ver</span>
							<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
			</div>

			</div>

			<div class="row" id="panel_avaluos" style="display: none;">
				<form role="form" method="GET" action="{{url('updateAvaluo')}}">
					<div>
						<legend>Información de avaluos</legend>
						<textarea class="form-control" rows="3" id="infoAvaluos" name="infoAvaluo"></textarea>
						<br>
						<button type="sumbit" class="btn btn-primary" >Guardar</button>

					</div>
				</form>
			</div>

			<div class="row" id="panel_licencias" style="display: none;">
				<form role="form" method="GET" action="{{url('updateLicencia')}}">
					<div>
						<legend>Información de licencias y diseños arquitectónicos y estructurales</legend>
						<textarea class="form-control" rows="3" id="infoLicencias" name="infoLicencia"></textarea>
						<br>
						<button type="sumbit" class="btn btn-primary" >Guardar</button>

					</div>
				</form>
			</div>

			<div class="row" id="panel_propiedades" style="display: none;">
				<form role="form" method="GET" action="{{url('updatePropiedad')}}">
					<div>
						<legend>Información de propiedad horizontal</legend>
						<textarea class="form-control" rows="3" id="infoPropiedades" name="infoPropiedad"></textarea>
						<br>
						<button type="sumbit" class="btn btn-primary" >Guardar</button>

					</div>
				</form>
			</div>

			<div class="row" id="panel_remodelaciones" style="display: none;">
				<form role="form" method="GET" action="{{url('updateRemodelacion')}}">
					<div>
						<legend>Información de remodelaciones</legend>
						<textarea class="form-control" rows="3" id="infoRemodelaciones" name="infoRemodelacion"></textarea>
						<br>
						<button type="sumbit" class="btn btn-primary" >Guardar</button>

					</div>
				</form>
			</div>

			<div class="row" id="panel_tramites" style="display: none;">
				<form role="form" method="GET" action="{{url('updateTramite')}}">
					<div>
						<legend>Información de trámites inmobiliarios</legend>
						<textarea class="form-control" rows="3" id="infoTramites" name="infoTramite"></textarea>
						<br>
						<button type="sumbit" class="btn btn-primary" >Guardar</button>

					</div>
				</form>
			</div>
			
		</div>
	</div>
</div>

<script>

	$("#avaluos").click(function(){
		$("#panel_avaluos").show()
		$("#panel_licencias").hide()
		$("#panel_propiedades").hide()
		$("#panel_remodelaciones").hide()
		$("#panel_tramites").hide()
	});

	$.ajax({ 
		type: 'GET', 
		url: 'js/avaluo.txt',
		success: function (data) {
			$("#infoAvaluos").val(data);
		},
		error:function(msg) {
	   			// body...
	   			console.log(msg);
	   		}
	   	}); 
	
	$("#licencias").click(function(){
		$("#panel_avaluos").hide()
		$("#panel_licencias").show()
		$("#panel_propiedades").hide()
		$("#panel_remodelaciones").hide()
		$("#panel_tramites").hide()
	});

	$.ajax({ 
		type: 'GET', 
		url: 'js/licencia.txt',
		success: function (data) {
			$("#infoLicencias").val(data);
		},
		error:function(msg) {
	   			// body...
	   			console.log(msg);
	   		}
	   	});

	$("#propiedad").click(function(){
		$("#panel_avaluos").hide()
		$("#panel_licencias").hide()
		$("#panel_propiedades").show()
		$("#panel_remodelaciones").hide()
		$("#panel_tramites").hide()
	});

	$.ajax({ 
		type: 'GET', 
		url: 'js/propiedad.txt',
		success: function (data) {
			$("#infoPropiedades").val(data);
		},
		error:function(msg) {
	   			// body...
	   			console.log(msg);
	   		}
	   	});

	$("#remodelacion").click(function(){
		$("#panel_avaluos").hide()
		$("#panel_licencias").hide()
		$("#panel_propiedades").hide()
		$("#panel_remodelaciones").show()
		$("#panel_tramites").hide()
	});

	$.ajax({ 
		type: 'GET', 
		url: 'js/remodelacion.txt',
		success: function (data) {
			$("#infoRemodelaciones").val(data);
		},
		error:function(msg) {
	   			// body...
	   			console.log(msg);
	   		}
	   	});

	$("#tramite").click(function(){
		$("#panel_avaluos").hide()
		$("#panel_licencias").hide()
		$("#panel_propiedades").hide()
		$("#panel_remodelaciones").hide()
		$("#panel_tramites").show()
	});

	$.ajax({ 
		type: 'GET', 
		url: 'js/tramite.txt',
		success: function (data) {
			$("#infoTramites").val(data);
		},
		error:function(msg) {
	   			// body...
	   			console.log(msg);
	   		}
	   	});

	   </script>
	   @stop