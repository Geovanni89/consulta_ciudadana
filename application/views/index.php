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
	<link rel="stylesheet" href="<?=base_url();?>public/css/style.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/swiper.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/dark.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="<?=base_url();?>public/css/responsive.css" type="text/css" />
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

		<section id="slider" class="slider-element slider-parallax full-screen with-header swiper_wrapper clearfix">

			<div class="slider-parallax-inner">

				<div class="swiper-container swiper-parent">
					<div class="swiper-wrapper">
						<div class="swiper-slide dark" style="background-image: url('<?=base_url();?>public/images/slider/swiper/chichen.jpg');">
							<div class="container clearfix">
								<div class="slider-caption slider-caption-center">
									<h2 data-animate="fadeInUp">Participación Ciudadana</h2>
									<p class="d-none d-sm-block t600" data-animate="fadeInUp" data-delay="200">¿CÓMO QUIERES VER A YUCATÁN?</p>
								</div>
							</div>
						</div>
					</div>
					<div class="slider-arrow-left"><i class="icon-angle-left"></i></div>
					<div class="slider-arrow-right"><i class="icon-angle-right"></i></div>
					<div class="slide-number"><div class="slide-number-current"></div><span>/</span><div class="slide-number-total"></div></div>
				</div>

			</div>

		</section>

		<!-- Header
		============================================= -->
		<?php include('header.php'); ?>

		<div class="clear"></div>

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<section id="section-about" class="page-section">

					<div class="container clearfix">

						<div class="heading-block center">							
							<h2><span>BIENVENIDOS AL SITIO DE <br> PARTICIPACIÓN CIUDADANA</span></h2>
							<span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy 
							nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, 
							quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut.</span>
						</div>
						<div class="col_one_third"></div>
						<div class="col_one_third"><a href="<?=base_url();?>Sitio/form_propuesta" class="button button-3d button-xlarge button-rounded button-green">¡Crea tu propuesta! <i class="icon-circle-arrow-right"></i></a></div>						
						<div class="clear"></div>

					</div>

					<div class="section dark parallax nobottommargin" style="padding: 80px 0;background-image: url('<?=base_url();?>public/images/indicadores_participacion.jpg'); background-size: 100% 100%;" data-bottom-top="background-position:0px 100px;" data-top-bottom="background-position:0px -300px;">

						<div class="container clearfix">

							<div class="col_one_third nobottommargin center" data-animate="bounceIn">
								<img src="<?=base_url();?>public/images/i_participantes.png">
								<div class="counter counter-lined"><span data-from="100" data-to="<?php echo $numeralia['tot_part']; ?>" data-refresh-interval="50" data-speed="2000"></span></div>
								<h5>Participantes</h5>
							</div>

							<div class="col_one_third nobottommargin center" data-animate="bounceIn" data-delay="200">
								<img src="<?=base_url();?>public/images/i_propuestas.png">
								<div class="counter counter-lined"><span data-from="3000" data-to="<?php echo $numeralia['tot_prop']; ?>" data-refresh-interval="100" data-speed="2500"></span></div>
								<h5>Propuestas recibidas</h5>
							</div>
							
							<!--<div class="col_one_fourth nobottommargin center" data-animate="bounceIn" data-delay="400">
								<img src="<?=base_url();?>public/images/i_propuestas_aceptadas.png">
								<div class="counter counter-lined"><span data-from="10" data-to="<?php echo $numeralia['tot_acep']; ?>" data-refresh-interval="25" data-speed="3500"></span></div>
								<h5>Propuestas aceptadas</h5>
							</div>-->							

							<div class="col_one_third nobottommargin center col_last" data-animate="bounceIn" data-delay="600">
								<img src="<?=base_url();?>public/images/i_votaciones.png">
								<div class="counter counter-lined"><span data-from="60" data-to="<?php echo $numeralia['tot_vot']; ?>" data-refresh-interval="30" data-speed="2700"></span></div>
								<h5>Votos</h5>
							</div>

						</div>

					</div>

				</section>

				<section id="matriz_ejes" onmouseover="carga_imagenes();">
					<?php 
						$alto = 150;
						$alto2 = 325;
						$rutaimagen = base_url().'/img/ejes/';
					?>

					<div class="content-wrap">

						
						<div class="container clearfix">

							<?php include('plantilla_matriz.php'); ?>
							
						</div>				

					</div>

					<div class="row">
						<div class="col-lg-12" id="contenidotema">
							
						</div>
					</div>
					<br>
					<br>
				</section>

				<section id="section-team" class="page-section topmargin-lg">
					<div class="heading-block center">
						<h2><span>Propuestas</span></h2>
						<span>Propuestas más recientes</span>
					</div>

					<div class="container clearfix">
						
						<div class="row justify-content-md-center">
							<?php echo $prop_index; ?>
						</div>

						<div class="clear"></div>

					</div>				

				</section>

				<section id="section-about" class="page-section">
					
					<div class="heading-block center">
						<h2><span>Votaciones</span></h2>
						<span>3 Propuestas más votadas</span>
					</div>					

					<div class="container clearfix">						
						<div class="row">
							<?php echo $votos; ?>
						</div>					

						<div class="clear"></div>
					</div>
				</section>			

			</div>

		</section><!-- #content end -->

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


	<script>
				
		function carga_imagenes() {			

			for (var i = 0; i < imagenes.length; i++) {
				$("#tema_"+(i+1)).css("background-image", "url('img/ejes/"+imagenes[i]+"')");
			}		
		}
		
	</script>

</body>
</html>