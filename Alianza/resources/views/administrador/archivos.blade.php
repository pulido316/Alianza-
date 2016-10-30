
@extends('layouts.app_index')

@section('content')
<link rel="stylesheet" type="text/css" href="css/dropzone.css">
<script type="text/javascript" src="js/dropzone.js"></script>


<div id="wrapper">
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					
					<h1>archivos</h1>
					<form  class="dropzone" id="dropzone">
						<div class="fallback">
							<input type="file" name="file" multiple id="archivos">
							<script type="text/javascript">
									Dropzone.options.dropzone = {
									if (1==1) {
										alert("loco re loco");
									}
									maxFilesize: 4,
									acceptedFiles:'image/*',
									dictDefaultMessage: "Arrastra los archivos aquí para subirlos",
									dictFileTooBig: "El archivo es demasiado grande.",
									dictInvalidFileType: "No se pueden cargar archivos de este tipo.",
									dictFallbackMessage: "Su navegador no soporta la carga de archivos de arrastrar y soltar.",
									dictFallbackText: "Por favor, utilice el formulario de reserva de abajo para subir sus archivos al igual que en los viejos tiempos.",

									dictCancelUpload: "Cancelar la carga",
									dictCancelUploadConfirmation: "¿Seguro que desea cancelar esta subida?",
									dictRemoveFile: "Remover archivo",
									dictMaxFilesExceeded: "No se pueden cargar más archivos.",
									addRemoveLinks: true,
									maxFiles: 2,


								}
								var dropzone= new Dropzone('#archivos',{
									url:'{{url('archivos')}}'
								})
							</script>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>