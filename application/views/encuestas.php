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
		<?php 
			$alto = 150;
			$alto2 = 325;
			$rutaimagen = base_url().'/img/ejes/';
		?>
		<section id="content">

			<div class="content-wrap">

				
				<div class="container clearfix">					
					<div class="heading-block center">						
						<h2>Selecciona el tema para participar en la encuesta.</h2>
					</div>

					<!--<div class="">
						<div class="feature-box fbox-center fbox-light fbox-plain">
							<h3 style="font-size: 24px;color: #1a4a60; font-weight: 1200;"><strong>MATRIZ DE EJES<br>PED 2018-2024</strong></h3>
						</div>
					</div>-->					

					<div class="fancy-title title-center title-dotted-border topmargin-sm">
					<h3 style="color: #4d4d4d;"><b>EJE TRANSVERSAL</b></h3>
				</div>

				<div class="row grid-container" data-layout="masonry" style="overflow: visible">
					<div class="col-lg-4 mb-4">
						<div class="flip-card text-center top-to-bottom">
							<div class="flip-card-front dark" style="background-image: url('<?=base_url();?>img/ejes/igualdad.jpg')" data-height-xl="<?=$alto;?>">
								<div class="flip-card-inner">
									<div class="card nobg noborder text-center">
										<div class="card-body nopadding">
											<!--<i class="icon-line2-camera h1"></i>-->
											<img src="<?=base_url();?>img/matriz/i_Igualdad-de-género.png">
											<p class="card-text t400">Equidad de género</p>
										</div>
									</div>
								</div>
							</div>
							<div class="flip-card-back bg-danger no-after" data-height-xl="<?=$alto;?>">
								<div class="flip-card-inner">
									<button type="button" class="btn btn-outline-light mt-2" onclick="MostrarEncuesta(1);"><i class="icon icon-search"></i></button>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-4 mb-4">
						<div class="flip-card text-center top-to-bottom">
							<div class="flip-card-front dark" data-height-xl="<?=$alto;?>" style="background-image: url('<?=$rutaimagen?>/gobiernoaustero.jpg');" data-height-xl="<?=$alto;?>">
								<div class="flip-card-inner">
									<div class="card nobg noborder text-center">
										<div class="card-body nopadding">
											<img src="<?=base_url();?>img/matriz/i_gobierno.png">
											<p class="card-text t400">Gobierno austero, abierto, innovador y eficiente</p>
										</div>
									</div>
								</div>
							</div>
							<div class="flip-card-back bg-danger no-after" data-height-xl="<?=$alto;?>">
								<div class="flip-card-inner">									
									<button type="button" class="btn btn-outline-light mt-2" onclick="MostrarInfografía(0);"><i class="icon icon-search"></i></button>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-4 mb-4">
						<div class="flip-card text-center top-to-bottom">
							<div class="flip-card-front dark" data-height-xl="<?=$alto;?>" style="background-image: url('<?=$rutaimagen?>/infraestructura.jpg');">
								<div class="flip-card-inner">
									<div class="card nobg noborder text-center">
										<div class="card-body nopadding">
											<img src="<?=base_url();?>img/matriz/i_infraestructura.png">
											<p class="card-text t400">Infraestructura y proyectos estratégicos</p>
										</div>
									</div>
								</div>
							</div>
							<div class="flip-card-back bg-danger no-after" data-height-xl="<?=$alto;?>">
								<div class="flip-card-inner">
									<button type="button" class="btn btn-outline-light mt-2" onclick="MostrarInfografía(0);"><i class="icon icon-search"></i></button>
								</div>
							</div>
						</div>
					</div>
				</div>
					
				</div>				

			</div>

			<div class="row">

				<div class="col-lg-12" id="encuesta">
					
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

	<div class="modal1 mfp-hide" id="myModal1">
		<div class="block divcenter" style="background-color: #FFF; max-width: 500px;">
			<div class="feature-box fbox-center fbox-effect nobottomborder nobottommargin" style="padding: 40px;">
				<div class="fbox-icon">
					<a href="#"><i class="icon-screen i-alt"></i></a>
				</div>
				<h3>Responsive Layout<span class="subtitle">Adapts well on Devices</span></h3>
			</div>
			<div class="section center nomargin" style="padding: 30px;">
				<a href="#" class="button" onClick="$.magnificPopup.close();return false;">Don't Show me Again</a>
			</div>
		</div>
	</div>

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
				
	<script >
		function MostrarEncuesta(id)
		{
			var id = id || 0;

			$( "#encuesta" ).load( "<?=base_url();?>C_encuestas/mostrar_encuesta?tema="+id);
			$('html, body').animate({
		        scrollTop: $("#encuesta").offset().top
		    }, 1000);

			/*$.post("<?=base_url();?>Sitio/listado_dependiente",{nombrelst:nombrelst,valor:valor},function(resultado,status){
				
			});*/
		}
		
	</script>
	<!-- Footer Scripts
	============================================= -->

</body>
</html>