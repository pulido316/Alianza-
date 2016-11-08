  @extends('layouts.appUsuario')


  @section('content')   

  <link rel="stylesheet" type="text/css" href="css/select2.min.css">
  <script type="text/javascript" src="js/select2.min.js"></script>                 
  	
  	<section id="featured">

        <div id="main-slider" class="flexslider">

  		<div class="flex-caption">

                  </div>
              <ul class="slides">

                <li>
                  <img src="img/slides/logo.png" alt="" />

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

            <form role="form" action="{{url('buscarInmueble')}}">
              
              <div class="form-group col-md-4">
                <label for="inputSuccess">Lugar</label>   
                 <select class="form-control" id="lugar" name="lugar"  >
                       @foreach( $barrios as $barrio)
                       <option >{!!$barrio->nombre!!}</option>
                       @endforeach
                   </select>  
              </div>
              <div class="form-group col-md-4">
                <label for="inputSuccess">Tipo</label>
                <select class="form-control" id="tipo" name="tipo" >
                @foreach( $tipos as $tipo)
                       <option >{!!$tipo->nombre!!}</option>
                       @endforeach
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="inputSuccess">Habitaciones</label>
                <select class="form-control" id="habitacion" name="habitacion" >
                  <option >1</option>
                  <option >2</option>
                  <option >3</option>
                  <option >4</option>
                  <option >5</option>
                 </select>
              </div>
              <div class="form-group col-md-4">
                <label for="inputSuccess">Baños</label>
                <select class="form-control" id="baño" name="baño" >
                  <option >1</option>
                  <option >2</option>
                  <option >3</option>
                  <option >4</option>
                </select>
                </select>
              </div>
              
              <div class="form-group col-md-4">
                <label for="inputSuccess">Operación</label>
                <select class="form-control" id="operacionReq" name="operacionReq" >
                 @foreach( $operaciones as $operacion)
                       <option>{!!$operacion->nombre!!}</option>
                       @endforeach
                </select>
              </div>

               <div class="form-group col-md-4">
                <label for="inputSuccess">Precio menor a</label>       
                <select class="form-control" id="precio" name="precio" >
                @foreach( $postulaciones as $postulacion)
                       <option>{!!$postulacion->precio!!}</option>
                       @endforeach
                </select>
              </div>
             
              <div class="form-group col-md-4">
              <input  value="Buscar" class="btn btn-success btn-lg btn-block" type="submit">
              </div>
              
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
  				<div class="aligncenter"><h1 class="aligncenter">Alianza Inmobiliaria</h1><p>En esta paginá web podrá encontrar toda la información referente a sus necesidades de búsqueda de apartamentos, apartaestudios, casas, locales o lotes en arriendo o venta, también podrá encontrar más información de nuestros serivicos ofrecidos de avalúos, propiedad horizontal, diseño y licencias de construcción, remodelaciones y trámites inmobiliarios</p></div>
  			</div>
  		</div>
  	</div>
  	</section>

  	<section id="content">


  	<div class="container">
      <div class="row">
             
                  <div class="project">
                      <h3 class="section-title">Últimos proyectos</h3>
                      <div id= "inmuebles" class="row">
                          @foreach($inmuebles as $inmueble)
                         
                          <div class="col-md-4 col-sm-4">
                              <div class="project">
                                <a href="/detallesInmueble/{!! $inmueble->id !!}">
                                  <img id="imagen" src="img/fotos/{!! $inmueble->imagen !!}" class="img-responsive" alt="">
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

    $("#lugar_select").select2(),
  </script>
  <script type="text/javascript" src="js/inicio.js"></script>
  @stop