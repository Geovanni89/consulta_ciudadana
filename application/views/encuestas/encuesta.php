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
	<div class="content-wrap">
		<div class="container clearfix">					
			<div class="col_full nobottommargin">
				<div class="card">
				<div class="card-body">
					<div class="fancy-title title-bottom-border">
						<h3><?php echo $nombre_encuesta; ?></h3>
					</div>
					<form id="formencuesta" method="POST" action="<?=base_url();?>C_encuestas/guardar_respuestas">
						<input type="hidden" name="iIdUsuario" id="iIdUsuario" value="1">
						<input type="hidden" name="iIdEncuesta" id="iIdEncuesta" value="<?=$iIdEncuesta;?>">
				        <?php echo $encuesta; ?>				          
				        <div class="clear"></div>
				        <br>
				        <?php if($contestado == 0) { ?>
			            <div class="row">
			                <div class="col-md-12">
			                	<?php 
			                	if(isset($_SESSION[PREFIJO.'_idusuario'])) echo '<input type="submit" class="btn btn-success" id="guarda_propuesta" value="Guardar"/>';
			                	else  echo '<div class="style-msg errormsg"><div class="sb-msg"><i class="icon-remove"></i><a href="'.base_url().'Sitio/login?r=1">Inicie sesión</a> o <a href="'.base_url().'Sitio/registrarse">Regístrese</a> para crear una propuesta sobre este tema</div></div>';;
			                	?>
			                	<!--<input type="button" class="btn btn-success" id="guarda_propuesta" value="Agregar" onclick="Agregar();" />
			                	<input type="button" class="btn btn-success" id="guarda_propuesta" value="Quitar" onclick="Quitar();" />-->
			                </div>
			            </div>
			        <?php } ?>

				        
				    </form>
				</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		<?php if( ($contestado == 1) || !isset($_SESSION[PREFIJO.'_idusuario']))
		{
			echo "$('#formencuesta input').attr('readonly', 'readonly');";
			echo "$('#formencuesta :input').attr('disabled', true);";
		}
		?>
		$('#formencuesta').validate({
			/*rules: {
				iIdSector:{
					min: 1
				},
				iIdTema:{
					min: 1
				},
				vTitulo: {
					required: true,
					minlength: 10,
					maxlength: 200
				},
				tDescripcion: "required",
				mensajecorreo: "required",
				vMotivo:"required"

			},
			messages: {
				iIdSector: {
					min: "Debe seleccionar un Sector"
				},
				iIdTema:{
					min: "Debe seleccionar un Tema"
				},
				vTitulo: {
					required: "Ingrese un título para su propuesta",
					minlength: "El título debe contener un mínimo de 10 caracteres",
					maxlength: "El título puede contener un máximo de 200 caracteres"
				},
				tDescripcion: "Debe ingresar una descripción a la propuesta",
				mensajecorreo: "Debe escribir un mensaje para los autores",
				vUrlVideoExterno: "Inserte una URL válida",	
				vMotivo: "Debe escribir el motivo",
				//iIdMunicipio: "Debe seleccionar un municipio"

			},*/
			submitHandler: function(form) {
				EnviaForm();
			}
		});		


	});
	

	function EnviaForm()
	{
		var datos =  $('#formencuesta').serialize();
		var metodo = $('#formencuesta').attr('method');
		var uri = $('#formencuesta').attr('action');
		var loading;
		
		
		$.ajax({
			type: metodo,
			url: uri,
			data: datos,
			async: true,
			beforeSend: function(){
	           
	        },
			success: function(data) {
				switch(data)
	            {
	                case "0":
	                    Notificacion('Gracias por sus respuestas','success');
	                    MostrarE(1);
	                    break;		                
	                default:
	                    Notificacion('Ha ocurrido un error al guardar las respuestas','error');
	                    break;
	            }
				
			},
			fail: function() {
				
				Notificacion('Ha ocurrido un error al guardar las respuestas','error');
			}

		});	
		
	}

	function MostrarE(id)
	{		
		var id = id || 0;

		$( "#encuesta" ).load( "<?=base_url();?>C_encuestas/mostrar_encuesta?tema="+id);
		$('html, body').animate({
	        scrollTop: $("#encuesta").offset().top
	    }, 1000);

		/*$.post("<?=base_url();?>Sitio/listado_dependiente",{nombrelst:nombrelst,valor:valor},function(resultado,status){
			
		});*/
	}

	
</script>
</html>