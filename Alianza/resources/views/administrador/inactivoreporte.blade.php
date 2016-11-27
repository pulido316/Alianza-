
<!DOCTYPE html>
<html>
<head>
	<title>Reportes</title>
</head>
<body>
	<div>
		<table border="1" id="example"  class="table table-hover table-striped " >
			<thead>
				<tr>
					<th colspan="2"><img src="img/logo.png" alt="logo" width="220" height="130"/></th>
					<th colspan="2">
						<center>
						<h1> Inmuebles Inactivos en el sistema</h1></center></th>
						</tr>
						<tr>
							<th>Propietario</th>
							<th>Direccion</th>
							<th>Detalles del inmueble</th> 
							<th>Fechas de publicacion en el sistema</th>                                   
						</tr>
					</thead>
					<tbody>
						@foreach($inactivos as $inactivo)
						<tr>
							<td>
								<strong>
									{!! $inactivo->nombre!!}<br>
									C.C: 
								</strong><em>{!! $inactivo->cc!!}</em><br>
								<em>Email :</em><br><strong>{!! $inactivo->email!!}</strong>
								<br>
							</td>
							<td>
								<p>Barrio: <strong> {!! $inactivo->barrio!!}</strong></p>
								<em>{!! $inactivo->direccion!!}</em>                                    
							</td>
							<td>
								<p>Tipo de inmueble: <strong>{!! $inactivo->tipo!!}</strong>
									<br>
									<strong>area total:</strong><br>
									{!! $inactivo->total!!} m<sup>2</sup><br>
									<strong>area construccion:</strong><br>
									{!! $inactivo->construccion!!} m<sup>2</sup>
									<br>
									<strong>Precio de venta</strong>
									{!! $inactivo->precio!!}
								</p>

							</td>
							<td>
								<p><em>Fecha de publicacion:</em></p>
								<strong>{!!$inactivo->inicio!!}</strong>
								<p><em>Fecha de cierre de publicacion:</em></p>
								@if( $inactivo->fin === null)
								<strong>indefinida</strong>
								@else
								<strong>{!!$inactivo->fin!!}</strong>
								@endif

							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</body>
		</html>