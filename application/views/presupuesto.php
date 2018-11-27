<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" type="image/png" href="<?=base_url();?>img/favicon_2.png"/>
	<link rel="stylesheet" href="<?=base_url();?>public/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/style.css?v=1" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/swiper.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/dark.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="<?=base_url();?>public/css/responsive.css" type="text/css" />

	<link rel="stylesheet" href="<?=base_url();?>public/chosen/chosen.min.css?v=1" type="text/css" />
	<!--Modal Loading -->
	<link type="text/css" rel="stylesheet" href="<?=base_url();?>admin/plugins/modal-loading/css/modal-loading.css" />
	<link type="text/css" rel="stylesheet" href="<?=base_url();?>admin/plugins/modal-loading/css/modal-loading-animate.css" />
	<!--Modal Loading -->
	<style type="text/css">
		.error_chosen{
			border: 1px solid #EE0000;
		}
		
	</style>

	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>Participación Ciudadana</title>

</head>

<body class="stretched" data-loader="2" data-animation-in="fadeIn" data-speed-in="1500" data-animation-out="fadeOut" data-speed-out="800">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<div id="home" class="page-section" style="position:absolute;top:0;left:0;width:100%;height:200px;z-index:-2;"></div>

		
		<!-- Header
		============================================= -->
		<?php include('header.php'); ?>

		<div class="clear"></div>

		<!-- Content
		============================================= -->
		
		<section id="content">

			<div class="content-wrap">
				
				
				<div class="container clearfix">					

					<?php include('plantilla_matriz.php'); ?>
					
					<div class="col_one_third"></div>
					<div class="col_one_third"><a href="javascript:" onclick="envia_temas();" class="btn btn-block btn-success">Enviar</a></div>
				</div>				

			</div>			
			<br>
			<br>
		</section>
		<!-- Footer
		============================================= -->
		<footer id="footer" class="dark">

			<!-- Copyrights
			============================================= -->
			<div id="copyrights">

				<div class="container clearfix">

					<div class="col_third_fourth">
						<div class="col_one_third">
							
						</div>
						<div class="col_one_third">
							<img src="<?=base_url();?>img/logo_yucatan.png">
						</div>						
					</div>					

				</div>

			</div><!-- #copyrights end -->

		</footer><!-- #footer end -->

	</div><!-- #wrapper end -->	

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script src="<?=base_url();?>public/js/jquery.js"></script>
	<script src="<?=base_url();?>public/js/plugins.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="<?=base_url();?>public/js/functions.js"></script>	
	<script src="<?=base_url();?>public/js/funciones.js?v=1.2"></script>

	<!-- Chosen
	============================================= -->
	<script src="<?=base_url();?>public/chosen/chosen.jquery.min.js"></script>
	<script src="<?=base_url();?>public/chosen/chosen.proto.min.js"></script>
	<!--Modal Loading -->
	<script src="<?=base_url();?>admin/plugins/modal-loading/js/modal-loading.js"></script>
	<!--Modal Loading -->
	<!-- External JavaScripts
				============================================= -->
				
	<script>
		var imagenes = ['competividad.jpg','comercialyturistica.jpg','industrial.jpg','capitalhumano.jpg','seguridadpatrimonial.jpg?','cienciaytecnologia.jpg','empleoyfomentoalemprendedurismo.jpg','alimentaria.jpg','vivienda.jpg','salud.jpg','desarrolloruralypesquero.jpg','seguridadsocial.jpg','inclusionsocial.jpg','seguridadyestadodederecho.jpg','pueblosindigenas.jpg','educacionuniversal.jpg','deportedealtorendimiento.jpg','educaciondecalidad.jpg','culturatradicional.jpg','deporteincluyente.jpg','bellasartes.jpg','hidrica.jpg','movilidadsustentableyconectividadregional.jpg','energetica.jpg','cambioclimaticoysustentabilidad.jpg','manejointegralderesiduos.jpg','ordenamientourbanoyterritorial.jpg','consevacionderecursosnaturales.jpg','igualdad.jpg','gobiernoaustero.jpg','infraestructura.jpg'];

		$(document).ready(function() {
			console.log( "ready!" );
			for (var i = 0; i < imagenes.length; i++) {
				$("#tema_"+(i+1)).css("background-image", "url('../img/ejes/"+imagenes[i]+"')");
			}			

			//$('myOjbect').css('background-image', 'url("' + imageUrl + '")');
		});

		var total_temas = 0;
		var id_temas = {};



		function selecciona_temas(idtema) {
			if($('#tema_'+idtema).hasClass('bg-success')!==true) {
				if(total_temas<3) {

					if(typeof $('#tema_'+idtema).val()!=='undefined')
					{						
						id_temas['tema_'+idtema] = idtema;
						total_temas++;
					    // the variable is defined
						$('#tema_'+idtema).removeClass('bg-secondary').addClass('bg-primary');
					}
					else toastr.danger('No se ha podido seleccionar el tema', 'Error', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 2000 });
					

					//toastr.success('Tema seleccionado correctamente', 'Correcto', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 2000 });
				}
				else if(idtema>=3)
					toastr.warning('Ya ha seleccionado el máximo de temas posibles', '¡Advertencia!', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 2000 });
					
			}
			else {
				if(id_temas['tema_'+idtema]) {
					$('#tema_'+idtema).removeClass('bg-primary').addClass('bg-secondary');
					delete id_temas['tema_'+idtema];
					total_temas--;					
				}				
			}
		}

		function envia_temas() {
			//var id=[];		
			if(total_temas==3) {
				/*$.each(id_temas, function(index,val) {			  
				  id.push(val);
				});*/
				$.post('<?=base_url();?>C_presupuesto/envia_temas',{temas:id_temas}, function(resp){
					console.log(resp);
					//toastr.success('Temas enviados correctamente', 'Correcto', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 2000 });
				});
			}
			else toastr.warning('Debe seleccionar 3 temas para continuar', '¡Advertencia!', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 2000 });
		}	
		
	</script>
	<!-- Footer Scripts
	============================================= -->

</body>
</html>