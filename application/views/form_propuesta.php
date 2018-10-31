<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/style.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/dark.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="<?=base_url();?>public/css/components/radio-checkbox.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/components/bs-filestyle.css" type="text/css" />

	<link rel="stylesheet" href="<?=base_url();?>public/css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>Consulta Ciudadana | Crea tu propuesta</title>	
</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->

		<?php include 'header.php'; ?>

		<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>Crea tu propuesta</h1>
				<span>Elías Abdala</span>				
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="postcontent">					

						<h3>Recomendaciones para crear una propuesta</h3>

						<form id="formPropuesta" method="POST" action="<?=base_url();?>C_propuestas/captura_propuesta">
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="sel_sect">Selecciona el Sector</label>
									<select class="form-control" id="iIdSector" name="iIdSector" onchange="carga_temas(this.value);" required>
										<option value="">Sectores</option>
										<?php echo $select_sec; ?>
									</select>
								</div>
								<div class="form-group col-md-6">
									<label for="iIdTema">Selecciona el Tema</label>
									<select class="form-control" id="iIdTema" name="iIdTema" required>
										<option value="">Temas</option>									
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="vTitulo">Titulo propuesta</label>
								<input type="text" class="form-control" id="vTitulo" name="vTitulo" required>
							</div>
							<div class="form-group">
								<label for="vDescripcion">Resumen de la propuesta</label>
								<small id="descnHelp" class="form-text text-muted">(Máximo 200 caracteres)</small>
								<textarea class="form-control" id="vDescripcion" name="vDescripcion" rows="5" required></textarea>
							</div>
							<div class="form-group">
								<label for="vUrlVideoExterno">Enlace video externo</label>
								<input type="url" class="form-control" id="vUrlVideoExterno" name="vUrlVideoExterno" placeholder="http://example.com">
							</div>
							<div class="row">
								<div class="col-lg-12 bottommargin">
									<label>Imágenes descriptivas:</label>
									<small id="" class="form-text text-muted">Puedes subir hasta 5 imagenes en los formatos jpeg o jpg; hasta 1 MB por acrhivo.<br></small><br>
									<input id="adjuntoFotos" name="adjuntoFotos[]" type="file" class="file" accept="image/*" multiple data-show-upload="false" data-show-caption="true" data-show-preview="true" data-show-upload="false">
								</div>
								<div class="col-lg-12 bottommargin">
									<label>Dcomentos</label>
									<small id="" class="form-text text-muted">Puedes subir hasta un máximo de 3 documentos en formato pdf, de hasta 3 MB por archivo.</small><br>
									<input id="adjuntoArchivos" name="adjuntoArchivos[]" type="file" class="file" multiple data-show-upload="false" data-show-caption="true" data-show-preview="true" data-allowed-file-extensions='["pdf"]' data-show-upload="false">
								</div>
							</div>
							<div class="form-group">
								<label for="ambitoMed">Ámbito de actuación</label>
								<div>
									<input id="ambitoMed" class="checkbox-style" name="ambitoMed" type="checkbox">
									<label for="ambitoMed" class="checkbox-style-3-label checkbox-small">Esta propuesta no tiene una ubicación concreta o no la conozco</label>									
								</div>
							</div>
							<div class="form-group">
								<small id="resumenHelp" class="form-text text-muted">Seleccione el municipio y coloque un punto</small>
								<select class="form-control" id="iIdMunicipio" name="iIdMunicipio">
									<option>Seleccionar</option>
									<?php echo $select; ?>
								</select>
							</div>
							<div class="form-group">
								<div id="map"></div>
								<input type="hidden" id="nLatDec" name="nLatDec" value="20.96704600410666">
								<input type="hidden" id="nLongDec" name="nLongDec" value="-89.62374816045451">
							</div>
							<!--<div class="form-group">
								<label for="sel_integra">Integrar propuestas</label>
								<select multiple class="form-control" id="sel_integra">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
								</select>
							</div>-->
							<div class="form-group">
								<div>
									<input id="terminos" class="checkbox-style" name="terminos" type="checkbox" onclick="aceptaTerminos();">
									<label for="terminos" class="checkbox-style-3-label checkbox-small">Acepto la Política de privacidad y las condiciones de uso</label>
								</div>
								<!--<input type="submit" class="btn btn-success" id="guarda_propuesta" onclick="actualizaText();" value="Crear propuesta" disabled/>-->
								<input type="submit" class="btn btn-success" id="guarda_propuesta" value="Crear propuesta" disabled/>
							</div>
						</form>

						<div class="line"></div>

					</div>

					<!-- Sidebar
					============================================= -->					

				</div>

			</div>

		</section><!-- #content end -->

		<!-- Footer
		============================================= -->
		<?php include 'footer.php'; ?>
	</div><!-- #wrapper end -->	

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script src="<?=base_url();?>public/js/jquery.js"></script>
	<script src="<?=base_url();?>public/js/plugins.js"></script>

	<!-- Bootstrap File Upload Plugin -->
	<script src="<?=base_url();?>public/js/components/bs-filestyle.js"></script>

	<!-- CKEditor.js 
	============================================= -->
	<script type="text/javascript" src="<?=base_url();?>js/ckeditor.js"></script>
	<script type="text/javascript" src='<?=base_url();?>js/jquery.base64.js'></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="<?=base_url();?>public/js/functions.js"></script>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnOBLYrneZlLUF5_bhWzGnwc6I7s01qEs&callback=initMap" async defer></script>

	<script>
		var idReturn = 0;
		var editor;

		$(document).ready(function(){
			ClassicEditor.create(document.querySelector('#vDescripcion'), {
				toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
				heading: {
		            options: [
		                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
		                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
		                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
		            ]
		        }

			})
			.then(newEditor=> {
				console.log(newEditor);
				editor = newEditor;
			})
			.catch(error=> {
				console.log(error);
			});
		});


		$("#adjuntoFotos").fileinput({
		    uploadUrl: '<?=base_url();?>C_propuestas/subir?op=1',
		    maxFileCount: 5,
		    allowedFileExtensions: ["jpg", "png", "gif"],
		    maxFileSize: 1024,
		    showUpload: false,
		    uploadAsync: false,
		    uploadExtraData: function() {
		    	return {
		    		iIdPropuesta: idReturn
		    	}
		    }
		});	

		$("#adjuntoArchivos").fileinput({
			uploadUrl: '<?=base_url();?>C_propuestas/subir?op=2',
		    maxFileCount: 3,
		    allowedFileExtensions: "pdf",
		    maxFileSize: 10240,
		    showUpload: false,
		    uploadAsync: false,
		    uploadExtraData: function() {
		    	return {
		    		iIdPropuesta: idReturn
		    	}
		    }
		});

		$('#formPropuesta').validate({			
			rules: {
				iIdSector: "required",
				iIdTema: "required",
				vTitulo: {
					required: true,
					minlength: 10,
					maxlength: 200
				},
				vDescripcion: "required"
				
			},
			messages: {
				iIdSector: "Debe seleccionar un Sector",
				iIdTema: "Debe seleccionar un Tema",
				vTitulo: {
					required: "Campo requerido",
					minlength: "El título debe contener un mínimo de 10 caracteres",
					maxlength: "El título puede contener un máximo de 200 caracteres"
				},
				vDescripcion: "Debe ingresar una descripción a la propuesta",
				vUrlVideoExterno: "Inserte una URL válida",				

			},
			submitHandler: function(form) {
				envia_form();
			}
		});
		// funciones de google maps----------------------------------------------------------------------
		var map;		
		var image = '<?=base_url();?>img/logo_vertical_2.png';

	    function initMap() {

	    	map = new google.maps.Map(document.getElementById('map'), {
	        	center: { lat: 20.97636467031955, lng: -89.62927700124328 },
	          	zoom: 8
	        });

	        var marker = new google.maps.Marker({
	          position: { lat: 20.97636467031955, lng: -89.62927700124328 },
	          map: map,
	          title: 'Click to zoom',
	          icon: image
	        });

	        map.addListener('click', function(e){
	        	var lat = e.latLng.lat();
	        	var lng = e.latLng.lng();
	        	var lat_lng = new google.maps.LatLng(lat,lng);

	        	marker.setPosition(lat_lng);
	        	map.setZoom(11);
	        	map.panTo(lat_lng);

	        	console.log('Lat\n'+lat);
	        	console.log('Lng'+lng);

	        	document.getElementById('nLatDec').value = lat;
	        	document.getElementById('nLongDec').value = lng;
	        });
        }


        //envio de formulario -------------------------------------------------------------------------
		function envia_form() {			
			$.base64.utf8encode = true;
			
			document.getElementById('vDescripcion').value = $.base64('encode',editor.getData(),true);

			var form =  $('#formPropuesta').serialize();
			var metodo = $('#formPropuesta').attr('method');
			var uri = $('#formPropuesta').attr('action');


			$.ajax({
				type: metodo,
				url: uri,
				data: form,
				async: false,
				success: function(data) {
					if(data > 0) {

						idReturn = data;
						var imageCount = $('#adjuntoFotos').fileinput('getFilesCount');
						var filesCount = $('#adjuntoArchivos').fileinput('getFilesCount');
						

						if(imageCount>0){
							$('#adjuntoFotos').fileinput('upload');
						}

						if(filesCount>0){
							$('#adjuntoArchivos').fileinput('upload');
						}

						$('#formPropuesta')[0].reset();
					}
				},
				fail: function() {
				    console.log("error");
				 }

			});	
		}

		function carga_temas(id) {
			$.post('<?=base_url();?>C_propuestas/carga_temas', {id:id}, function(resp){
				$('#iIdTema').html(resp);
			})
		}

		function aceptaTerminos()
		{
			if(document.getElementById('terminos').checked === true)
				document.getElementById('guarda_propuesta').removeAttribute('disabled');
		}

		/*function actualizaText()
		{
			editor.updateSourceElement();
		}*/

	</script>

</body>
</html>