<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Alianza inmobliaria - Administrador</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- jQuery -->
    
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
    <script src="js/jquery.js"></script>

    <!-- Flot Charts JavaScript -->
    <!--[if lte IE 8]><script src="js/excanvas.min.js"></script><![endif]-->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="js/plugins/flot/flot-data.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation"  style="background-color:#334145">
            <div class="container" >

                <div class="navbar-header" >

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
        <a class="navbar-brand" href="{{ url('/publicaciones') }}" style="color: #FFFFFF !important">
                       Alianza Inmobiliaria
                   </a>
               </div>

             <div class="collapse navbar-collapse" id="app-navbar-collapse" >
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav" >
                    &nbsp;
                    

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right" >
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color: #FFFFFF !important">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Salir
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>

        <div class="collapse navbar-collapse navbar-ex1-collapse" >

            <ul class="nav navbar-nav side-nav" style="background:#FF432E">


               <li id="publicar"> 
                <a href="publicaciones" style="color: #FFFFFF !important"><i class="fa fa-tags "></i> Publicaciones</a>
            </li>
            <li id="inmueble"> 
                <a href="inmueble" style="color: #FFFFFF !important"><i class="glyphicon glyphicon-home "></i> Inmuebles</a>
            </li>

            <li id="parametro">
                <a href="javascript:;" data-toggle="collapse" data-target="#demo" class="collapsed" aria-expanded="false" style="color: #FFFFFF !important"><i class=" fa fa-cogs"></i> Opciones <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo" class="collapse" aria-expanded="false" style="height: 0px;">
                    <li>
                        <a href="/personas" style="color: #FFFFFF !important">Personas</a>
                    </li>
                    <li>
                        <a href="/lugares" style="color: #FFFFFF !important">Lugares</a>
                    </li>
                    <li>
                        <a href="/tipos" style="color: #FFFFFF !important">Tipos inmueble</a>
                    </li>
                    <li>
                        <a href="/opciones" style="color: #FFFFFF !important">Más Opciones</a>
                    </li>
                    <li>
                        <a href="/informacion" style="color: #FFFFFF !important">Servicios Adicionales</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

</div>
</nav>

@yield('content')

<!-- Scripts -->
<script src="/js/app.js"></script>
</body>
</html>
