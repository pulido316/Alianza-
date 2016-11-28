  @extends('layouts.appUsuario')
  @section('content')
  {{ Html::style('css/lightslider.css') }}
  {{ Html::script('js/lightslider.js') }}
<style>
  ul{
    list-style: none outside none;
    padding-left: 0;
    margin: 0;
  }
  .demo .item{
    margin-bottom: 60px;
  }
  .content-slider li{
    background-color: #ed3020;
    text-align: center;
    color: #FFF;
  }
  .content-slider h3 {
    margin: 0;
    padding: 70px 0;
  }
  .demo{
    width: 800px;
  }
</style>
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
  <h4><a href="javascript:history.back()"> Regresar</a></h4>
    <h3 class="section-title">Detalles generales</h3>
    <div class="col-lg-12 infoInmueble1">
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
        $nombrePrecio = $nombrePrecio. ' $ ' .number_format($operacion->precio);

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

    <br>

    <h3 class="section-title">Galeria</h3>
    <center>
    <div class="demo">
      <div class="item">            
        <div class="clearfix" style="max-width:474px;">
          <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
           @foreach($inmueble->imagenes as $imagen)
           <li data-thumb="../img/fotos/{!!$imagen->url_img!!}"> 
             {{ Html::image('img/fotos/'.$imagen->url_img,' ' ,array()) }}
           </li>
           @endforeach

         </ul>
       </div>
     </div>
   </div>
</center>
 </div>
</div>
</section>

</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<script type="text/javascript">
 $(document).ready(function() {
  $("#content-slider").lightSlider({
    loop:true,
    keyPress:true
  });
  $('#image-gallery').lightSlider({
    gallery:true,
    item:1,
    thumbItem:9,
    slideMargin: 0,
    speed:500,
    auto:true,
    loop:true,
    onSliderLoad: function() {
      $('#image-gallery').removeClass('cS-hidden');
    }  
  });
});
</script>

@stop