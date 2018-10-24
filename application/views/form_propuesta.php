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

	<link rel="stylesheet" href="<?=base_url();?>public/css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>Form Elements | Canvas</title>

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
				<h1>Form Elements</h1>
				<span>Ways to enhance your Forms</span>				
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="postcontent">					

						<h3>Recomendaciones para crear una propuesta</h3>

						<form>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="sel_sect">Selecciona el Sector</label>
									<select class="form-control" id="sel_sect">
										<option>1</option>
										<option>2</option>									
									</select>
								</div>
								<div class="form-group col-md-6">
									<label for="sel_tema">Selecciona el Tema</label>
									<select class="form-control" id="sel_tema">
									<option>1</option>
									<option>2</option>									
								</select>
								</div>
							</div>
							<div class="form-group">
								<label for="inputAddress">Titulo propuesta</label>
								<input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
							</div>
							<div class="form-group">
								<label for="resumen_propuesta">Resumen de la propuesta</label>
								<small id="resumenHelp" class="form-text text-muted">(Máximo 200 caracteres)</small>
								<textarea class="form-control" id="resumen_propuesta" rows="3"></textarea>
							</div>
							<div class="form-group">
								<label for="enlace_video">Enlace video externo</label>
								<small id="enlaceHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
								<input type="text" class="form-control" id="enlace_video" aria-describedby="emailHelp" placeholder="Url">
							</div>
							<div class="form-group">
								<label for="enlace_video">Ámbito de actuación</label>
								<div>
									<input id="checkbox-3" class="checkbox-style" name="checkbox-3" type="checkbox">
									<label for="checkbox-3" class="checkbox-style-3-label checkbox-small">Esta propuesta no tiene una ubicación concreta o no la conozco</label>									
								</div>
							</div>
							<div class="form-group">
								<small id="resumenHelp" class="form-text text-muted">Seleccione el municipio y coloque un punto</small>
								<select class="form-control" id="sel_sect">
									<option>1</option>
									<option>2</option>									
								</select>
							</div>
							<div class="form-group">
								<h1>MAPA</h1>
							</div>
							<div class="form-group">
								<div>
									<input id="checkbox-3" class="checkbox-style" name="checkbox-3" type="checkbox">
									<label for="checkbox-3" class="checkbox-style-3-label checkbox-small">Acepto la Política de privacidad y las condiciones de uso</label>
								</div>
								<button class="btn btn-success">Crear propuesta</button>
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

	<!-- Footer Scripts
	============================================= -->
	<script src="<?=base_url();?>public/js/functions.js"></script>

</body>
</html>