<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" type="image/png" href="<?=base_url();?>img/favicon.png"/>
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

						<div class="clear"></div>

					</div>

					<div class="section dark parallax nobottommargin" style="padding: 80px 0;background-image: url('<?=base_url();?>public/images/indicadores_participacion.jpg'); background-size: 100% 100%;" data-bottom-top="background-position:0px 100px;" data-top-bottom="background-position:0px -300px;">

						<div class="container clearfix">

							<div class="col_one_fourth nobottommargin center" data-animate="bounceIn">
								<img src="<?=base_url();?>public/images/i_participantes.png">
								<div class="counter counter-lined"><span data-from="100" data-to="<?php echo $numeralia['tot_part']; ?>" data-refresh-interval="50" data-speed="2000"></span></div>
								<h5>Participantes</h5>
							</div>

							<div class="col_one_fourth nobottommargin center" data-animate="bounceIn" data-delay="200">
								<img src="<?=base_url();?>public/images/i_propuestas.png">
								<div class="counter counter-lined"><span data-from="3000" data-to="<?php echo $numeralia['tot_prop']; ?>" data-refresh-interval="100" data-speed="2500"></span></div>
								<h5>Propuestas recibidas</h5>
							</div>

							<div class="col_one_fourth nobottommargin center" data-animate="bounceIn" data-delay="400">
								<img src="<?=base_url();?>public/images/i_propuestas_aceptadas.png">
								<div class="counter counter-lined"><span data-from="10" data-to="<?php echo $numeralia['tot_acep']; ?>" data-refresh-interval="25" data-speed="3500"></span></div>
								<h5>Propuestas aceptadas</h5>
							</div>

							<div class="col_one_fourth nobottommargin center col_last" data-animate="bounceIn" data-delay="600">
								<img src="<?=base_url();?>public/images/i_votaciones.png">
								<div class="counter counter-lined"><span data-from="60" data-to="<?php echo $numeralia['tot_vot']; ?>" data-refresh-interval="30" data-speed="2700"></span></div>
								<h5>Votaciones</h5>
							</div>

						</div>

					</div>

				</section>

				<section id="matriz_ejes">
					<?php 
						$alto = 150;
						$alto2 = 325;
						$rutaimagen = base_url().'/img/ejes/';
					?>

					<div class="content-wrap">

						
						<div class="container clearfix">					

							<div class="">
								<div class="feature-box fbox-center fbox-light fbox-plain">
									<h3 style="font-size: 24px;color: #1a4a60; font-weight: 1200;"><strong>MATRIZ DE EJES<br>PED 2018-2024</strong></h3>
								</div>
							</div>

							<div class="row">
								<!-- Economía --->
								<div class="col-lg-3">
									<h2 class="text-center" style="color: #4d4d4d;"><b>ECONOMÍA</b></h2>

									<div class="row grid-container" data-layout="masonry" style="overflow: visible">

										<div class="col-lg-6 mb-4">
											<div class="text-center">
												<div class="flip-card-front" style="background-image: url('<?=$rutaimagen;?>competividad.jpg?v=1.3')" data-height-xl="<?=$alto?>">
													<div class="flip-card-inner">
														<div class="card nobg noborder text-center">
															<div class="card-body">
																<img src="<?=base_url();?>img/matriz/i_competitividad.png" class="h1">
																<p style="font-size: 12px">Competividad</p>
															</div>
														</div>
													</div>
												</div>										
											</div>
										</div>
								

										<div class="col-lg-6 mb-4">
											<div class="text-center">
												<div class="flip-card-front dark" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen;?>comercialyturistica.jpg');">
													<div class="flip-card-inner">													
														<div class="card nobg noborder text-center">
															<div class="card-body">
																<img src="<?=base_url();?>img/matriz/i_comercial_turistica.png">
																<p style="font-size: 14px">Comercial y turística</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-6 mb-4">
											<div class="text-center">
												<div class="flip-card-front bg-info dark" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen;?>industrial.jpg');">
													<div class="flip-card-inner">
														<div class="card nobg noborder text-center">
															<div class="card-body">
																<img src="<?=base_url();?>img/matriz/i_industrial.png">
																<p style="font-size: 14px;">Industrial</p>
															</div>
														</div>
													</div>
												</div>										
											</div>
										</div>

										<div class="col-lg-6 mb-4">
											<div class="text-center">
												<div class="flip-card-front dark" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen;?>capitalhumano.jpg');">
													<div class="flip-card-inner">
														<div class="card nobg noborder text-center">
															<div class="card-body">
																<img src="<?=base_url();?>img/matriz/i_Capital-humano.png">
																<p style="font-size: 14px;">Capital humano</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-6 mb-4">
											<div class="text-center">
												<div class="flip-card-front bg-info dark" data-height-xl="<?=$alto2?>" style="background-image: url('<?=$rutaimagen;?>seguridadpatrimonial.jpg?v=1');">
													<div class="flip-card-inner">
														<div class="card nobg noborder text-center">
															<div class="card-body">												
																<img src="<?=base_url();?>img/matriz/i_Seguridad-patrimonial.png">
																<p style="font-size: 14px;">Seguridad patrimonial</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-6 mb-4">
											<div class="text-center">
												<div class="flip-card-front dark" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen;?>cienciaytecnologia.jpg');">
													<div class="flip-card-inner">												
														<div class="card nobg noborder text-center">
															<div class="card-body">
																<img src="<?=base_url();?>img/matriz/i_Ciencia-y-tecnología.png">
																<p style="font-size: 14px;">Ciencia y tecnología</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-6 mb-4">
											<div class="text-center">
												<div class="flip-card-front dark" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen;?>empleoyfomentoalemprendedurismo.jpg');">
													<div class="flip-card-inner">
														<div class="flip-card-inner">
															<div class="card nobg noborder text-center">
																<div class="card-body">
																	<img src="<?=base_url();?>img/matriz/i_Empleo-y-fomento-al-emprendedurismo.png">
																	<p style="font-size: 9px;">Empleo y <br>fomento al emprendedurismo</p>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									
								</div>
								<!-- Economía --->

								<!-- Sociales --->
								<div class="col-lg-3">
									<h2 class="text-center" style="color: #4d4d4d;"><b>SOCIALES</b></h2>
									<div class="row grid-container" data-layout="masonry" style="overflow: visible">
										<div class="col-lg-6 mb-4">
											<div class="text-center">
												<div class="flip-card-front dark" style="background-image: url('<?=$rutaimagen;?>alimentaria.jpg')" data-height-xl="<?=$alto?>">
													<div class="flip-card-inner">
														<div class="card nobg noborder text-center">
															<div class="card-body">
																<img src="<?=base_url();?>img/matriz/i_Alimentaria.png">
																<p style="font-size: 14px;">Aimentaria</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
								

										<div class="col-lg-6 mb-4">
											<div class="text-center">
												<div class="flip-card-front dark" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen;?>vivienda.jpg');">
													<div class="flip-card-inner">
														<div class="card nobg noborder text-center">
															<div class="card-body">
																<img src="<?=base_url();?>img/matriz/i_Vivienda.png">
																<p class="card-title">Vivienda</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-6 mb-4">
											<div class="text-center">
												<div class="flip-card-front bg-info dark" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen;?>salud.jpg');">
													<div class="flip-card-inner">
														<div class="card nobg noborder text-center">
															<div class="card-body">
																<img src="<?=base_url();?>img/matriz/i_Salud.png">
																<p class="card-title">Salud</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-6 mb-4">
											<div class="text-center">
												<div class="flip-card-front dark" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen;?>desarrolloruralypesquero.jpg');">
													<div class="flip-card-inner">
														<div class="card nobg noborder">
															<div class="card-body">
																<img src="<?=base_url();?>img/matriz/i_Desarrollo-rural-y-pesquero.png">
																<p class="card-title mb-0">Desarrollo rural y pesquero</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-6 mb-4">
											<div class="text-center">
												<div class="flip-card-front bg-info dark" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen;?>seguridadsocial.jpg');">
													<div class="flip-card-inner">
														<div class="card nobg noborder text-center">
															<div class="card-body">
																<img src="<?=base_url();?>img/matriz/i_Seguridad-social.png">
																<p>Seguridad social</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-6 mb-4">
											<div class="text-center">
												<div class="flip-card-front dark" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen;?>inclusionsocial.jpg');">
													<div class="flip-card-inner">
														<div class="card nobg noborder">
															<div class="card-body">
																<img src="<?=base_url();?>img/matriz/i_Inclusión-social.png">
																<p>Inclusión social</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-6 mb-4">
											<div class="text-center">
												<div class="flip-card-front dark" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen;?>seguridadyestadodederecho.jpg');">
													<div class="flip-card-inner">
														<div class="card nobg noborder">
															<div class="card-body">
																<img src="<?=base_url();?>img/matriz/i_Seguridad-y-Estado-de-derecho.png">
																<p style="font-size: 12px;">Seguridad y estado de derecho</p>														
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-6 mb-4">
											<div class="text-center">
												<div class="flip-card-front" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen;?>pueblosindigenas.jpg');">
													<div class="flip-card-inner">
														<div class="card nobg noborder">
															<div class="card-body">
																<img src="<?=base_url();?>img/matriz/i_Pueblos-indígenas.png">
																<p>Pueblos indígenas</p>														
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- Sociales --->

								<!-- Culturales --->
								<div class="col-lg-3">
									<h2 class="text-center" style="color: #4d4d4d;"><b>CULTURALES</b></h2>

									<div class="row grid-container" data-layout="masonry" style="overflow: visible">
										<div class="col-lg-6 mb-4">
											<div class="text-center">
												<div class="flip-card-front dark" style="background-image: url('<?=$rutaimagen;?>educacionuniversal.jpg')" data-height-xl="<?=$alto?>">
													<div class="flip-card-inner">
														<div class="card nobg noborder text-center">
															<div class="card-body">
																<img src="<?=base_url();?>img/matriz/i_Educación_u.png">
																<p class="card-title">Educación universal</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
								

										<div class="col-lg-6 mb-4">
											<div class="text-center">
												<div class="flip-card-front dark" data-height-xl="<?=$alto2?>" style="background-image: url('<?=$rutaimagen;?>deportedealtorendimiento.jpg');">
													<div class="flip-card-inner">
														<div class="card nobg noborder text-center">
															<div class="card-body">
																<img src="<?=base_url();?>img/matriz/i_Deporte_alto.png">
																<p class="card-title" style="font-size: 14px;">Deporte de alto rendimiento</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-6 mb-4">
											<div class="text-center">
												<div class="flip-card-front dark" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen;?>educaciondecalidad.jpg');">
													<div class="flip-card-inner">
														<div class="card nobg noborder text-center">
															<div class="card-body">
																<img src="<?=base_url();?>img/matriz/i_Educación_c.png">
																<p class="card-title">Educación de calidad</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-6 mb-4">
											<div class="text-center">
												<div class="flip-card-front dark" style="background-image: url('<?=$rutaimagen;?>culturatradicional.jpg')" data-height-xl="<?=$alto?>">
													<div class="flip-card-inner">
														<div class="card nobg noborder text-center">
															<div class="card-body">
																<img src="<?=base_url();?>img/matriz/i_cultura-tra.png">
																<p class="card-title">Cultura tradicional</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
								

										<div class="col-lg-6 mb-4">
											<div class="text-center">
												<div class="flip-card-front dark" data-height-xl="<?=$alto2?>" style="background-image: url('<?=$rutaimagen;?>deporteincluyente.jpg');">
													<div class="flip-card-inner">
														<div class="card nobg noborder text-center">
															<div class="card-body">
																<img src="<?=base_url();?>img/matriz/i_deporte_inc.png">
																<p class="card-title" class="card-title">Deporte incluyente</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-6 mb-4">
											<div class="text-center">
												<div class="flip-card-front dark" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen;?>bellasartes.jpg');">
													<div class="flip-card-inner">
														<div class="card nobg noborder text-center">
															<div class="card-body">
																<img src="<?=base_url();?>img/matriz/i_bellas_artes.png">
																<p class="card-title" class="card-title">Bellas artes</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

									</div>
									
								</div>
								<!-- Culturales --->

								<!-- Ambientales --->
								
								<div class="col-lg-3">
									<h2>AMBIENTALES</h2>
									<div class="row grid-container" data-layout="masonry" style="overflow: visible">
										<div class="col-lg-6 mb-4">
											<div class="text-center">
												<div class="flip-card-front dark" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen;?>hidrica.jpg');">
													<div class="flip-card-inner">
														<div class="card nobg noborder text-center">
															<div class="card-body">
																<img src="<?=base_url();?>img/matriz/i_hidirca.png">
																<p>Hídrica</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
								

										<div class="col-lg-6 mb-4">
											<div class="text-center">
												<div class="flip-card-front dark" data-height-xl="<?=$alto2?>" style="background-image: url('<?=$rutaimagen;?>movilidadsustentableyconectividadregional.jpg');">
													<div class="flip-card-inner">
														<div class="card nobg noborder text-center">
															<div class="card-body">
																<img src="<?=base_url();?>img/matriz/i_movilidad.png">
																<p class="card-title" style="font-size: 13px;">Movilidad sustentable y conectividad regional</p>														
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-6 mb-4">
											<div class="text-center">
												<div class="flip-card-front bg-info dark" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen;?>energetica.jpg');">
													<div class="flip-card-inner">
														<div class="card nobg noborder text-center">
															<div class="card-body">
																<img src="<?=base_url();?>img/matriz/i_energetica.png">
																<p class="card-title">Energética</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-6 mb-4">
											<div class="text-center">
												<div class="flip-card-front dark" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen;?>cambioclimaticoysustentabilidad.jpg');">
													<div class="flip-card-inner">
														<div class="card nobg noborder">
															<div class="card-body">
																<img src="<?=base_url();?>img/matriz/i_cambio_cli.png">
																<p class="card-title mb-0" style="font-size: 11px;">Cambio climático y sustentabilidad</p>														
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-6 mb-4">
											<div class="text-center">
												<div class="flip-card-front bg-info dark" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen;?>manejointegralderesiduos.jpg');">
													<div class="flip-card-inner">
														<div class="card nobg noborder text-center">
															<div class="card-body">
																<img src="<?=base_url();?>img/matriz/i_manejo.png">
																<p>Manejo integral de residuos</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-6 mb-4">
											<div class="text-center">
												<div class="flip-card-front dark" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen;?>ordenamientourbanoyterritorial.jpg');">
													<div class="flip-card-inner">
														<div class="card nobg noborder">
															<div class="card-body">
																<img src="<?=base_url();?>img/matriz/i_ordenamiento.png">
																<p style="font-size: 11px;">Ordenamiento urbano y territorial</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-6 mb-4">
											<div class="text-center">
												<div class="flip-card-front dark" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen?>/consevacionderecursosnaturales.jpg');">
													<div class="flip-card-inner">
														<div class="card nobg noborder">
															<div class="card-body">
																<img src="<?=base_url();?>img/matriz/i_conservacion.png">
																<p style="font-size: 12px;">Conservación de recursos naturales</p>														
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>


								</div>

								<!-- Ambientales --->
								<!-- ambientales colores

								</div>
								-->
							</div>

							<div class="fancy-title title-center title-dotted-border topmargin-sm">
							<h3 style="color: #4d4d4d;"><b>EJE TRANSVERSAL</b></h3>
						</div>

						<div class="row grid-container" data-layout="masonry" style="overflow: visible">
							<div class="col-lg-4 mb-4">
								<div class="text-center">
									<div class="flip-card-front dark" style="background-image: url('<?=base_url();?>img/ejes/igualdad.jpg')" data-height-xl="<?=$alto;?>">
										<div class="flip-card-inner">
											<div class="card nobg noborder text-center">
												<div class="card-body">
													<!--<i class="icon-line2-camera h1"></i>-->
													<img src="<?=base_url();?>img/matriz/i_Igualdad-de-género.png">
													<p class="card-text t400">Igualdad de genero</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-lg-4 mb-4">
								<div class="text-center">
									<div class="flip-card-front dark" data-height-xl="<?=$alto;?>" style="background-image: url('<?=$rutaimagen?>/gobiernoaustero.jpg');" data-height-xl="<?=$alto;?>">
										<div class="flip-card-inner">
											<div class="card nobg noborder text-center">
												<div class="card-body">
													<img src="<?=base_url();?>img/matriz/i_gobierno.png">
													<p class="card-text t400">Gobierno austero, abierto, innovador y eficiente</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-lg-4 mb-4">
								<div class="text-center">
									<div class="flip-card-front dark" data-height-xl="<?=$alto;?>" style="background-image: url('<?=$rutaimagen?>/infraestructura.jpg');">
										<div class="flip-card-inner">
											<div class="card nobg noborder text-center">
												<div class="card-body">
													<img src="<?=base_url();?>img/matriz/i_infraestructura.png">
													<p class="card-text t400">Infraestructura y proyectos estratégicos</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
							
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
						<span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</span>
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
						<span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</span>
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

	</script>

</body>
</html>