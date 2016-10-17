@extends('layouts.appUsuario')
@section('content')

	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">Contacto</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	
	<div class="container">
	<div class="row">
								<div class="col-md-6">
								<ul >
                            <li>
                                <h3>Dirección</h3>
                                
                                 <p> Centro Comercial 450 años Oficina 202</p>
                                  <p>Cra. 9 # 20 - 30, Tunja, Boyacá</p>
                                
                            </li>
                            <li>
                                <h3>Correo Electronico</h3>
                                <p><a href="#">alianzatunja@yahoo.es</a></p>
                            </li>
                            <li>
                                <h3>Teléfonos</h3>
                                <p>Celular: 3134238899</p>
                                <p>Fijo: 7435472</p>
                            </li>
                           
                      
									<h3>Sugerencias</h3>
									<div class="alert alert-success hidden" id="contactSuccess">
										<strong>Exito</strong> Su mensaje ha sido enviado
									</div>
									<div class="alert alert-error hidden" id="contactError">
										<strong>Error</strong> No se ha podido enviar su mensaje
									</div>
									<div class="contact-form">
										  <form method="POST" id="contact-form" class="form-horizontal" action="contactengine.php" onSubmit="alert('Thank you for your feedback!');">
							<div class="col-sm-12">
							<div class="form-group">
							<input type="text" name="Name" id="Name" class="form-control wow fadeInUp" placeholder="Nombre" required/>
							</div>
							<div class="form-group">
							<input type="text" name="Email" id="Email" class="form-control wow fadeInUp" placeholder="Email" required/>
							</div>					
							<div class="form-group">
							<textarea name="Message" rows="10" cols="20" id="Message" class="form-control input-message wow fadeInUp"  placeholder="Mensaje" required></textarea>
							</div>
							<div class="form-group">
							<input type="submit" name="submit" value="Enviar" class="btn btn-success wow fadeInUp" />
							</div>
							</div>
						</form>		
									</div>
									  </ul>
								</div>



								<div class="col-md-6">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3971.248638861363!2d-73.3638021856905!3d5.530085995990207!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e6a7c2d3e9332df%3A0x9521bffe37248ab!2s450+A%C3%B1os+Centro+Comercial!5e0!3m2!1ses-419!2ses!4v1476725847473" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
								</div>
							</div>
	</div>
 
	</section>

</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

<script type="text/javascript">
  $("#contacto").addClass('active');
</script>

@stop