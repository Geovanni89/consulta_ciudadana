<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
</head>

<body>
	<div class="card">
		<div class="card-body">
			<form action="#" id="formcaptura">
		        <div class="form-body">

		            <div class="row">
		                <div class="col-md-4">
		                    <div class="form-group">
		                    	<label>Nombre</label>
		                        <input type="vNombre" name="vNombre" class="form-control" value="<?=$vNombre;?>">
		                    </div>
		                </div>
		                <div class="col-md-4">
		                    <div class="form-group">
		                    	<label>Apellido paterno</label>
		                        <input type="vApellidoPaterno" name="vApellidoPaterno" class="form-control" value="<?=$vApellidoPaterno;?>">
		                    </div>
		                </div>
		                <div class="col-md-4">
		                    <div class="form-group">
		                    	<label>Apellido materno</label>
		                        <input type="vApellidoMaterno" name="vApellidoMaterno" class="form-control" value="<?=$vApellidoMaterno;?>">
		                    </div>
		                </div>
		            </div>

					<div class="row">
		                <div class="col-md-4">
		                    <div class="form-group">
		                    	<label>Correo</label>
		                        <input type="vCorreo" name="vCorreo" class="form-control" value="<?=$vCorreo;?>">
		                    </div>
		                </div>
		                <div class="col-md-4">
		                    <div class="form-group">
		                    	<label>Contraseña</label>
		                        <input type="vContrasenia" name="vContrasenia" class="form-control" value="">
		                    </div>
		                </div>
		                <div class="col-md-4">
		                    <div class="form-group">
		                    	<label>Repita la contraseña</label>
		                        <input type="vContrasenia2" name="vContrasenia2" class="form-control" value="">
		                    </div>
		                </div>
		            </div>

		            <div class="row">
		                <div class="col-md-4">
		                    <div class="form-group">
		                    	<label>Fecha de nacimiento</label>
		                        <div class="row">
		                        	<div class="col-md-4">
		                        		<select name="dia" id="dia" class="form-control">
											<?php echo $op_dias; ?>
										</select>
		                        	</div>
		                        	<div class="col-md-4">
		                        		<select name="mes" id="mes" class="form-control">
											<?php echo $op_meses; ?>
										</select>
		                        	</div>
		                        	<div class="col-md-4">
		                        		<select name="anio" id="anio" class="form-control">
											<?php echo $op_anios; ?>
										</select>
		                        	</div>
		                        </div>
		                    </div>
		                </div>
		                <div class="col-md-4">
		                    <div class="form-group">
		                    	<label>Genero</label>
		                        <select name="genero" id="genero" class="form-control">
									<option value="0">Seleccione un género</option>
									<option value="1">Hombre</option>
									<option value="2">Mujer</option>
									<option value="3">Otro</option>
								</select>
		                    </div>
		                </div>
		                <div class="col-md-4">
		                    <div class="form-group">
		                    	<label>Código postal</label>
		                        
		                    </div>
		                </div>
		            </div>
		            
		            <div class="row">
		                <div class="col-md-12">
		                    <div class="form-group">
		                    	<small>Seleccione el municipio y coloque un punto.</small>
		                    	<select name="iIdMunicipio" id="iIdMunicipio" class="form-control">
		                    		
		                    	</select>
		                    </div>
		                </div>
		            </div>


		        </div>
		    </form>
		</div>
	</div>
</body>
<script type="text/javascript">
	

	$(document).ready(function(){
		

	});

	
</script>
</html>