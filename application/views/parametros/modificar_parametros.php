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

	<div class="row">
		<div class="col-12">
	        
            <h4 class="card-title">Modificación de parámetros</h4>
            <form class="form-control" id="form">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">Inicio de captura de propuestas:</label>
                        <input type="text" class="form-control" name="INI_CAP_PRO" id="INI_CAP_PRO" value="<?php echo $INI_CAP_PRO; ?>">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">Fin de captura de propuestas:</label>
                        <input type="text" class="form-control" name="FIN_CAP_PRO" id="FIN_CAP_PRO" value="<?php echo $FIN_CAP_PRO; ?>">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom03">Inicio integración de propuestas:</label>
                        <input type="text" class="form-control" name="INI_INT_PRO" id="INI_INT_PRO" value="<?php echo $INI_INT_PRO; ?>">
                        <div class="invalid-feedback">
                            Please provide a valid city.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom04">Fin integración de propuestas:</label>
                        <input type="text" class="form-control" name="FIN_INT_PRO" id="FIN_INT_PRO" value="<?php echo $FIN_INT_PRO; ?>">
                        <div class="invalid-feedback">
                            Please provide a valid state.
                        </div>
                    </div>
                    
                </div>	                    
                <button class="btn btn-primary" type="submit">Guardar</button>
            </form>

	    </div>
	</div>
</body>
<!--<script src="<?=base_url();?>admin/assets/libs/jquery-validation/dist/jquery.validate.min.js"></script>-->

<script type="text/javascript">
	$('#INI_CAP_PRO, #FIN_CAP_PRO, #IN_INT_PRO, #FIN_INT_PRO').bootstrapMaterialDatePicker({ weekStart: 0, time: false });

	$( "#form" ).validate({
	  	rules: {
	    	INI_CAP_PRO: {
	      		required: true
	    	},
	    	FIN_CAP_PRO: {
	      		required: true
	    	},
	    	INI_INT_PRO: {
	      		required: true
	    	},
	    	FIN_INT_PRO: {
	      		required: true
	    	}
	  	},
	  	messages: {
		    INI_CAP_PRO: "Este campo es requerido",
		    FIN_CAP_PRO: "Este campo es requerido",
		    INI_INT_PRO: "Este campo es requerido",
		    FIN_INT_PRO: "Este campo es requerido"		    
	  	},
	  	submitHandler: function(form){
	  		EnviarForm(form,'<?=base_url();?>C_parametros/guardar_parametros');

	  	}
	});

	function EnviarForm(form,url_destino)
		{
			var loading = new Loading({
					discription: 'Espere...',
			    	defaultApply: true
			    });
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
		        	switch(cod[0])
		            {
		                case "0":
		                	loading.out();
		                    Notificacion('Su contraseña ha sido cambiada','success');
		                    break;                    
		                default:
		                	loading.out();
		                    Notificacion(msg[cod[0]],'error');
		                    break;
		            }
		        }
		    });	
		}
</script>
</html>