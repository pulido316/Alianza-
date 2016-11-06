@extends('layouts.appUsuario')
@section('content')

	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">Inmueble</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	<div class="container">
		<div class="row">
    <h3 class="section-title">Detalles generales</h3>
			<div class="col-lg-12 infoInmueble">
                <div >
                    <div class="form-group col-md-4">
                        <strong>Lugar:</strong>       
                        <label for="country">{!!$inmueble->lugar!!}</label>  
                    </div>
                    <div class="form-group col-md-4">
                      <strong>Tipo: </strong>
                       <label for="bedroom">{!!$inmueble->tipo!!}</label>
                    </div>
                    <div class="form-group col-md-4">
                      <strong>Area total: </strong>
                       <label for="bedroom">{!!$inmueble->area_total!!} m2</label>
                    </div>
                    <div class="form-group col-md-4">
                      <strong>Area construcción: </strong>
                       <label for="bedroom">{!!$inmueble->area_construccion!!} m2</label>
                    </div>
                    <div class="form-group col-md-4">
                      <strong>Observaciones: </strong>
                       <label for="bedroom">{!!$inmueble->observacion!!}</label>
                    </div>

                    @foreach( $inmueble->detalles as $detalle)
                   
                      <div class="form-group col-md-4">
                      <strong>{!!$detalle->nombre!!}: </strong>
                      <label for="bedroom">{!!$detalle->cantidad!!}</label>
                    </div>
                    @endforeach

                    <?php  
                        $nombreOperacion = "";
                        $nombrePrecio = "";
                    ?>
                    @foreach($inmueble->operaciones as $operacion)
                        <?php 
                        $nombreOperacion = $nombreOperacion. '  ' .$operacion->nombre;
                        $nombrePrecio = $nombrePrecio. ' $ ' .$operacion->precio;
                        ?>
                    @endforeach
                    <div class="form-group col-md-4">
                      <strong>Operacion:</strong>
                      <label for="bedroom">{!!$nombreOperacion!!}</label>
                    </div>
                    <div class="form-group col-md-4">
                      <strong>Precio:</strong>
                      <label for="bedroom">{!!$nombrePrecio!!}</label>
                    </div>
                    @foreach( $inmueble->servicios as $servicio)
                   
                      <div class="form-group col-md-4">
                      <strong>Servicio: </strong>
                      <label for="bedroom">{!!$servicio->nombre!!}</label>
                    </div>
                    @endforeach
                </div>
			</div>

            <div class="clearfix">
                </div>

                <h3 class="section-title">Galeria</h3>
                <div class="row">
                
                    <section id="project">
                    <ul id="thumbs" class="portfolio">
                        <!-- Item Project and Filter Name -->
                        
                         @foreach($inmueble->imagenes as $imagen)
                     <div class="form-group col-md-4">
                         {{ Html::image('img/fotos/'.$imagen->url_img,' ' ,array('class'=>'img-responsive')) }}
                    </div>
                    @endforeach
                        
                        
                    </ul>
                    </section>
                </div>

		</div>
	</div>
	</section>

</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>


@stop