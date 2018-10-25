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

						<form id="capturaPropuesta" method="post" action="#">
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="sel_sect">Selecciona el Sector</label>
									<select class="form-control" id="sel_sect">
										<option>1</option>
										<option>2</option>									
									</select>
								</div>
								<div class="form-group col-md-6">
									<label for="id_tema">Selecciona el Tema</label>
									<select class="form-control" id="id_tema" name="id_tema" required>
									<option>1</option>
									<option>2</option>									
								</select>
								</div>
							</div>
							<div class="form-group">
								<label for="titulo">Titulo propuesta</label>
								<input type="text" class="form-control" id="titulo" name="titulo" placeholder="1234 Main St" required>
							</div>
							<div class="form-group">
								<label for="descripcion">Resumen de la propuesta</label>
								<small id="descnHelp" class="form-text text-muted">(Máximo 200 caracteres)</small>
								<textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
							</div>
							<div class="form-group">
								<label for="video_url">Enlace video externo</label>
								<input type="url" class="form-control" id="video_url" name="video_url" placeholder="Url" required>
							</div>
							<div class="form-group">
								<label for="ambito_med">Ámbito de actuación</label>
								<div>
									<input id="ambito_med" class="checkbox-style" name="ambito_med" type="checkbox">
									<label for="ambito_med" class="checkbox-style-3-label checkbox-small">Esta propuesta no tiene una ubicación concreta o no la conozco</label>									
								</div>
							</div>
							<div class="form-group">
								<small id="resumenHelp" class="form-text text-muted">Seleccione el municipio y coloque un punto</small>
								<select class="form-control" id="id_municipio" name="id_municipio">
									<option>1</option>
									<option>2</option>									
								</select>
							</div>
							<div class="form-group">
								<h1>MAPA</h1>
							</div>
							<div class="form-group">
								<label for="sel_integra">Integrar propuestas</label>
								<select multiple class="form-control" id="sel_integra">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
								</select>
							</div>
							<div class="form-group">
								<div>
									<input id="acepta_terminos" class="checkbox-style" name="acepta_terminos" type="checkbox">
									<label for="acepta_terminos" class="checkbox-style-3-label checkbox-small">Acepto la Política de privacidad y las condiciones de uso</label>
								</div>
								<input type="submit" class="btn btn-success">Crear propuesta</button>
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
	<script>


		$("#capturaPropuesta").validate({
			rules: {				
				titulo: {
					required: true,
					minlength: 10,
					maxlength: 200
				},
				descripcion: "required",
				video_url: "required",				
				id_municipio: "required",
				acepta_terminos: "required"
			},
			messages: {
				titulo: {
					required: "Campo requerido",
					minlength: "El título debe contener un mínimo de 10 caracteres",
					maxlength: "El título puede contener un máximo de 200 caracteres"
				},
				descripcion: "Campo requerido",
				video_url: "Campo requerido",				
				id_municipio: "Campo requerido",
				acepta_terminos: "Campo requerido"

			}
		});

		$.validator.setDefaults({
			submitHandler: function() {
				alert("submitted!");
			}
		});
	</script>

</body>
</html>