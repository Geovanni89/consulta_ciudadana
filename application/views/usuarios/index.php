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
			<div class="card">
				<div class="card-body">
					
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<?php echo $resultado_busqueda; ?>
		</div>
	</div>
</body>
<script type="text/javascript">
	function Buscar(pag)
	{
		var pag = pag || 1;

		Cargar('<?=base_url();?>C_seguridad/buscar_usuarios','#contenido','POST','pag='+pag);
	}



	function Eliminar(id)
	{
		Swal({
          title: 'Eliminar usuario',
          text: '¿Realmente desea eliminar este usuario?',
          type: 'question',
          showCancelButton: true,
          confirmButtonText: 'Confirmar',
          cancelButtonText: 'Cancelar'
        }).then((result) => {           
            if (result.value) {           
                $.post("<?=base_url();?>C_seguridad/eliminar_usuario",{id:id},function(resultado,status){
                	if(resultado == "0"){                		
                	 	Notificacion('Usuario eliminado','success');
                	 	Cargar('<?=base_url()?>C_seguridad/index_usuarios','#contenido');
                	}
            		else Notificacion(resultado,'error');					
				});
            } else if (result.dismiss === Swal.DismissReason.cancel) {
            
            }
        });
	}
</script>
</html>