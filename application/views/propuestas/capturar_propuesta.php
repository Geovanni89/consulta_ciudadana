<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap File Upload Plugin -->
    <link rel="stylesheet" href="<?=base_url();?>public/css/components/bs-filestyle.css" type="text/css" />
    <!-- CkEditor Plugin -->
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>admin/assets/libs/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
    <link rel="stylesheet" href="<?=base_url();?>public/css/font-icons.css" type="text/css" />
    
</head>

<body>
	<div class="card">
		<div class="card-body">
			<form id="formcapturapropuesta" method="POST" action="<?=base_url();?>C_propuestas_admin/guardar_propuesta">
		        <div class="form-body">

		            <div class="row">
		                <div class="col-md-6">
		                    <div class="form-group">
		                    	<label>SELECCIONA EL SECTOR</label>
		                    	<input type="hidden" id="iIdPropuesta" name="iIdPropuesta" value="<?=$iIdPropuesta;?>">
		                        <select name="iIdSector" id="iIdSector" class="form-control" onchange="CargarListado('temas', 'iIdSector', 'iIdTema');">
		                        	<?=$op_sectores; ?>
		                        </select>
		                    </div>
		                </div>
		                <div class="col-md-6">
		                    <div class="form-group">
		                    	<label>SELECCIONA EL TEMA</label>
		                        <select name="iIdTema" id="iIdTema" class="form-control">
		                        	<?=$op_temas; ?>
		                        </select>
		                    </div>
		                </div>
		            </div>

		            <div class="row">
		                <div class="col-md-12">
		                    <div class="form-group">
		                    	<label>TITULO PROPUESTA</label>
		                        <input type="vTitulo" name="vTitulo" class="form-control" value="<?=$vTitulo;?>">
		                    </div>
		                </div>
		            </div>

		            <div class="row">
		                <div class="col-md-12">
		                    <div class="form-group">
		                    	<label>RESUMEN DE LA PROPUESTA</label><br>
		                    	<small>(Máximo 200 caracteres)</small>
		                        <textarea name="tDescripcion" id="tDescripcion">
		                        	<?=$tDescripcion;?>
		                        </textarea>
		                    </div>
		                </div>
		            </div>

		            <div class="row">
		                <div class="col-md-12">
		                    <div class="form-group">
		                    	<label>ENLACE VIDEO EXTERNO</label>
		                        <input type="vUrlVideoExterno" name="vUrlVideoExterno" class="form-control" value="<?=$vUrlVideoExterno;?>">
		                    </div>
		                </div>
		            </div>
		            
		            <div class="row">
		                <div class="col-md-12">
		                    <div class="form-group">
		                    	<label>IMÁGENES DESCRIPTIVAS</label><br>
		                    	<small>Puedes subir hasta 5 imagenes en los formatos jpeg o jpg; hasta 1 MB por acrhivo.</small>
		                    	<input id="adjuntoFotos" name="adjuntoFotos[]" type="file" class="file" accept="image/*" multiple data-show-upload="false" data-show-caption="true" data-show-preview="true" data-show-upload="false">
		                        
		                    </div>
		                </div>
		            </div>

		            <div class="row">
		                <div class="col-md-12">
		                    <div class="form-group">
		                    	<label>DOCUMENTOS</label><br>
		                    	<small>Puedes subir hasta un máximo de 3 documentos en formato pdf, de hasta 3 MB por archivo.</small>
		                    	<input id="adjuntoArchivos" name="adjuntoArchivos[]" type="file" class="file" multiple data-show-upload="false" data-show-caption="true" data-show-preview="true" data-allowed-file-extensions='["pdf"]' data-show-upload="false">
		                        
		                    </div>
		                </div>
		            </div>

		            <div class="row">
		                <div class="col-md-12">
		                    <div class="form-group">
		                    	<label>ÁMBITO DE ACTUACIÓN</label><br>
                    	        <input type="checkbox"  id="ambitoMed" name="ambitoMed" <?php if($iIdMunicipio == 0 ){ echo 'checked="checked"'; }?>>
                                <label class="" for="customCheck1" style="font-size:12px;">ESTA PROPUESTA NO TIENE UNA UBICACIÓN CONCRETA O NO LA CONOZCO</label>
		                    </div>
		                </div>
		            </div>

		            <div class="row">
		                <div class="col-md-12">
		                    <div class="form-group">
		                    	<small>Seleccione el municipio y coloque un punto.</small>
		                    	<select name="iIdMunicipio" id="iIdMunicipio" class="form-control" onchange="js_municipio(this.value);">
		                    		<?=$op_municipios;?>
		                    	</select>
		                    </div>
		                </div>
		            </div>

		            <div class="row">
		                <div class="col-md-12">
		                    <div class="form-group">
		                    	<div id="map" class="map" style="height:400px;"></div>
									<input type="hidden" id="nLatDec" name="nLatDec" value="0">
									<input type="hidden" id="nLongDec" name="nLongDec" value="0">
								</div>                        
		                    </div>
		                </div>
		            </div>

		            <?php if($iEstatus > 0){ ?>
		            <div class="row" id="rowestatus">
		                <div class="col-md-6">
		                    <div class="form-group">
		                  		<label>Estatus de la propuesta</label>
		                  		<input type="hidden" name="estatus_inicial" id="estatus_inicial" value="<?=$iEstatus;?>">
		                    	<select name="iEstatus" id="iEstatus" class="form-control" onchange="MostrarMotivo()">
		                    		<?=$op_estatus_propuestas;?>
		                    	</select>
		                    </div>
		                </div>
		                <!--
		                <div class="col-md-6" id="motivo" style="display: none;">
		                    <div class="form-group">
		                    	<label>Motivo</label>
		                    	<textarea class="form-control" name="vMotivo" id="vMmotivo" placeholder="Escriba el motivo"></textarea>
		                    </div>
	                    </div>-->
		            </div>
		        	<?php } 		        	
		        	?>
		        	<div class="row">
		                <div class="col-md-12">
		                	<div class="card">
								<div class="card-body">		                    
			                  		<label>Propuestas a integrar</label><br>
				                    <?=$propuestas_integradas;?>
				                </div>
				            </div>
		                </div>
		            </div>

		            <?php 
	            	if(isset($_SESSION['checks']) && !empty($_SESSION['checks']) && $iIdPropuesta == 0)
	            	{	//	Necesario escribir un comentario si se integran propuestas
	            	?>

	            	<div class="row">
		                <div class="col-md-12">
		                    <div class="form-group">
		                    	<label>Mensaje para los autores</label><br>
		                    	<small>Escriba un breve mensaje para autores de las propuestas integradas, este será enviado por correo a c/u</small>
		                    	<textarea class="form-control" name="mensajecorreo" id='mensajecorreo' placeholder="Escriba su mensaje"></textarea>
		                    </div>
		                </div>
		            </div>

	            	<?php
	            	}
		            ?>

		            <div class="row">
		                <div class="col-md-12">
		                	<input type="submit" class="btn btn-success" id="guarda_propuesta" value="Guardar propuesta"/>
		                	<input type="button" class="btn btn-success" id="guarda_propuesta" value="Agregar" onclick="Agregar();" />
		                	<input type="button" class="btn btn-success" id="guarda_propuesta" value="Quitar" onclick="Quitar();" />
		                </div>
		            </div>

		        </div>
		    </form>
		</div>
	</div>
