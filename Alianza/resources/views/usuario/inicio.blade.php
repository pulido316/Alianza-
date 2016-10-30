@extends('layouts.appUsuario')


@section('content')                    
	<!-- end header -->
	<section id="featured">

	<!-- Slider -->
        <div id="main-slider" class="flexslider">

		<div class="flex-caption">

                </div>
            <ul class="slides">

              <li>
                <img src="img/slides/1.jpg" alt="" />

              </li>
              <li>
                <img src="img/slides/2.jpg" alt="" />

              </li>
              <li>
                <img src="img/slides/3.jpg" alt="" />

              </li>
            </ul>
        </div>
	<!-- end slider -->

	</section>
  <section class="search-form">
      
  <div class="row">
  <div class="col-md-12 col-sm-12">
  <div class="quick-search">

          <form role="form">
            
            <div class="form-group col-md-4">
              <label for="country">Lugar</label>       
              <select class="form-control">
              <option>Ciudad jardin</option>
              <option>Pinos de oriente</option>
              <option>San francisco</option>
              <option>Centro</option>
              <option>El bosque</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="bedroom">Tipo</label>
              <select class="form-control">
              <option>Casa</option>
              <option>Apartamento</option>
              <option>Apartaestudio</option>
              <option>Lote</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="bedroom">Habitaciones</label>
              <select class="form-control">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="bedroom">Baños</label>
              <select class="form-control">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              </select>
            </div>
            
            <div class="form-group col-md-4">
              <label for="bedroom">Operacion</label>
              <select class="form-control">
              <option>Arriendo</option>
              <option>Venta</option>
              </select>
            </div>

             <div class="form-group col-md-4">
              <label for="country">Precio menor a</label>       
              <select class="form-control">
              <option>1</option>
              <option>2</option>
              </select>
            </div>
            
            <input name="submit" value="Buscar" class="btn btn-success btn-lg btn-block" type="submit">
            
            
            </form>

  </div>
  <div class="quick-result" >
    
  </div>
  </div>



  </div>
  

    </section>
	<section class="hero-text">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="aligncenter"><h1 class="aligncenter">Alianza Inmobiliaria</h1><p>En esta pagina web podra encontrar toda la información referente a sus necesidades de busqueda de apartamentos, apartaestudios, casas, locales o lotes en arriendo o venta, tambien podra encontrar mas información de nuestros serivicos ofrecidos de avaluos y dictamenes periciales, propiedad horizontal, diseño y licencias de construccion, remodelaciones y tramites inmobiliarios</p></div>
			</div>
		</div>
	</div>
	</section>

	<section id="content">


	<div class="container">
    <div class="row">
           
                <div class="project">
                    <h3 class="section-title">Ultimos proyectos</h3>
                    <div id= "inmuebles" class="row">
                        @foreach($inmuebles as $inmueble)
                       
                        <div class="col-md-4 col-sm-4">
                            <div class="project">
                              <a href="/detallesInmueble/{!! $inmueble->id !!}">
                                <img id="imagen" src="img/fotos/{!! $inmueble->imagen !!}" class="img-responsive" alt="">
                              </a>
                                <div class="project-details">
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
                </div>
           
        </div>
		
	</div>
	</section>

	
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript">
  $("#inicio").addClass('active');
</script>
<script type="text/javascript" src="js/inicio.js"></script>
@stop