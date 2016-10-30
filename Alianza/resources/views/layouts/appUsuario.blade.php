<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Alianza Inmobiliaria</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://webthemez.com" />
<!-- css -->


{{ Html::style('css/bootstrap.min.css') }}
{{ Html::style('css/fancybox/jquery.fancybox.css') }}
{{ Html::style('css/jcarousel.css') }}
{{ Html::style('css/flexslider.css')}}
{{ Html::style('css/style.css') }}
{{ Html::style('css/css.css') }}



{{ Html::script('js/jquery.js') }}
{{ Html::script('js/jquery.easing.1.3.js') }}
{{ Html::script('js/bootstrap.min.js') }}
{{ Html::script('js/jquery.fancybox.pack.js') }}
{{ Html::script('js/jquery.fancybox-media.js') }}
{{ Html::script('js/portfolio/jquery.quicksand.js') }}
{{ Html::script('js/portfolio/setting.js') }}
{{ Html::script('js/jquery.flexslider.js') }}
{{ Html::script('js/animate.js') }}
{{ Html::script('js/custom.js') }}
{{ Html::script('js/owl-carousel/owl.carousel.js') }}


<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>

<div id="wrapper">
    <!-- start header -->
    <header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">{{ HTML::image('img/logo.png', 'logo', array('class' => 'logo')) }}</a>
                </div>
                  <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li id="inicio">{{ HTML::link('/', 'Inicio') }}</a></li>
                        <li id="arriendo">{{ HTML::link('arriendos', 'Arriendos') }}</a></li>
                        <li id="venta">{{ HTML::link('ventas', 'Ventas') }}</a></li>
                         <li id="servicio">{{ HTML::link('servicios', 'Servicios Adicionales') }}</a></li>
                        <li id="acerca">{{ HTML::link('acercaDe', 'Acerca de nosotros') }}</a></li>
                        <li id="contacto">{{ HTML::link('contacto', 'Contacto') }}</a></li>
                    </ul>
                </div>
               
            </div>

        </div>
    </header>
</div>

 @yield('content')

 <footer>
      
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="copyright" align="center">
                        <p>
                            <span>&copy; Alianza Constructora Inmobiliaria </span>
                        </p>
                    </div>
                </div>
            </div>
    </div>
    </footer>
</body>
</html>