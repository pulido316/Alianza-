
<!DOCTYPE html>
<html>
<head>
	<title>Reportes</title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<br>
	<em> total:
	@foreach($contar as $cuenta)
	 {!! $cuenta->numero !!}
    @endforeach
    </em>
	<div>
		<table id="example"  class="table table-hover table-striped " >
			<thead>
				
				<tr>
					<th colspan="2"><img src="img/logo.png" alt="logo" width="220" height="130"/></th>
					<th colspan="2">
						<center>
						<h1> Inmuebles en sistema</h1></center></th>
							</tr>
							<tr>
								<th>Propietario</th>
								<th>Direccion</th>
								<th>Detalles del inmueble</th> 
								<th>Observacion</th>                                    
							</tr>
						</thead>
						<tbody>
							@foreach($inmuebles as $inmueble)
							<tr>
								<td>
									<strong>
										{!! $inmueble->persona->nombre!!}<br>

										C.C: 
									</strong><em>{!! $inmueble->persona->cc!!}</em><br>
									<em>Email :</em><br><strong>{!! $inmueble->persona->email!!}</strong>
									<br>
								</td>
								<td>
									<p>Barrio: <strong> {!! $inmueble->lugar!!}</strong></p>
									<em>{!! $inmueble->direccion!!}</em>                                    
								</td>
								<td>
									<p>Tipo de inmueble: <strong>{!! $inmueble->tipo!!}</strong>
										<br>
										<strong>area total:</strong><br>
										{!! $inmueble->area_total!!} m<sup>2</sup><br>
										<strong>area construccion:</strong><br>
										{!! $inmueble->area_construccion!!} m<sup>2</sup>
										<br>
										<strong>Distribución</strong>
										@foreach( $inmueble->detalles as $detalle)

										<ul>
											<li><strong>{!!$detalle->nombre!!}: </strong>{!!$detalle->cantidad!!}</li>
										</ul>
										@endforeach
									</p>

								</td>
								<td>
									{!! $inmueble->observacion!!}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</body>
			</html>