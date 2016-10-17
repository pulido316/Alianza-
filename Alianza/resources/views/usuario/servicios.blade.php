@extends('layouts.appUsuario')
@section('content')

        
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">Servicios Adicionales</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
		<div class="container content">		
        <!-- Service Blcoks -->
        <div class="row service-v1 margin-bottom-40">
            <div class="col-md-4 md-margin-bottom-40">
               <img class="img-responsive" src="img/service1.jpg" alt="">   
                <h2>Avaluos y Dictamenes Periciales</h2>
                <p>Realizamos toda clase de avaluos y dictamenes periciales tanto en zonas urbanas como en zonas rurales</p>        
            </div>
            <div class="col-md-4">
                <img class="img-responsive" src="img/service2.jpg" alt="">            
                <h2>Diseño y Licencias de construcción</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident, doloribus omnis minus temporibus perferendis nesciunt quam repellendus nulla nemo ipsum odit corrupti consequuntur possimus</p>        
            </div>
            <div class="col-md-4 md-margin-bottom-40">
              <img class="img-responsive" src="img/service3.jpg" alt="">  
                <h2>Propiedad Horizontal</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident, doloribus omnis minus temporibus perferendis nesciunt quam repellendus nulla nemo ipsum odit corrupti consequuntur possimus</p>        
            </div>          
        </div>

        <div class="container content">     
        <!-- Service Blcoks -->
        <div class="row service-v1 margin-bottom-40">
            <div class="col-md-4 md-margin-bottom-40">
               <img class="img-responsive" src="img/service1.jpg" alt="">   
                <h2>Remodelaciones</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident, doloribus omnis minus temporibus perferendis nesciunt quam repellendus nulla nemo ipsum odit corrupti consequuntur possimus</p>        
            </div>
            <div class="col-md-4">
                <img class="img-responsive" src="img/service2.jpg" alt="">            
                <h2>Tramites Inmobiliarios</h2>
                <p>Realizamos toda clase de tramites inmobiliarios como promesas de compraventa, desenglobes y englobes y asesoria de negocios inmobiliarios</p>        
            </div>      
        </div>
        <!-- End Service Blcoks -->

        <hr class="margin-bottom-50">

       
        
    </div>
    </section>

</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript">
  $("#servicio").addClass('active');
</script>

@stop