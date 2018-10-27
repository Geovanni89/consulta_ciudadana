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
	<link rel="stylesheet" href="<?=base_url();?>public/css/swiper.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/dark.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="<?=base_url();?>public/css/responsive.css" type="text/css" />

	<link rel="stylesheet" href="<?=base_url();?>public/chosen/chosen.min.css?v=3" type="text/css" />

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
		<header id="header" class="full-header">

			<div id="header-wrap">

				<div class="container clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<!-- Logo
					============================================= -->
					<div id="logo">
						<!--
						<a href="index.html" class="standard-logo" data-dark-logo="images/logo-dark.png"><img src="public/images/logo.png" alt="Canvas Logo"></a>
						<a href="index.html" class="retina-logo" data-dark-logo="images/logo-dark@2x.png"><img src="public/images/logo@2x.png" alt="Canvas Logo"></a>
					-->
					</div><!-- #logo end -->

					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu">

						<ul class="one-page-menu" data-easing="easeInOutExpo" data-speed="1500">
							<li current><a href="javascript:" data-href="#home"><div>Inicio</div></a></li>
							<li><a href="<?=base_url();?>sitio/propuestas"><div>Propuestas</div></a></li>
							<li><a href="#" data-href="#section-work"><div>Votaciones</div></a></li>
							<li><a href="<?=base_url();?>Sitio/login""><div>Entrar</div></a></li>
							<li><a href="<?=base_url();?>Sitio/registrarse"><div>Registro</div></a></li>
						</ul>

					</nav><!-- #primary-menu end -->

				</div>

			</div>

		</header><!-- #header end -->

		<div class="clear"></div>

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<?php /*
					<div class="col_one_third nobottommargin">

						<div class="well well-lg nobottommargin">
							<form id="login-form" name="login-form" class="nobottommargin" action="#" method="post">

								<h3>Login to your Account</h3>

								<div class="col_full">
									<label for="login-form-username">Username:</label>
									<input type="text" id="login-form-username" name="login-form-username" value="" class="form-control" />
								</div>

								<div class="col_full">
									<label for="login-form-password">Password:</label>
									<input type="password" id="login-form-password" name="login-form-password" value="" class="form-control" />
								</div>

								<div class="col_full nobottommargin">
									<button class="button button-3d nomargin" id="login-form-submit" name="login-form-submit" value="login">Login</button>
									<a href="#" class="fright">Forgot Password?</a>
								</div>

							</form>
						</div>

					</div> */ ?>

					<div class="col_full nobottommargin">


						<h3>Registrate ahora.</h3>

						<p>Para poder acceder a todas las funcionalidades de la página es necesario crear una cuenta. Lo cual podrás hacer a continuación.</p>

						<form id="register-form" name="register-form" class="nobottommargin" action="#" method="post">

							<div class="col_one_third">
								<label for="register-form-name">Nombre:</label>
								<input type="text" id="nombre" name="nombre" value="" class="form-control" />
							</div>

							<div class="col_one_third">
								<label for="register-form-name">Apellido paterno:</label>
								<input type="text" id="apellido_paterno" name="apellido_paterno" value="" class="form-control" />
							</div>

							<div class="col_one_third col_last">
								<label for="register-form-name">Apellido materno:</label>
								<input type="text" id="apellido_materno" name="apellido_materno" value="" class="form-control" />
							</div>

							<div class="clear"></div>

							<div class="col_half">
								<label for="register-form-password">Contraseña:</label>
								<input type="password" id="register-form-password" name="register-form-password" value="" class="form-control" />
							</div>

							<div class="col_half col_last">
								<label for="register-form-repassword">Re-ingresar contraseña:</label>
								<input type="password" id="register-form-repassword" name="register-form-repassword" value="" class="form-control" />
							</div>

							<div class="clear"></div>

							<div class="col_one_third">
								<label for="register-form-name">Fecha de nacimiento:</label>
								<input type="text" id="fecha_nacimiento" name="fecha_nacimiento" value="" class="form-control" />
							</div>

							<div class="col_one_third">
								<label for="register-form-name">Género:</label>
								<select name="genero" id="genero" class="form-control">
									<option value="0">Seleccione un género</option>
									<option value="1">Hombre</option>
									<option value="2">Mujer</option>
									<option value="3">Otro</option>
								</select>
							</div>

							<div class="col_one_third col_last">
								<label for="register-form-name">Código postal:</label>
								<input type="text" id="codigo_potal" name="codigo_potal" value="" class="form-control" />
							</div>
									

							<div class="clear"></div>

							<div class="col_one_third">
								<label for="register-form-name">Colonia:</label>
								<input type="hidden" name="id_asentamiento" id="id_asentamiento">
								<input type="text" id="asentamiento" name="asentamiento" value="" class="form-control" />
							</div>

							<div class="col_one_third">
								<label for="register-form-name">Localidad:</label>
								<input type="text" id="localidad" name="localidad" value="" class="form-control" />
							</div>

							<div class="col_one_third col_last">
								<label for="register-form-name">Municipio:</label>
								<input type="text" id="municipio" name="municipio" value="" class="form-control" />
							</div>

							<div class="clear"></div>

							<div class="col_one_third">
								<label for="register-form-name">Nivel de estudio:</label>
								<select name="id_grado_estudio" id="id_grado_estudio" class="form-control">
									<?php echo $op_grados_estudio; ?>
								</select>
							</div>

							<div class="col_two_third col_last">
								<label for="register-form-name">Ocupación:</label>
								<select name="id_ocupacion" id="id_ocupacion" class="form-control chosen-select">
									<?php echo $op_ocupaciones; ?>
								</select>
							</div>



							<div class="clear"></div>

							<div class="col_full nobottommargin">
								<button class="button button-3d button-black nomargin" id="register-form-submit" name="register-form-submit" value="register">Register Now</button>
							</div>

						</form>

					</div>

				</div>

			</div>
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
	<script src="<?=base_url();?>public/js/funciones.js"></script>

	<!-- Chosen
	============================================= -->
	<script src="<?=base_url();?>public/chosen/chosen.jquery.min.js"></script>
	<script src="<?=base_url();?>public/chosen/chosen.proto.min.js"></script>
	<!-- External JavaScripts
				============================================= -->
				
	<script >
		$(document).ready(function(){
			$(".chosen-select").chosen({width: "100%"});
		});

		function Iniciar_sesion(form,event)
		{
			event.preventDefault();

			if( Enviar_formulario(form,event) )
			{
				
				window.location.href = '<?=base_url();?>Sitio';
			}
		}
	</script>

	<!-- Footer Scripts
	============================================= -->

</body>
</html>