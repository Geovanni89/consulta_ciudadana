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
		
		<section id="content" onmouseover="carga_imagenes();">

			<div class="content-wrap">
				
				
				<div class="container clearfix">					

					<?php include('plantilla_matriz.php'); ?>
					
					<div class="col_one_third"></div>
					<div class="col_one_third" id="btn_enviot">
						<?php
							if($existe==0) echo '<a href="javascript:" onclick="envia_temas();" class="btn btn-block btn-success">Enviar</a>';
							elseif($existe==-1) echo '<div class="style-msg errormsg">
							<div class="sb-msg"><i class="icon-remove"></i> Para poder apoyar una propuesta debe <a href="'.base_url().'Sitio/login?r=1">iniciar sesión</a> o <a href="'.base_url().'Sitio/registrarse">Registrarse</a>.</div>
								</div>';
							else echo '<div class="style-msg successmsg"><div class="sb-msg"><i class="icon-thumbs-up"></i> Usted ya ha participado en este proceso.</div></div>';
						?>						
					</div>
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

		var total_temas = 0;
		var id_temas = {};

		//setInterval(function(){ console.log("Hello"); }, 3000);		

		function selecciona_temas(idtema) {
			if($('#tema_'+idtema).hasClass('bg-primary')!==true) {
				if(total_temas<3) {

					if(typeof $('#tema_'+idtema).val()!=='undefined')
					{						
						id_temas['tema_'+idtema] = idtema;
						total_temas++;
					    // the variable is defined
						$('#tema_'+idtema).removeClass('bg-secondary').addClass('bg-primary');
						$('#tema_'+idtema).css("background-image", "");
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
					$('#tema_'+idtema).css("background-image", "url('../img/ejes/"+imagenes[idtema-1]+"')");				
					delete id_temas['tema_'+idtema];
					total_temas--;					
				}				
			}
		}

		function envia_temas() {		
			if(total_temas==3) {				
				$.post('<?=base_url();?>C_presupuesto/envia_temas',{temas:id_temas}, function(resp){
					console.log(resp);
					if(resp==1) {
						toastr.success('Temas enviados correctamente', 'Correcto', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 5000 });
						$('#btn_enviot').html('<div class="style-msg successmsg"><div class="sb-msg"><i class="icon-thumbs-up"></i> Agradecemos su participación en este proceso.</div></div>');						
					}
					else toastr.danger('Los temas no se guardaron correctamente', 'Error!', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 2000 });
				});
			}
			else toastr.warning('Debe seleccionar 3 temas para continuar', '¡Advertencia!', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 2000 });
		}	
		
	</script>
	<!-- Footer Scripts
	============================================= -->

</body>
</html>