
function carga_temas(id) {
	var funcion = 'C_propuestas/carga_temas';
	$.post(url_sitio+funcion, {id:id}, function(resp){
		$('#iIdTema').html(resp);
	})
}

function carga_propuestas(id) {
	var funcion = 'C_propuestas/carga_propuestas';
	$.post(url_sitio+funcion, {id:id}, function(resp){
		$('#iIdPropuesta').html(resp);
	})
}

function carga_comentarios() {
	var funcion = 'C_propuestas/carga_comentarios';
	var idsector = $('#iIdSector option:selected').val();
	var idtema = $('#iIdTema option:selected').val();
	var idprop = $('#iIdPropuesta option:selected').val();
	if(idprop!="") {
		$.post(url_sitio+funcion, {iIdPropuesta:idprop}, function(resp){
			$('#contenido_comentarios').html(resp);
		});
	} else toastr.warning('Debe seleccionar una propuesta', 'Advertencia', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 2000 });


}

function modera_coment(op,idcoment) {
	var funcion = 'C_propuestas/act_coment';
	if(op=="0")
	{
		Swal({
          title: 'Eliminar comentario',
          text: '¿Realmente desea eliminar este comentario?',
          type: 'question',
          showCancelButton: true,
          confirmButtonText: 'Confirmar',
          cancelButtonText: 'Cancelar'
        }).then((result) => {           
            if (result.value) {        
                $.post(url_sitio+funcion, {idcoment:idcoment,op:op}, function(resp){
					toastr.success('Comentario eliminado', 'Operación completa', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 2000 });
					carga_comentarios();
				});	
            } else if (result.dismiss === Swal.DismissReason.cancel) {
            
            }
        });
	}
	else
	{
		$.post(url_sitio+funcion, {idcoment:idcoment,op:op}, function(resp){
			toastr.success('comentario aceptado', 'Operación completa', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 2000 });
			carga_comentarios();
		});		
	}
}