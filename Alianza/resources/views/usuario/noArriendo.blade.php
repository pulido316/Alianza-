@extends('layouts.appUsuario')
@section('content')

	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">Arriendos</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="portfolio-categ filter">
					<li class=""><a href="arriendos">Todos</a></li>
					<li class="web"><a href="arriendoCasa" title="">Casas</a></li>
					<li class="icon"><a href="arriendoApartamen" title="">Apartamentos</a></li>
					<li class="graphic"><a href="arriendoApartaes" title="">Apartaestudios</a></li>
					<li class="graphic"><a href="arriendoLocal" title="">Locales</a></li>
				</ul>
				<div class="clearfix">
				</div>
				<div class="row">
					<section id="projects">
					<ul id="thumbs" class="portfolio">
						<h4><a href="javascript:history.back()"> Regresar</a></h4>
						<h3 class="section-title">No se han encontrado inmuebles</h3>
						
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