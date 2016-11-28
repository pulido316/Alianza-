
<!DOCTYPE html>
<html>
<head>
	<title>Reportes</title>
   <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div>
		<table border="1" id="example"  class="table table-hover table-striped " >
			<thead>
				<tr>
					<th colspan="2"><img src="img/logo.png" alt="logo" width="220" height="130"/></th>
					<th colspan="2">
						<center>
						<h1> Inmuebles Activos en el sistema</h1></center></th>
							</tr>
							<tr>
								<th>Propietario</th>
								<th>Direccion</th>
								<th>Detalles del inmueble</th> 
								<th>Fechas de publicacion en el sistema</th>                                   
							</tr>
						</thead>
						<tbody>
							@foreach($activos as $activo)
							<tr>
								<td>
									<strong>
										{!! $activo->nombre!!}<br>
										C.C: 
									</strong><em>{!! $activo->cc!!}</em><br>
									<em>Email :</em><br><strong>{!! $activo->email!!}</strong>
									<br>
								</td>
								<td>
									<p>Barrio: <strong> {!! $activo->barrio!!}</strong></p>
									<em>{!! $activo->direccion!!}</em>                                    
								</td>
								<td>
									<p>Tipo de inmueble: <strong>{!! $activo->tipo!!}</strong>
										<br>
										<strong>area total:</strong><br>
										{!! $activo->total!!} m<sup>2</sup><br>
										<strong>area construccion:</strong><br>
										{!! $activo->construccion!!} m<sup>2</sup>
										<br>
										<strong>Precio de venta</strong>
										{!! $activo->precio!!}
									</p>

								</td>
								<td>
									<p><em>Fecha de publicacion:</em></p>
									<strong>{!!$activo->inicio!!}</strong>
									<p><em>Fecha de cierre de publicacion:</em></p>
									@if( $activo->fin === null)
									<strong>indefinida</strong>
									@else
									<strong>{!!$activo->fin!!}</strong>
									@endif
									
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</body>
			</html>