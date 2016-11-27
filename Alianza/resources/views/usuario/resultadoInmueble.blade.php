@extends('layouts.appUsuario')
@section('content')

	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">Resultado busqueda</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				
				<div class="clearfix">
				</div>
				<div class="row">
					<section id="projects">
					<ul id="thumbs" class="portfolio">
						<!-- Item Project and Filter Name -->
						<div id= "inmuebles" class="row">
                        @foreach($inmuebles as $inmueble)
                       
                        <div class="col-md-4 col-sm-4">
                            <div class="project">
                              <a href="/detallesInmueble/{!! $inmueble->id !!}">
                                <img id="imagen" src="img/fotos/{!! $inmueble->imagen !!}" class="img1">
                              </a>
                                <div class="project-details infoInmueble">
                                    <ul>
                                        <li ><strong>Lugar :</strong> {!! $inmueble->lugar !!}</li>
                                        <li ><strong>Tipo :</strong> {!! $inmueble->tipo !!}</li>
                                        <?php  
                                          $nombreOperacion = "";
                                          $nombrePrecio = "";
                                        ?>
                                       
                                        @foreach($inmueble->detalles as $detalle)
                                        <li ><strong>{!! $detalle->nombre !!} :</strong> {!! $detalle->cantidad !!}</li>
                                        @endforeach
                                        @foreach($inmueble->operaciones as $operacion)
                                        <?php 
                                          $nombreOperacion = $nombreOperacion. '  ' .$operacion->nombre;
                                          $nombrePrecio = $nombrePrecio. ' $ ' .$operacion->precio;
                                        ?>
                                        @endforeach
                                        <li ><strong>Operación :</strong> {!! $nombreOperacion !!}</li>
                                        <li ><strong>Precio :</strong> {!! $nombrePrecio !!}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        @endforeach
                    </div>
						
					</ul>
					</section>
				</div>
			</div>
		</div>
	</div>
	</section>

</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

@stop