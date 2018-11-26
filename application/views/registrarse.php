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
					
					<div class="col_full nobottommargin">

						<h3>Registrate ahora.</h3>

						<p>Para poder acceder a todas las funcionalidades de la página es necesario crear una cuenta. Lo cual podrás hacer a continuación.<br><i>Todos los campos marcados con (<i class="icon icon-asterisk text-danger"></i>) son obligatorios</i></p>

						<form id="register-form" name="register-form" class="nobottommargin" action="#" method="post">

							<div class="col_one_third">
								<label for="register-form-name">Nombre:<i class="icon icon-asterisk text-danger"></i></label>
								<input type="text" id="nombre" name="nombre" value="" class="form-control" maxlength="100" autofocus autocomplete="off"/>
							</div>

							<div class="col_one_third">
								<label for="register-form-name">Primer apellido:</label>
								<input type="text" id="apellido_paterno" name="apellido_paterno" value="" class="form-control" maxlength="100" />
							</div>

							<div class="col_one_third col_last">
								<label for="register-form-name">Segundo apellido:</label>
								<input type="text" id="apellido_materno" name="apellido_materno" value="" class="form-control" maxlength="100" />
							</div>

							<div class="clear"></div>

							<div class="col_one_third">
								<label for="register-form-name">Correo:<i class="icon icon-asterisk text-danger"></i></label>
								<input type="text" id="correo" name="correo" value="" class="form-control" maxlength="100" autocomplete="off" />
							</div>

							<div class="col_one_third">
								<label for="register-form-password">Contraseña:<i class="icon icon-asterisk text-danger"></i></label>
								<input type="password" id="contrasenia" name="contrasenia" value="" class="form-control" />
							</div>

							<div class="col_one_third col_last">
								<label for="register-form-repassword">Confirme su contraseña:</label>
								<input type="password" id="contrasenia2" name="contrasenia2" value="" class="form-control" />
							</div>

							<div class="clear"></div>
							<!--
							<div class="col_one_third">
								<label for="register-form-name">Fecha de nacimiento:</label>
								
								<div class="row">
									<div class="col-lg-4"><input type="text" id="fecha_nacimiento" name="fecha_nacimiento" value="" class="form-control" placeholder="dd" /></div>
									<div class="col-lg-4"><input type="text" id="fecha_nacimiento" name="fecha_nacimiento" value="" class="form-control" placeholder="mm" /></div>
									<div class="col-lg-4"><input type="text" id="fecha_nacimiento" name="fecha_nacimiento" value="" class="form-control" placeholder="aaaa"/></div>
								</div>
							</div>
						-->

							<div class="col_one_third">
								<label for="register-form-name">Fecha de nacimiento:<i class="icon icon-asterisk text-danger"></i></label>
								
								<div class="row">
									<div class="col-lg-4">
										<select name="dia" id="dia" class="form-control">
											<?php echo $op_dias; ?>
										</select>
									</div>
									<div class="col-lg-4">
										<select name="mes" id="mes" class="form-control">
											<?php echo $op_meses; ?>
										</select>
									</div>
									<div class="col-lg-4">
										<select name="anio" id="anio" class="form-control">
											<?php echo $op_anios; ?>
										</select>
									</div>
								</div>
							</div>
							
							<div class="col_one_third">
								<label for="register-form-name">Género:<i class="icon icon-asterisk text-danger"></i></label>
								<select name="genero" id="genero" class="form-control">
									<option value="0">Seleccione un género</option>
									<option value="1">Hombre</option>
									<option value="2">Mujer</option>
									<option value="3">Otro</option>
								</select>
							</div>

							<div class="col_one_third col_last">
								<label for="register-form-name">Código postal:<i class="icon icon-asterisk text-danger"></i></label>
								<input type="text" id="codigo_postal" name="codigo_postal" value="" class="form-control" onkeypress="return SoloDigitos(event);" maxlength="5" onblur="CompletarCampos();" data-toggle="tooltip" data-placement="top" title="Indique su código postal" />								
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="sincp" onchange="Determinar_CP(this);">
									<label class="form-check-label" for="exampleCheck1">No conozco mi código postal</label>
								</div>
							</div>
									

							<div class="clear"></div>

							<div id="divop1">
								<div class="col_one_third">
									<label for="register-form-name">Colonia:<i class="icon icon-asterisk text-danger"></i></label>
									<select name="selasentamiento1" id="selasentamiento1" class="form-control" onchange="MostrarInfoFaltante();">
										<?php echo $op_asentamientos;?>
									</select>
									<input type="hidden" name="id_asentamiento" id="id_asentamiento" value="0">
								</div>

								<div class="col_one_third">
									<label for="register-form-name">Localidad:</label>
									<input type="text" id="localidad" name="localidad" value="" class="form-control" readonly="readonly"/>
								</div>

								<div class="col_one_third col_last">
									<label for="register-form-name">Municipio:</label>
									<input type="text" id="municipio" name="municipio" value="" class="form-control" readonly="readonly" />
								</div>
							</div>

							<div id="divop2" style="display: none;">
								<div class="col_one_third">
									<label for="register-form-name">Municipio:</label>
									<select name="selmunicipio" id="selmunicipio" class="form-control chosen-select" onchange="CargarListado('localidades', 'selmunicipio', 'sellocalidad');">
										<?php echo $op_municipios; ?>
									</select>
								</div>

								<div class="col_one_third">
									<label for="register-form-name">Localidad:</label>
									<select name="sellocalidad" id="sellocalidad" class="form-control chosen-select" onchange="CargarListado('asentamientos', 'sellocalidad', 'selasentamiento');">
										<?php echo $op_localidades;?>
									</select>
								</div>

								<div class="col_one_third col_last">
									<label for="register-form-name">Colonia:<i class="icon icon-asterisk text-danger"></i></label>
									<select name="selasentamiento" id="selasentamiento" class="form-control chosen-select" onchange="MostrarCP(this);">
										<?php echo $op_asentamientos;?>
									</select>
									<input type="hidden" name="id_asentamiento2" id="id_asentamiento2" value="0">
								</div>

								
							</div>

							<div class="clear"></div>

							

							<div class="col_one_third">
								<label for="register-form-name">Nivel de estudio:<i class="icon icon-asterisk text-danger"></i></label>
								<select name="id_grado_estudio" id="id_grado_estudio" class="form-control">
									<?php echo $op_grados_estudio; ?>
								</select>
							</div>

							<div class="col_two_third col_last">
								<label for="register-form-name">Ocupación:<i class="icon icon-asterisk text-danger"></i></label>
								<select name="id_ocupacion" id="id_ocupacion" class="form-control chosen-select validate[required]" data-prompt-position="inline" data-prompt-target="id_ocupacion">
									<?php echo $op_ocupaciones; ?>
								</select>
							</div>

							<div class="clear"></div>

							<div class="col_one_third">
								<div id="div_captcha"></div>
							</div>

							<div class="col_one_third" style="margin-top: 28px;">
								<button class="button button-3d button-black nomargin" id="register-form-submit" name="register-form-submit" value="register">Registrarse</button>
							</div>

							<!--<div class="col_one_third">
								<label for="codigo">Código de seguridad</label>
								<input type="text" class="form-control" id="captcha" name="captcha" maxlength="5" tabindex="3" autocomplete="off" required>
							</div>

							<div class="col_one_third" style="margin-top: 28px;">
								<img id="imgCaptcha" src="<?=base_url();?>C_seguridad/captcha" class="img-responsive">
								<p class="text-left"><a href="#" onclick="refrescar_capcha(event);" style="cursor:pointer; color:#000000;font-weight:bold;"><img src="<?=base_url();?>img/refrescar.png" width="10px" alt="Refrescar captcha" title="Refrescar captcha"/>&nbsp;Nuevo código</a></p>
							</div>

							<div class="col_one_third col_last">
							</div> 

							<div class="clear"></div>

							<div class="col_full nobottommargin">
								<button class="button button-3d button-black nomargin" id="register-form-submit" name="register-form-submit" value="register">Registrarse</button>
							</div> -->

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
	<script src="<?=base_url();?>public/js/funciones.js?v=1.2"></script>

	<!-- Chosen
	============================================= -->
	<script src="<?=base_url();?>public/chosen/chosen.jquery.min.js"></script>
	<script src="<?=base_url();?>public/chosen/chosen.proto.min.js"></script>
	<!--Modal Loading -->
	<script src="<?=base_url();?>admin/plugins/modal-loading/js/modal-loading.js"></script>
	<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"async defer></script>
	<!--Modal Loading -->
	<!-- External JavaScripts
				============================================= -->
				
	<script >
		var div_captcha;
		var onloadCallback = function() {
        div_captcha = grecaptcha.render('div_captcha', {
	          'sitekey' : '6LcFNH0UAAAAAELpmyqx2cXRiQQDG-Ip-Bk2ukFC'
	        });
	    };
	    
		$(document).ready(function(){
			$(".chosen-select").chosen({width: "100%"});
			$('[data-toggle="tooltip"]').tooltip();


			$( "#register-form" ).validate({
				ignore: [],
				highlight: function (element) {
					if( $("#"+element.id).hasClass('chosen-select')){
						$("#"+element.id+"_chosen").addClass("error_chosen");
					}else $(element).closest('.form-control').addClass('error');
					//console.log($("#id_asentamiento").val());
					//console.log($("#id_asentamiento2").val());
				},
				unhighlight: function (element) {
					//console.log(element);
					if( $("#"+element.id).hasClass('chosen-select')){
						$("#"+element.id+"_chosen").removeClass("error_chosen");
					}else $(element).closest('.form-control').removeClass('error');
				},
				errorPlacement: function (error, element) {
					if (element.hasClass("chosen-select")) {
						var id = ("#"+element[0].id)+"_chosen";
				      	error.insertAfter($(id));
				    }else{
				    	error.insertAfter(element);
				    }					
				},
			  	rules: {
			    	nombre: {
			      		required: true
			    	},
			    	contrasenia: {
			      		required: true
			    	},
			    	contrasenia2: {
			      		required: true,
			      		equalTo: "#contrasenia"
			    	},
			    	correo: {
			      		required: true,
			      		email: true
			    	},
			    	dia: {			      		
			      		min: 1
			    	},
			    	mes: {
			      		min: 1
			    	},
			    	anio: {
			      		min: 1
			    	},
			    	genero: {			      		
			      		min: 1
			    	},
			    	codigo_postal: {
			      		required: true,
			      		minlength: 5
			    	},
			    	id_grado_estudio: {
				 		min: 1
				 	},
				 	id_ocupacion:{
				 		min: 1
				 	},
				 	id_asentamiento:{
				 		min: 1	
				 	},
				 	id_asentamiento2:{
				 		min: 1	
				 	},
				 	captcha: {
				 		required:true
				 	}

			  	},
			  	messages: {
			  		nombre: "Por favor rellene este campo",
				    apellido_paterno: "Por favor rellene este campo",
				    contrasenia: "Por favor rellene este campo",
				    contrasenia2:{
				    	required: "Por favor rellene este campo",
				    	equalTo: "Las contraseñas deben coincidir"
				 	},
				 	correo: {
				    	required: "Por favor rellene este campo",
				    	email: "Por favor ingrese un correo en formato ejemplo@dominio.com"
				    },
				    dia:{
				    	min: "Por favor elija un opción",

				    },
				    mes:{
				    	min: "Por favor elija un opción",

				    },
				    anio:{
				    	min: "Por favor elija un opción",

				    },				 	
				 	genero:{
				 		min: "Por favor elija una opción"	
				 	},
				 	codigo_postal:{
				 	 	required:"Por favor rellene este campo",
				 	 	minlength: "Por favor ingrese un código poostal válido"
				 	},
				 	id_grado_estudio: {
				 		min: "Por favor elija una opción"
				 	},
				 	id_ocupacion: {
				 		min: "Por favor elija una opción"
				 	},
				 	id_asentamiento: {
				 		min: "Debe seleccionar una colonia"
				 	},
				 	id_asentamiento2: {
				 		min: "Debe seleccionar una colonia"
				 	},
				 	captcha: {
				 		required: "Por favor escriba el código"
				 	}

				    
			  	},
			  	submitHandler: function(form){
			  		if(ValidarFecha())
			  		{
			  			RegistrarUsuario(form);
			  		}
			  		else 
			  		{
			  			Notificacion('La fecha ingresada no es válida','error');
			  		}
			  	}
			});
		});

		function refrescar_capcha(e)
	    {
	    	var num = Math.floor((Math.random() * 1000) + 1);
	      	$('#imgCaptcha').attr('src','<?=base_url();?>C_seguridad/captcha?n='+num);
	      	e.preventDefault();
	    }

		function Determinar_CP(check)
		{
			if( $(check).is(":checked") )
			{
				$('#divop1').css('display','none');
				$('#divop2').css('display','');
				$('#codigo_postal').prop('readonly', true);
			}else 
			{
				$('#divop1').css('display','');
				$('#divop2').css('display','none');
				$('#codigo_postal').prop('readonly', false);
			}
		}

		function CompletarCampos()
		{
			
			var patron = /chosen-select/g;
			var codigo_postal = Trim($("#codigo_postal").val());
			if (codigo_postal != '' )
			{
				var loading = new Loading({
					discription: 'Espere...',
			    	defaultApply: true
			    });
				$.post("<?=base_url();?>Sitio/listado_dependiente",{nombrelst:'codigo_postal',valor:codigo_postal},function(resultado,status){
					$('#selasentamiento1 option[value!=""]').remove();
					if(codigo_postal > 0 && codigo_postal != '')
					{ // En este caso se utiliza el largo de la cadena debido a que no se recibe numero si no cadenas
						$('#selasentamiento1').append(resultado);
						$('#selasentamiento1').attr("disabled",false);
						MostrarInfoFaltante();
					}
					else $('#selasentamiento1').attr("disabled",true);

					if(patron.test($('#selasentamiento1').attr('class'))) $('#selasentamiento1').chosen({width:"100%"});
					loading.out();
				});	
			}else alert('Por favor, indique un código postal');
			
		}

		function MostrarInfoFaltante()
		{
			var loading = new Loading({
					discription: 'Espere...',
			    	defaultApply: true
			    });

			var id_asentamiento = parseInt($("#selasentamiento1 option:selected").attr('value'));

			$.post("<?=base_url();?>Sitio/listado_dependiente",{nombrelst:'datos_faltantes',valor:id_asentamiento},function(resultado,status){
				var datos = jQuery.parseJSON(resultado);

				$("#municipio").val(datos.municipio);
				$("#localidad").val(datos.localidad);
				$("#id_asentamiento").val(datos.id_asentamiento);
				$("#id_asentamiento2").val(datos.id_asentamiento);				
			});
			loading.out();
		}

		function MostrarCP(t)
		{
			var id_asentamiento = $('option:selected',t).attr('value');
			var codigo_postal = $('option:selected',t).attr('rel');
			if(id_asentamiento != 0)
			{
				$("#id_asentamiento").val(id_asentamiento);
				$("#id_asentamiento2").val(id_asentamiento);
				$("#codigo_postal").val(codigo_postal);				
			}

		}

		function CargarListado(nombrelst, lstpadreid, lsthijoid)
		{
		    var valor = $("#"+lstpadreid).val();
		    var patron = /chosen-select/g;

		    var loading = new Loading({
					discription: 'Espere...',
			    	defaultApply: true
			    });

		    $.post("<?=base_url();?>Sitio/listado_dependiente",{nombrelst:nombrelst,valor:valor},function(resultado,status){
				$('#'+lsthijoid+' option[value!="0"]').remove();
				if(valor > 0 && valor != '')
				{ // En este caso se utiliza el largo de la cadena debido a que no se recibe numero si no cadenas
					$('#'+lsthijoid).append(resultado);
					$('#'+lsthijoid).attr("disabled",false);
				}
				else $('#'+lsthijoid).attr("disabled",true);

				if(patron.test($('#'+lsthijoid).attr('class')))
				{
					$('#'+lsthijoid).trigger("chosen:updated");
						
				} 
			});

			loading.out();
		}

		function RegistrarUsuario(form)
		{
			var loading;
			$.ajax({
		        url: '<?=base_url();?>C_seguridad/registrar_usuario',
		        type: 'POST',
		        async: false,	//	Para obligar al usuario a esperar una respuesta
		        data: $(form).serialize(),
		        error: function(XMLHttpRequest, errMsg, exception){
		            var msg = "Ha fallado la petición al servidor";
		            loading.out();
		            alert(msg);
		        },
		         beforeSend: function(){
		           loading = new Loading({
		                discription: 'Espere...',
		                defaultApply: true
		            });
		        },
		        success: function(htmlcode){
		        	loading.out();
		        	grecaptcha.reset(div_captcha);
		        	var cod = htmlcode.split("-");
		        	switch(cod[0])
		            {
		                case "0":
		                    window.location.href = '<?=base_url();?>C_seguridad/usuario_registrado';
		                    break;		                
		                default:
		                    Notificacion(htmlcode,'error');
		                    break;
		            }
		        }
		    });
		}

		function ValidarFecha()
		{
			var dia = $("#dia option:selected").attr('value');
			var mes = $("#mes option:selected").attr('value');
			var anio = $("#anio option:selected").attr('value');

			var fecha = mes+'/'+dia+'/'+anio;
			

			return IsDate(fecha);
		}
		
		function IsDate(txtDate, separator)
		{
			//	txtDateFormat in m/d/yyyy
		    var aoDate,           // needed for creating array and object
		        ms,               // date in milliseconds
		        month, day, year; // (integer) month, day and year
		    // if separator is not defined then set '/'
		    if (separator === undefined) {
		        separator = '/';
		    }
		    // split input date to month, day and year
		    aoDate = txtDate.split(separator);
		    // array length should be exactly 3 (no more no less)
		    if (aoDate.length !== 3) {
		        return false;
		    }
		    // define month, day and year from array (expected format is m/d/yyyy)
		    // subtraction will cast variables to integer implicitly
		    month = aoDate[0] - 1; // because months in JS start from 0
		    day = aoDate[1] - 0;
		    year = aoDate[2] - 0;
		    // test year range
		    if (year < 1000 || year > 3000) {
		        return false;
		    }
		    // convert input date to milliseconds
		    ms = (new Date(year, month, day)).getTime();
		    // initialize Date() object from milliseconds (reuse aoDate variable)
		    aoDate = new Date();
		    aoDate.setTime(ms);
		    // compare input date and parts from Date() object
		    // if difference exists then input date is not valid
		    if (aoDate.getFullYear() !== year ||
		        aoDate.getMonth() !== month ||
		        aoDate.getDate() !== day) {
		        return false;
		    }
		    // date is OK, return true
		    return true;
		}
	</script>
	<!-- Footer Scripts
	============================================= -->

</body>
</html>