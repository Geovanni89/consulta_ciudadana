<?php echo sha1('neo-alpha'); ?>
<div class="content-wrap">

	<div class="container clearfix">

		<div class="tabs divcenter nobottommargin clearfix" id="tab-login-register" style="max-width: 500px;">

			<ul class="tab-nav tab-nav2 center clearfix">
				<li class="inline-block"><a href="#tab-login">Ingreso</a></li>
				<li class="inline-block"><a href="#tab-register">Registro</a></li>
			</ul>

			<div class="tab-container">

				<div class="tab-content clearfix" id="tab-login">
					<div class="card nobottommargin">
						<div class="card-body" style="padding: 40px;">
							<form id="login-form" name="login-form" class="nobottommargin" method="post" action="<?=base_url();?>Sitio/loguearse" onsubmit="Iniciar_sesion(this,event)">

								<h3>Ingrese a su cuenta</h3>

								<div class="col_full">
									<label for="login-form-username">Correo electrónico:</label>
									<input type="text" id="correo" name="correo" value="" class="form-control" />
								</div>

								<div class="col_full">
									<label for="login-form-password">Contraseña:</label>
									<input type="password" id="contrasenia" name="contrasenia" value="" class="form-control" />
								</div>

								<div class="col_full nobottommargin">
									<button class="button button-3d button-black nomargin" id="login-form-submit" name="login-form-submit" value="login">Iniciar sesión</button>
									<a href="#" class="fright">¿Olvidó su contraseña?</a>
								</div>

							</form>
						</div>
					</div>
				</div>

				<div class="tab-content clearfix" id="tab-register">
					<div class="card nobottommargin">
						<div class="card-body" style="padding: 40px;">
							<h3>Regístrate ahora</h3>

							<form id="register-form" name="register-form" class="nobottommargin" action="#" method="post">

								<div class="col_full">
									<label for="register-form-name">Nombre:</label>
									<input type="text" id="nombre" name="nombre" value="" class="form-control" />
								</div>

								<div class="col_full">
									<label for="register-form-name">Apellido paterno:</label>
									<input type="text" id="apellido_paterno" name="apellido_paterno" value="" class="form-control" />
								</div>

								<div class="col_full">
									<label for="register-form-name">Apellido materno:</label>
									<input type="text" id="apellido_materno" name="apellido_materno" value="" class="form-control" />
								</div>

								<div class="col_full">
									<label for="register-form-name">Correo electrónico:</label>
									<input type="text" id="correo" name="correo" value="" class="form-control" />
								</div>

								<div class="col_full">
									<label for="register-form-email">Fecha de nacimiento:</label>
									<input type="text" id="fecha_nacimiento" name="fecha_nacimiento" value="" class="form-control" />
								</div>

								<div class="col_full">
									<label for="register-form-username">Genero:</label>
									<select name="genero" id="genero" class="form-control">
										<option value="0">Seleccione un género</option>
										<option value="1">Hombre</option>
										<option value="2">Mujer</option>
										<option value="3">Otro</option>
									</select>
								</div>

								<div class="col_full">
									<label for="register-form-phone">Código postal:</label>
									<input type="text" id="codigo_postal" name="codigo_postal" value="" class="form-control" />
								</div>

								<div class="col_full">
									<label for="register-form-phone">Colonia:</label>
									<input type="text" id="asentamiento" name="asentamiento" value="" class="form-control" />
								</div>

								<div class="col_full">
									<label for="register-form-password">Localidad:</label>
									<input type="password" id="id_localidad" name="id_localidad" value="" class="form-control" />
								</div>

								<div class="col_full">
									<label for="register-form-repassword">Municipio:</label>
									<input type="password" id="id_municipio" name="id_municipio" value="" class="form-control" />
								</div>

								<div class="col_full">
									<label for="register-form-repassword">Nivel de estudio:</label>
									<select name="id_grado_estudio" id="id_grado_estudio" class="form-control">
										<?php echo $op_grados_estudio; ?>
									</select>
								</div>

								<div class="col_full">
									<label for="register-form-repassword">Ocupación:</label>
									<select name="id_ocupacion" id="id_ocupacion" class="form-control">
										<?php echo $op_ocupaciones; ?>
									</select>
								</div>

								<div class="col_full nobottommargin">
									<button class="button button-3d button-black nomargin" id="register-form-submit" name="register-form-submit" value="register">Registrarse</button>
								</div>

							</form>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>

	<!-- External JavaScripts
	============================================= -->
	
	<script >
		SEMICOLON.widget.tabs();

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
	

</div>