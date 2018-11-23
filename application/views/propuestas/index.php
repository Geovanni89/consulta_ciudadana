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
					<h4 class="card-title">Buscar propuestas</h4>
					<form action="#" id="formbusqueda" name="formbusqueda" method="POST">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                    	<label>Sector</label>
                                        <select name="fSector" id="fSector" class="form-control" onchange="CargarListado('temas', 'fSector', 'fTema');">
                                        	<?=$op_sectores; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                    	<label>Tema</label>
                                        <select name="fTema" id="fTema" class="form-control">
                                        	<?=$op_temas; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                    	<label>Estatus</label>
                                        <select name="fEstatus" id="fEstatus" class="form-control">
                                        	<?=$op_estatus_propuestas; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                    	<label>Rol</label>
                                        <select name="fRol" id="fRol" class="form-control">
                                        	<?=$op_roles; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                            	<div class="col-md-10">
                            		<label>Título de la propuesta</label>
                            		<div class="input-group mb-12">
                                        <input type="text" class="form-control" name="fTitulo" id="fTitulo" placeholder="" aria-label="" aria-describedby="basic-addon1">
                                        <div class="input-group-append">
                                            <button class="btn btn-info" type="submit" onclick="Buscar(0,event);"><i class="ti-search"></i>&nbsp;Buscar</button>
                                        </div>
                                    </div>
                            	</div>
                            	<div class="col-md-2">
                                    <?php 
                                    if($periodo_activo)
                                    {
                        			     echo '<button class="btn btn-success" type="button" onclick="CapturarPropuesta(0);" style="margin-top:28px;">Crear propuesta</button>';
                                    } 
                                    ?>
                            	</div>
                            </div>
                           
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12" id="contenidomodulo">
			<?php echo $resultado_busqueda; ?>
		</div>
	</div>
</body>
<script type="text/javascript">
	function Buscar(pag,e)
	{
        if (!e) { var e = window.event; }
        e.preventDefault();
		var pag = pag || 1;

		var variables = $("#formbusqueda").serialize();
		variables = variables + '&pag=' + pag;

		Cargar('<?=base_url();?>C_propuestas_admin/buscar_propuestas','#contenidomodulo','POST',variables);
	}

    function GuardarId(id)
    {
        var check = 0;
        if($("#chk"+id).is(':checked')) check = 1;
        
        $.post("<?=base_url();?>C_propuestas_admin/guardar_id",{id:id,check:check},function(resultado,status){
            
        });
    }

	function CapturarPropuesta(id)
	{
		var vars = 'id=' + id		
		Cargar('<?=base_url();?>C_propuestas_admin/capturar_propuesta','#contenidomodulo','POST',vars);
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

    function CargarListado(nombrelst, lstpadreid, lsthijoid)
    {
        var valor = $("#"+lstpadreid).val();
        var patron = /chosen-select/g;

        var loading = new Loading({
                discription: 'Espere...',
                defaultApply: true
            });

        $.post("<?=base_url();?>C_propuestas_admin/listado_dependiente",{nombrelst:nombrelst,valor:valor},function(resultado,status){
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
</script>
</html>