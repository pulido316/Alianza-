@extends('layouts.appUsuario')
@section('content')

	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">Arriendos Apartamentos</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="portfolio-categ filter">
					<li ><a href="arriendos">Todos</a></li>
					<li class="web"><a href="arriendoCasa" title="">Casas</a></li>
					<li class="all active"><a href="arriendoApartamen" title="">Apartamentos</a></li>
					<li class="graphic"><a href="arriendoApartaes" title="">Apartaestudios</a></li>
					<li class="graphic"><a href="arriendoLocal" title="">Locales</a></li>
				</ul>
				<div class="clearfix">
				</div>
				<div class="row">
					<section id="projects">
					<ul id="thumbs" class="portfolio">
						<li class="item-thumbs col-lg-3 design" data-id="id-0" data-type="web">
						<div class="project">
                                <img src="img/works/1.jpg" class="img-responsive" alt="">
                                <div class="project-details">
                                    <ul>
                                        <li><strong>Tipo :</strong> Apartamento</li>
                                        <li><strong>Lugar :</strong> San Francisco</li>
                                        <li><strong>Habitaciones :</strong> 3</li>
                                        <li><strong>Baños :</strong>2</li>
                                        <li><strong>Precio :</strong> $700.000 </li>
                                    </ul>
                                </div>
                            </div>
						</li>
						
						<li class="item-thumbs col-lg-3 design" data-id="id-1" data-type="icon">
						<div class="project">
                                <img src="img/works/2.jpg" class="img-responsive" alt="">
                                <div class="project-details">
                                    <ul>
                                        <li><strong>Tipo :</strong> Apartamento</li>
                                        <li><strong>Lugar :</strong> San Francisco</li>
                                        <li><strong>Habitaciones :</strong> 3</li>
                                        <li><strong>Baños :</strong>2</li>
                                        <li><strong>Precio :</strong> $700.000 </li>
                                    </ul>
                                </div>
                            </div>
						</li>
											
						</ul>
					</section>
				</div>
			</div>
		</div>
	</div>
	</section>

</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

<script type="text/javascript">
  $("#arriendo").addClass('active');
</script>

@stop