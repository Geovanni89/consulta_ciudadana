
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

	$.post(url_sitio+funcion, {iIdPropuesta:idprop}, function(resp){
		$('#contenido_comentarios').html(resp);
	});

}

function modera_coment(op,idcoment) {
	var funcion = 'C_propuestas/act_coment';
	$.post(url_sitio+funcion, {idcoment:idcoment,op:op}, function(resp){
		console.log(resp);
		carga_comentarios();
	});
}