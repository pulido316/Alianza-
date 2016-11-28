
<!DOCTYPE html>
<html>
<head>
	<title>Reportes</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<div>
		<table  id="example"  class="table table-hover table-striped " >
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
									{!! number_format($inactivo->total)!!} m<sup>2</sup><br>
									<strong>area construccion:</strong><br>
									{!! number_format($inactivo->construccion)!!} m<sup>2</sup>
									<br>
									<strong>Precio de venta</strong>
									${!! number_format($inactivo->precio)!!}
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