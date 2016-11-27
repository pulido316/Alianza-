	@extends('layouts.app_index')

	@section('content')
	<div id="wrapper">
		<div id="page-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">
							Reportes
						</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="panel panel-info">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-hdd-o fa-4x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge">
										</div>
										<div>Inmuebles en sistema</div>
									</div>
								</div>
							</div>

							<a href="/totales">
								<div id="avaluos" class="panel-footer">
									<span class="pull-left"><i class="fa  fa-download fa-1x"></i> Generar</span>
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
										<i class="fa fa-shopping-cart fa-4x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge">
										</div>
										<div>Inmuebles en venta</div>
									</div>
								</div>
							</div>
							<a href="/ventasrepo">
								<div id="avaluos" class="panel-footer">
									<span class="pull-left"><i class="fa  fa-download fa-1x"></i> Generar</span>
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
										<i class="fa  fa-credit-card fa-4x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge">
										</div>
										<div>Inmuebles en arriendo</div>
									</div>
								</div>
							</div>
							<a href="/arriendorepo">
								<div id="avaluos" class="panel-footer">
									<span class="pull-left"><i class="fa  fa-download fa-1x"></i> Generar</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa  fa-check-square-o fa-4x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge">
										</div>
										<div>Inmuebles activos</div>
									</div>
								</div>
							</div>
							<a href="/activorepo">
								<div id="avaluos" class="panel-footer">
									<span class="pull-left"><i class="fa  fa-download fa-1x"></i> Generar</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="panel panel-warning">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa  fa-times-circle fa-4x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge">
										</div>
										<div>Inmuebles inactivos</div>
									</div>
								</div>
							</div>
							<a href="/inactivoorepo">
								<div id="avaluos" class="panel-footer">
									<span class="pull-left"><i class="fa  fa-download fa-1x"></i> Generar</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@stop