<!DOCTYPE html>
<html dir="ltr" lang="es">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" type="image/png" href="<?=base_url();?>img/favicon_2.png"/>
	<link rel="stylesheet" href="<?=base_url();?>public/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/style.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/dark.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="<?=base_url();?>public/css/components/radio-checkbox.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/components/bs-filestyle.css" type="text/css" />

	<link type="text/css" rel="stylesheet" href="<?=base_url();?>admin/plugins/modal-loading/css/modal-loading.css" />
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>admin/plugins/modal-loading/css/modal-loading-animate.css" />

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
				<span><?php echo $_SESSION[PREFIJO.'_nombre']; ?></span>				
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
									<label for="sel_sect">Selecciona el Sector <i class="icon icon-asterisk text-danger"></i></label>
									<?php echo $input_sector; ?>



									<!--<select class="form-control" id="iIdSector" name="iIdSector" readonly required>
										<?php //echo $select_sec; /* <select class="form-control" id="iIdSector" name="iIdSector" onchange="carga_temas(this.value);" readonly required>*/?>
									</select>-->
								</div>
								<div class="form-group col-md-6">
									<label for="iIdTema">Selecciona el Tema <i class="icon icon-asterisk text-danger"></i></label>
									<?php echo $input_tema; ?>


									<!--<select class="form-control" id="iIdTema" name="iIdTema" readonly required>
										<?php //echo $select_tema; ?>
									</select>-->
								</div>
							</div>
							<div class="form-group">
								<label for="vTitulo">Titulo propuesta <i class="icon icon-asterisk text-danger"></i></label>
								<small id="vTituloHelp" class="form-text text-muted">(Máximo 200 caracteres)</small>
								<input type="text" class="form-control" id="vTitulo" name="vTitulo" required>
							</div>
							<div class="form-group">
								<label for="vDescripcion">Resumen de la propuesta <i class="icon icon-asterisk text-danger"></i></label>
								<textarea class="form-control" id="vDescripcion" name="vDescripcion" rows="5"></textarea>
							</div>
							<div class="form-group">
								<label for="vUrlVideoExterno">Enlace video externo</label>
								<input type="url" class="form-control" id="vUrlVideoExterno" name="vUrlVideoExterno" placeholder="https://www.youtube.com/watch?v=2NrJczORV6k">
							</div>
							<div class="row">
								<div class="col-lg-12 bottommargin">
									<label>Imágenes descriptivas:</label>
									<small id="" class="form-text text-muted">Puedes subir hasta 3 imagenes en los formatos jpeg,jpg o png; hasta 1 MB por acrhivo.<br></small><br>
									<input id="adjuntoFotos" name="adjuntoFotos[]" type="file" class="file" accept="image/*" multiple data-show-caption="true" data-show-preview="true" data-show-upload="false">
								</div>
								<div class="col-lg-12 bottommargin">
									<label>Documentos adicionales</label>
									<small id="" class="form-text text-muted">Puedes subir hasta un máximo de 3 documentos en formato pdf, de hasta 3 MB por archivo.</small><br>
									<input id="adjuntoArchivos" name="adjuntoArchivos[]" type="file" class="file" multiple data-show-caption="true" data-show-preview="true" data-allowed-file-extensions='["pdf"]' data-show-upload="false">
								</div>
							</div>
							<div class="form-group">
								<label for="ambitoMed">Ámbito de actuación</label>
								<div>
									<input id="ambitoMed" class="checkbox-style" name="ambitoMed" type="checkbox" onclick="checks(2);">
									<label for="ambitoMed" class="checkbox-style-3-label checkbox-small">Esta propuesta no tiene una ubicación concreta o no la conozco</label>									
								</div>
							</div>
							<div class="form-group">
								<small id="resumenHelp" class="form-text text-muted">Seleccione el municipio y coloque un punto <i class="icon icon-asterisk text-danger"></i></small>
								<select class="form-control" id="iIdMunicipio" name="iIdMunicipio" required onchange="js_municipio(this.value);">
									<option value="">Seleccionar</option>
									<?php echo $select; ?>
								</select>
							</div>
							<div class="form-group">
								<div id="map" class="map"></div>
								<input type="hidden" id="nLatDec" name="nLatDec" value="0">
								<input type="hidden" id="nLongDec" name="nLongDec" value="0">
							</div>							
							<div class="form-group">
								<div>
									<input id="terminos" class="checkbox-style" name="terminos" type="checkbox" onclick="checks(1);">
									<label for="terminos" class="checkbox-style-3-label checkbox-small">Acepto la Política de privacidad y las condiciones de uso</label>
								</div>
								<!--<input type="submit" class="btn btn-success" id="guarda_propuesta" onclick="actualizaText();" value="Crear propuesta" disabled/>-->
								<input type="submit" class="btn btn-success" id="guarda_propuesta" value="Enviar propuesta" disabled/>
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
	<!--<script type="text/javascript" src="<?=base_url();?>js/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="<?=base_url();?>js/ckeditor/config.js"></script>-->


	<script type="text/javascript" src="<?=base_url();?>admin/assets/libs/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="<?=base_url();?>admin/assets/libs/ckeditor/config.js"></script>



	<script type="text/javascript" src='<?=base_url();?>js/jquery.base64.js'></script>

	<!-- Loader
	==============================================-->
	<script src="<?=base_url();?>admin/plugins/modal-loading/js/modal-loading.js"></script>

	<!--<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/additional-methods.js"></script>-->

	<!-- Footer Scripts
	============================================= -->
	<script src="<?=base_url();?>public/js/functions.js"></script>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnOBLYrneZlLUF5_bhWzGnwc6I7s01qEs&callback=initMap" async defer></script>
	<script src="<?=base_url();?>js/municipios.js"></script>

	<script>
		var idReturn = 0;
		var editor;

		$(document).ready(function(){

			CKEDITOR.replace('vDescripcion');

			CKEDITOR.editorConfig = function( config ) {
				config.toolbarGroups = [
					{ name: 'forms', groups: [ 'forms' ] },
					{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
					{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
					{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
					{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
					'/',
					{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
					{ name: 'links', groups: [ 'links' ] },
					{ name: 'insert', groups: [ 'insert' ] },
					'/',
					{ name: 'styles', groups: [ 'styles' ] },
					{ name: 'colors', groups: [ 'colors' ] },
					{ name: 'tools', groups: [ 'tools' ] },
					{ name: 'others', groups: [ 'others' ] },
					{ name: 'about', groups: [ 'about' ] }
				];

				config.removeButtons = 'Save,NewPage,Preview,Print,Templates,Cut,Copy,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,Subscript,BidiLtr,BidiRtl,Language,Anchor,Flash,Smiley,SpecialChar,PageBreak,Iframe,Maximize,ShowBlocks,About,Outdent,Indent,Find,Replace,Scayt,Source,BGColor,Superscript,RemoveFormat,CopyFormatting';
			}			
		});

		    /*minImageWidth: 50,
    minImageHeight: 400*/
		$("#adjuntoFotos").fileinput({
		    showUpload: false,
		    layoutTemplates: {
				actions: '<div class="file-actions">\n' +
		        '    <div class="file-footer-buttons">\n' +
		        '        {delete} {zoom}' +
		        '    </div>\n' +
		        '    {drag}\n' +
		        '    <div class="clearfix"></div>\n' +
		        '</div>',
			},
		    uploadUrl: '<?=base_url();?>C_propuestas/subir?op=1',
		    maxFileCount: 3,
		    allowedFileExtensions: ["jpg", "png"],
		    maxFileSize: 1024,
		    minImageHeight: 400,
		    uploadAsync: false,
		    uploadExtraData: function() {
		    	return {
		    		iIdPropuesta: idReturn
		    	}
		    }
		});	

		$("#adjuntoArchivos").fileinput({
		    showUpload: false,
		    layoutTemplates: {
				actions: '<div class="file-actions">\n' +
		        '    <div class="file-footer-buttons">\n' +
		        '        {delete} {zoom}' +
		        '    </div>\n' +
		        '    {drag}\n' +
		        '    <div class="clearfix"></div>\n' +
		        '</div>',
			},
			uploadUrl: '<?=base_url();?>C_propuestas/subir?op=2',
		    maxFileCount: 3,
		    allowedFileExtensions: "pdf",
		    maxFileSize: 3082,
		    uploadAsync: false,
		    uploadExtraData: function() {
		    	return {
		    		iIdPropuesta: idReturn
		    	}
		    }
		});

		// funciones de google maps----------------------------------------------------------------------
		var map;
		var marker;	
		var image = '<?=base_url();?>img/logo_vertical_2.png';

	    function initMap() {

	    	map = new google.maps.Map(document.getElementById('map'), {
	        	center: { lat: 20.97636467031955, lng: -89.62927700124328 },
	          	zoom: 8
	        });

	        marker = new google.maps.Marker({
	          position: { lat: 20.97636467031955, lng: -89.62927700124328 },
	          map: map,
	          icon: image
	        });

	        map.addListener('click', function(e){
	        	var lat = e.latLng.lat();
	        	var lng = e.latLng.lng();
	        	var lat_lng = new google.maps.LatLng(lat,lng);

	        	marker.setPosition(lat_lng);
	        	map.setZoom(11);
	        	map.panTo(lat_lng);

	        	document.getElementById('nLatDec').value = lat;
	        	document.getElementById('nLongDec').value = lng;
	        });
        }


		var valida_form = $('#formPropuesta').validate({
			ignore: [],	
			rules: {
				iIdSector: "required",
				iIdTema: "required",
				vTitulo: {
					required: true,
					minlength: 10,
					maxlength: 200
				},
				vDescripcion: {
					required: function() {
						CKEDITOR.instances.vDescripcion.updateElement();
					},
					minlength: 18
				},
				vUrlVideoExterno: {
					pattern: /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/
				}

			},
			messages: {
				iIdSector: "Debe seleccionar un Sector",
				iIdTema: "Debe seleccionar un Tema",
				vTitulo: {
					required: "Ingrese un título para su propuesta",
					minlength: "El título debe contener un mínimo de 10 caracteres",
					maxlength: "El título puede contener un máximo de 200 caracteres"
				},
				vDescripcion: {
					required: "Debe ingresar una descripción a la propuesta",
					minlength: "La propuesta debe contener un mínimo de 10 caracteres",
					
				},
				vUrlVideoExterno: "Debe ser una URL de Youtube"
				,
				iIdMunicipio: "Debe seleccionar un municipio"

			},
			submitHandler: function(form) {
				envia_form();
			}
		});		

        //envio de formulario -------------------------------------------------------------------------
		function envia_form() {			

			$.base64.utf8encode = true;
			var loading;
			
			//document.getElementById('vDescripcion').value = $.base64('encode',editor.getData(),true);
			var nLatDec = document.getElementById('nLatDec').value;
	        var nLongDec = document.getElementById('nLongDec').value;	        

			var form =  $('#formPropuesta').serialize();
			var metodo = $('#formPropuesta').attr('method');
			var uri = $('#formPropuesta').attr('action');

			if(document.getElementById('terminos').checked) {
				if((nLatDec != "0" && nLongDec != "0") || (document.getElementById('ambitoMed').checked==true)) {
					$.ajax({
						type: metodo,
						url: uri,
						data: form,
						async: false,
						beforeSend: function(){
				           loading = new Loading({
				                discription: 'Guardando...',
				                defaultApply: true
				            });
				        },
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

								//$('#formPropuesta')[0].reset();
								//editor.setData('');
								//loading.out();

								location.href = "<?=base_url();?>Sitio/propuestas";
							}
						},
						fail: function() {
						    console.log("error");
						 }

					});	
				}
				else toastr.warning('Error de latitud y longitud', '¡Advertencia!', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 2000 });
			}
			else toastr.warning('Debe aceptar la política de privacidad', '¡Advertencia!', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 2000 });
		}

		function carga_temas(id) {
			$.post('<?=base_url();?>C_propuestas/carga_temas', {id:id}, function(resp){
				$('#iIdTema').html(resp);
			})
		}

		function checks(op)
		{
			if(op==1) {
				if(document.getElementById('terminos').checked)
					document.getElementById('guarda_propuesta').removeAttribute('disabled');
				else
					document.getElementById('guarda_propuesta').setAttribute('disabled','');				
			}			
			else if(op==2) {
				if(document.getElementById('ambitoMed').checked==true) {
					document.getElementById('iIdMunicipio').removeAttribute('required');
					if($("#iIdMunicipio").hasClass("error"))  {						
						document.getElementById('iIdMunicipio').classList.remove('error');					
					}
				}
				else
					document.getElementById('iIdMunicipio').setAttribute('required','');
			}
		}

		function js_municipio(valor) {
			//console.log('latitud: '+lat_mun[valor]+'\n'+'longitud: '+lng_mun[valor]);			
			document.getElementById('nLatDec').value = lat_mun[valor];
	        document.getElementById('nLongDec').value = lng_mun[valor];

			var coordenadas = {lat: parseFloat(lat_mun[valor]), lng: parseFloat(lng_mun[valor])};			
			
			map.setCenter(coordenadas);
			marker.setPosition(coordenadas);
			map.setZoom(11);

			/*
			map.data.forEach(function(feature) {
		        map.data.remove(feature);
		    });

			map.data.loadGeoJson('<?=base_url();?>json/m'+valor+'.json');
	        map.data.setStyle({
			    fillColor: 'green',
			    fillOpacity: 0,
				strokeWeight: 1
			});*/
		}		

		/*function actualizaText()
		{
			editor.updateSourceElement();
		}*/

	</script>

</body>
</html>