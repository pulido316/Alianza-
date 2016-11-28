
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
						<h1> Inmuebles en Arriendo</h1></center></th>
							</tr>
							<tr>
								<th>Propietario</th>
								<th>Direccion</th>
								<th>Detalles del inmueble</th> 
								<th>Fechas de publicacion en el sistema</th>                                   
							</tr>
						</thead>
						<tbody>
							@foreach($arriendos as $arriendo)
							<tr>
								<td>
									<strong>
										{!! $arriendo->nombre!!}<br>
										C.C: 
									</strong><em>{!! $arriendo->cc!!}</em><br>
									<em>Email :</em><br><strong>{!! $arriendo->email!!}</strong>
									<br>
								</td>
								<td>
									<p>Barrio: <strong> {!! $arriendo->barrio!!}</strong></p>
									<em>{!! $arriendo->direccion!!}</em>                                    
								</td>
								<td>
									<p>Tipo de inmueble: <strong>{!! $arriendo->tipo!!}</strong>
										<br>
										<strong>area total:</strong><br>
										{!! $arriendo->total!!} m<sup>2</sup><br>
										<strong>area construccion:</strong><br>
										{!! $arriendo->construccion!!} m<sup>2</sup>
										<br>
										<strong>Precio de venta</strong>
										${!! number_format($arriendo->precio)!!}
									</p>

								</td>
								<td>
									<p><em>Fecha de publicacion:</em></p>
									<strong>{!!$arriendo->inicio!!}</strong>
									<p><em>Fecha de cierre de publicacion:</em></p>
									@if( $arriendo->fin === null)
									<strong>indefinida</strong>
									@else
									<strong>{!!$arriendo->fin!!}</strong>
									@endif
									
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</body>
			</html>