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

					<div class="tabs divcenter nobottommargin clearfix" id="tab-login-register" style="max-width: 500px;">

						<div class="card nobottommargin">
							<div class="card-body" style="padding: 40px;">
								<form id="login-form" name="login-form" class="nobottommargin" method="post" action="" onsubmit="">
									<h3>Ingrese a su cuenta</h3>

									<div class="col_full" id="#divcorreo">
										<label for="login-form-username">Correo electrónico:</label>
										<input type="text" id="correo" name="correo" value="" class="form-control" autocomplete="off" autofocus />
									</div>

									<div class="col_full">
										<label for="login-form-password">Contraseña:</label>
										<input type="password" id="contrasenia" name="contrasenia" value="" class="form-control" autocomplete="off" />
									</div>

									<div class="col_full">
										<div id="div_captcha"></div>
									</div>

									<div class="col_full nobottommargin">
										<button class="button button-3d button-black nomargin" id="login-form-submit" name="login-form-submit" value="login">Iniciar sesión</button>
										<a href="<?=base_url();?>C_seguridad/recuperar_contrasenia" class="fright" style="color:#1ABC9C;"><b>¿Olvidó su contraseña?</b></a><br>
										<a href="<?=base_url();?>Sitio/registrarse" class="fright" style="color:#1ABC9C;"><b>Regístrese</b></a>
									</div>

								</form>
							</div>
						</div>

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
	<script src="<?=base_url();?>public/js/plugins/jquery.validation.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="<?=base_url();?>public/js/functions.js"></script>
	<script src="<?=base_url();?>public/js/funciones.js?v=4"></script>
	<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"async defer></script>
    

	<script>

	</script>
	<!-- External JavaScripts
				============================================= -->
				
	<script >
		var get_r = <?php if(isset($_GET['r']) && !empty($_GET['r'])){echo 1;}else{echo 0;}?>;
		var div_captcha;
		var onloadCallback = function() {
	        div_captcha = grecaptcha.render('div_captcha', {
	          'sitekey' : '6LcFNH0UAAAAAELpmyqx2cXRiQQDG-Ip-Bk2ukFC'
	        });
	    };

		$( "#login-form" ).validate({
		  	rules: {
		    	correo: {
		      		required: true
		    	},
		    	contrasenia: {
		      		required: true
		    	}
		  	},
		  	messages: {
		  		
			    correo: "Este campo es requerido",
			    contrasenia: "Este campo es requerido"
			    /*
			    correo: {
			    	required: "We need your email address to contact you",
			    	email: "Your email address must be in the format of name@domain.com"
			    }*/
		  	},
		  	submitHandler: function(form){
		  		Iniciar_sesion(form,'<?=base_url();?>Sitio/loguearse');

		  	}
		});

		function Iniciar_sesion(form,url_destino)
		{
			$.ajax({
		        url: url_destino,
		        type: 'POST',
		        async: false,	//	Para obligar al usuario a esperar una respuesta
		        data: $(form).serialize(),
		        error: function(XMLHttpRequest, errMsg, exception){
		            var msg = "Ha fallado la petición al servidor";
		            alert(msg);
		        },
		        success: function(htmlcode){
		        	var cod = htmlcode.split("-");
		        	//	Actualizamos el recaptcha
		        	grecaptcha.reset(div_captcha);
		        	switch(cod[0])
		            {
		                case "0":
		                    Notificacion('Autentificado','success');
		                    var url = '<?=base_url();?>';
		                    if(document.referrer && get_r == 1)
		                    {
		                    	url = document.referrer;
		                    	
		                    }
		                    window.location.href = url;
		                    break;
		                case "101":
		                	Notificacion('Los datos son incorrectos','error');
		                	break;
		                default:
		                    Notificacion(cod,'error');
		                    break;
		            }
		        }
		    });	
		}

	</script>

	<!-- Footer Scripts
	============================================= -->

</body>
</html>