</body>
<!-- Bootstrap File Upload Plugin -->
<script src="<?=base_url();?>public/js/components/bs-filestyle.js"></script>
<!-- CkEditor Plugin -->
<script src="<?=base_url();?>admin/assets/libs/ckeditor/ckeditor.js"></script>
<!-- Codificación base 64 Plugin -->
<script type="text/javascript" src='<?=base_url();?>js/jquery.base64.js'></script>
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnOBLYrneZlLUF5_bhWzGnwc6I7s01qEs&callback=initMap" async defer></script>-->
<!-- Datos de cabeceras municipales -->
<script src="<?=base_url();?>js/municipios.js"></script>
<script type="text/javascript">
	var idReturn = 0;
	var numfotos = 0;
	var numdocs = 0;
	var numdocsprev = <?=$numdocsprev;?>;
	var numimgsprev = <?=$numimgsprev;?>;
	var image = '<?=base_url();?>img/logo_vertical_2.png';
	var editor;
	var docelim = [];
	var fotoselim = [];
	var map;
	var marker;	
	var image = '<?=base_url();?>img/logo_vertical_2.png';

	$(document).ready(function(){
		CKEDITOR.replace( 'tDescripcion' );
		initMap();

		$('#formcapturapropuesta').validate({
			rules: {
				iIdSector:{
					min: 1
				},
				iIdTema:{
					min: 1
				},
				vTitulo: {
					required: true,
					minlength: 10,
					maxlength: 200
				},
				tDescripcion: "required",
				mensajecorreo: "required",
				vMotivo:"required"

			},
			messages: {
				iIdSector: {
					min: "Debe seleccionar un Sector"
				},
				iIdTema:{
					min: "Debe seleccionar un Tema"
				},
				vTitulo: {
					required: "Ingrese un título para su propuesta",
					minlength: "El título debe contener un mínimo de 10 caracteres",
					maxlength: "El título puede contener un máximo de 200 caracteres"
				},
				tDescripcion: "Debe ingresar una descripción a la propuesta",
				mensajecorreo: "Debe escribir un mensaje para los autores",
				vUrlVideoExterno: "Inserte una URL válida",	
				vMotivo: "Debe escribir el motivo",
				//iIdMunicipio: "Debe seleccionar un municipio"

			},
			submitHandler: function(form) {
				EnviaForm();
			}
		});		


	});
	

	$("#adjuntoFotos").fileinput({
		    uploadUrl: '<?=base_url();?>C_propuestas_admin/subir_adjuntos',
		    maxFileCount: 5,
		    allowedFileExtensions: ["jpg", "png", "gif"],
		    maxFileSize: 1024,
		    showUpload: false,
		    uploadAsync: false,
		    overwriteInitial: false,
		    initialPreviewAsData: true,
		    initialPreviewFileType: 'image',
		    initialPreview: [<?=$initialPreview_img;?>],
			initialPreviewConfig: [<?=$initialPreviewConfig_img;?>],
		    uploadExtraData: function() {
		    	return {
		    		iIdPropuesta: idReturn,
		    		op: 1,
		    		num: numfotos,
		    		elim: fotoselim
		    	}
		    }

		}).on('filebeforedelete', function(event, key) {
	        var confirmacion = window.confirm('¿Realmente desea eliminar este archivo?');
	        
	        if(confirmacion) fotoselim.push(key);

	        return !confirmacion;
	    }).on('filedeleted', function() {
	        setTimeout(function() {
	           //window.alert('File deletion was successful! ');
	        }, 900);
	    });
	    


	$("#adjuntoArchivos").fileinput({
			uploadUrl: '<?=base_url();?>C_propuestas_admin/subir_adjuntos',
		    maxFileCount: 3,
		    allowedFileExtensions: "pdf",
		    maxFileSize: 10240,
		    showUpload: false,
		    uploadAsync: false,
		    overwriteInitial: false,
		    initialPreviewAsData: true,
		    initialPreviewFileType: 'any',
		    initialPreview: [<?=$initialPreview_doc;?>],
			initialPreviewConfig: [<?=$initialPreviewConfig_doc;?>],
		    uploadExtraData: function() {
		    	return {
		    		iIdPropuesta: idReturn,
		    		op: 2,
		    		num: numdocs,
		    		elim: docelim
		    	}
		    }
		}).on('filebeforedelete', function(event, key) {
	        var confirmacion = window.confirm('¿Realmente desea eliminar este archivo?');
	        
	        if(confirmacion) docelim.push(key);

	        return !confirmacion;
	    });

	// funciones de google maps----------------------------------------------------------------------
    function initMap() {

    	var latitud = <?php if($nLatDec == 0){ echo '20.97636467031955'; }else{echo $nLatDec;}?>;
    	var longitud = <?php if($nLatDec == 0){ echo '-89.62927700124328'; }else{echo $nLongDec;}?>;
    	//console.log(latitud);
    	//console.log(longitud);
    	map = new google.maps.Map(document.getElementById('map'), {
        	center: { lat: latitud, lng: longitud },
          	zoom: 11
        });

        marker = new google.maps.Marker({
          position: { lat: latitud, lng: longitud },
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

	function Elim(id)
	{
		$('#'+id).remove();
	}

	function EnviaForm()
	{
		$.base64.utf8encode = true;
		
		document.getElementById('tDescripcion').value = $.base64('encode',CKEDITOR.instances.tDescripcion.getData(),true);
		//console.log($.base64('encode',CKEDITOR.instances.tDescripcion.getData(),true));
		var nLatDec = document.getElementById('nLatDec').value;
        var nLongDec = document.getElementById('nLongDec').value;

		var datos =  $('#formcapturapropuesta').serialize();
		var metodo = $('#formcapturapropuesta').attr('method');
		var uri = $('#formcapturapropuesta').attr('action');
		var loading;
		
		if((nLatDec != "0" && nLongDec != "0") || (document.getElementById('ambitoMed').checked==true)) {
			$.ajax({
				type: metodo,
				url: uri,
				data: datos,
				async: true,
				beforeSend: function(){
		           loading = new Loading({
		                discription: 'Espere...',
		                defaultApply: true
		            });
		        },
				success: function(data) {

					var cod = data.split("-");

					if($("#iIdPropuesta").val() > 0)
					{
						
			        	switch(cod[0])
			            {
			                case "0":
			                	idReturn = $("#iIdPropuesta").val();
			                    if( $('#adjuntoFotos').fileinput('getFilesCount') > 0 || numimgsprev > 0 )
			                    {
			                    	numfotos = $('#adjuntoFotos').fileinput('getFilesCount');
			                    	$('#adjuntoFotos').fileinput('upload');
			                    }
			                    if( $('#adjuntoArchivos').fileinput('getFilesCount') > 0 || numdocsprev > 0)
			                    {
			                    	numdocs = $('#adjuntoArchivos').fileinput('getFilesCount');
			                    	$('#adjuntoArchivos').fileinput('upload');
			                    }
			                    Notificacion('Los cambios han sido guardados','success');
			                    break;
		                   	case "*":
			                    Notificacion('Los cambios han sido guardados, pero no ha sido posible enviar los correos','warning');
			                    break;
			                default:
			                    Notificacion("Ha ocurrido un error",'error');
			                    break;
			            }
			            

					}
					else
					{

						switch(cod[0])
			            {
			                case "0":
			                    idReturn = cod[1];
			                    if( $('#adjuntoFotos').fileinput('getFilesCount') > 0 )
			                    {
			                    	numfotos = $('#adjuntoFotos').fileinput('getFilesCount');
			                    	$('#adjuntoFotos').fileinput('upload');
			                    }
			                    if( $('#adjuntoArchivos').fileinput('getFilesCount') > 0 )
			                    {
			                    	numdocs = $('#adjuntoArchivos').fileinput('getFilesCount');
			                    	$('#adjuntoArchivos').fileinput('upload');
			                    }
								Notificacion('Los cambios han sido guardados','success');
			                    break;
		                   	case "*":
			                    Notificacion('Los cambios han sido guardados, pero no ha sido posible enviar los correos','warning');
			                    break;
			                default:
			                    Notificacion("Ha ocurrido un error",'error');
			                    break;
			            }

					}

					loading.out();
			        Buscar(1);
					
					
				},
				fail: function() {
					loading.out();
				    console.log("error");
				 }

			});	
		}
		else Notificacion('Error de latitud y longitud', 'warning');

	}

	function MostrarMotivo()
	{
		if($("#iEstatus").val() == 0)
		{			
			if($("#estatus_inicial").val() != $("#iEstatus").val())
			{
				$("#rowestatus").append('<div class="col-md-6" id="motivo"><div class="form-group"><label>Motivo</label><textarea class="form-control" name="vMotivo" id="vMmotivo" placeholder="Escriba el motivo"></textarea></div></div>');
			}
		}
		else
		{
			$("#motivo").remove();
		}
	}

	function validar()
	{
		console.log( $('#adjuntoFotos').fileinput('getFilesCount'));
		//$('#adjuntoFotos').fileinput('upload');
	}

	function js_municipio(valor) {
		//var coordenadas = {lat: parseFloat(lat_mun[valor]), lng: parseFloat(lng_mun[valor])};	
		var coordenadas = new google.maps.LatLng(lat_mun[valor],lng_mun[valor]);
		document.getElementById('nLatDec').value = lat_mun[valor];
        document.getElementById('nLongDec').value = lng_mun[valor];		
		
		map.setCenter(coordenadas);
		marker.setPosition(coordenadas);
		map.setZoom(11);
	}
</script>
</html>