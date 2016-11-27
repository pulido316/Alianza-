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
                <h2>Avaluos</h2>
                <p id="infoAvaluo"></p>        
            </div>
            <div class="col-md-4">            
                <h2>Licencias y Diseños Arquitectónicos y Estructurales</h2>
                <p id="infoLicencia"></p>        
            </div>
            <div class="col-md-4 md-margin-bottom-40">  
                <h2>Propiedad Horizontal</h2>
                <p id="infoPropiedad"> </p>        
            </div>          
        </div>

        <div class="container content">     
        <!-- Service Blcoks -->
        <div class="row service-v1 margin-bottom-40">
            <div class="col-md-4 md-margin-bottom-40">   
                <h2>Remodelaciones</h2>
                <p id="infoRemodelacion"></p>        
            </div>
            <div class="col-md-4">           
                <h2>Trámites Inmobiliarios</h2>
                <p id="infoTramite"></p>        
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


    $.ajax({ 
            type: 'GET', 
            url: 'js/avaluo.txt',
            success: function (data) {
                $("#infoAvaluo").text(data);
            },
            error:function(msg) {
                // body...
                console.log(msg);
            }
        });

     $.ajax({ 
            type: 'GET', 
            url: 'js/licencia.txt',
            success: function (data) {
                $("#infoLicencia").text(data);
            },
            error:function(msg) {
                // body...
                console.log(msg);
            }
        });

     $.ajax({ 
            type: 'GET', 
            url: 'js/propiedad.txt',
            success: function (data) {
                $("#infoPropiedad").text(data);
            },
            error:function(msg) {
                // body...
                console.log(msg);
            }
        });

      $.ajax({ 
            type: 'GET', 
            url: 'js/remodelacion.txt',
            success: function (data) {
                $("#infoRemodelacion").text(data);
            },
            error:function(msg) {
                // body...
                console.log(msg);
            }
        });

      $.ajax({ 
            type: 'GET', 
            url: 'js/tramite.txt',
            success: function (data) {
                $("#infoTramite").text(data);
            },
            error:function(msg) {
                // body...
                console.log(msg);
            }
        });

      
</script>

@stop