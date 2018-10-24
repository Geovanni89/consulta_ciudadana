function Mensaje(id){
    var msg = "";
    switch(id){


		case '100' :  msg = "Parámetros insuficientes";  break;
		case '101' :  msg = "Datos incorrectos";  break;
		case '101' :  msg = "Código de verificación incorrecto";  break;
		case '200' :  msg = "OK-Respuesta est�ndar para peticiones correctas.";  break;
		case '201' :  msg = "Creado-La petici�n ha sido completada y ha resultado en la creaci�n de un nuevo recurso.";  break;
		case '202' :  msg = "Aceptada";  break;
		case '203' :  msg = "Informaci�n no autorizada";  break;
		case '204' :  msg = "Sin contenido";  break;
		case '205' :  msg = "Recargar contenido";  break;
		case '206' :  msg = "Contenido parcial-La petici�n servir� parcialmente el contenido solicitado. Esta caracter�stica es utilizada por herramientas de descarga como wget para continuar la transferencia de descargas anteriormente interrumpidas, o para dividir una descarga y procesar las partes simult�neamente.";  break;
		case '207' :  msg = "Estado m�ltiple (Multi-Status, WebDAV)-El cuerpo del mensaje que sigue es un mensaje XML y puede contener alg�n n�mero de c�digos de respuesta separados, dependiendo de cu�ntas sub-peticiones sean hechas."; break;
		case '300' :  msg = "Multiples opciones-Indica opciones m�ltiples para el URI que el cliente podr�a seguir. Esto podr�a ser utilizado, por ejemplo, para presentar distintas opciones de formato para video, listar archivos con distintas extensiones o word sense disambiguation.";  break;
		case '301' :  msg = "Movido permanentemente-Esta y todas las peticiones futuras deber�an ser dirigidas a la URI dada.";  break;
		case '302' :  msg = "Movido temporalmente-Este es el c�digo de redirecci�n m�s popular, pero tambi�n un ejemplo de las pr�cticas de la industria contradiciendo el est�ndar. La especificaci�n HTTP/1.0 (RFC 1945) requer�a que el cliente realizara una redirecci�n temporal (la frase descriptiva original fue \"Moved Temporarily\"), pero los navegadores populares lo implementaron como 303 See Other. Por tanto, HTTP/1.1 a�adi� c�digos de estado 303 y 307 para eliminar la ambig�edad entre ambos comportamientos. Sin embargo, la mayor�a de aplicaciones web y librer�as de desarrollo a�n utilizan el c�digo de respuesta 302 como si fuera el 303.";  break;
		case '303' :  msg = "Vea otra (desde HTTP/1.1)-La respuesta a la petici�n puede ser encontrada bajo otra URI utilizando el m�todo GET.";  break;
		case '304' :  msg = "No modificado-Indica que la petici�n a la URL no ha sido modificada desde que fue requerida por �ltima vez. T�picamente, el cliente HTTP provee un encabezado como If-Modified-Since para indicar una fecha y hora contra la cual el servidor pueda comparar. El uso de este encabezado ahorra ancho de banda y reprocesamiento tanto del servidor como del cliente.";  break;
		case '305' :  msg = "Utilice un PROXY-Muchos clientes HTTP (como Mozilla[2] e Internet Explorer) no se apegan al est�ndar al procesar respuestas con este c�digo, principalmente por motivos de seguridad.-Se trata de una redirecci�n que deber�a haber sido hecha con otra URI, sin embargo a�n puede ser procesada con la URI proporcionada. En contraste con el c�digo 303, el m�todo de la petici�n no deber�a ser cambiado cuando el cliente repita la solicitud. Por ejemplo, una solicitud POST tiene que ser repetida utilizando otra petici�n POST.";  break;
		case '302' :  msg = "Cambio de PROXY-Esta respuesta esta descontinuada"; break;
		case '307' :  msg = "Redireccion temporal";  break;
		case '400' :  msg = "Solicitud incorrecta-La solicitud contiene sintaxis err�nea y no deber�a repetirse.";  break;
		case '401' :  msg = "No autorizado-Nombre de usuario o contrase�a incorrecta.";  break;
		case '402' :  msg = "Pago requerido-Olvid� realizar su pago";  break;
		case '403' :  msg = "Prohibido-La solicitud fue legal, pero el servidor se reh�sa a responderla.";  break;
		case '404' :  msg = "No encontrado-Indica que el recurso solicitado ya no est� disponible y no lo estar� de nuevo. Este c�digo deber�a ser utilizado cuando un recurso haya sido quitado intencionalmente; sin embargo, en la pr�ctica, un c�digo 404 No encontrado es expedido en su lugar. ";  break;
		case '405' :  msg = "M�todo no permitido-Una petici�n fue hecha a una URI utilizando un m�todo de solicitud no soportado por dicha URI";  break;
		case '406' :  msg = "No aceptable-"; break;
		case '407' :  msg = "Autenticaci�n Proxy requerida";  break;
		case '408' :  msg = "Tiempo de espera agotado-El cliente fall� al continuar la petici�n (excepto durante la ejecuci�n de videos Adobe Flash cuando solo significa que el usuario cerr� la ventana de video o se movi� a otro. ref)";  break;
		case '409' :  msg = "Conflicto";  break;
		case '410' :  msg = "Ya no disponible-La p�gina ya no esta disponible dentro del servidor";  break;
		case '411' :  msg = "Requiere longitud";  break;
		case '412' :  msg = "Fall� la precondici�n";  break;
		case '413' :  msg = "Solicitud demasiado larga";  break;
		case '414' :  msg = "URI demasiado larga";  break;
		case '415' :  msg = "Tipo de medio no soportado";  break;
		case '416' :  msg = "Rango solicitado no disponible-El cliente ha preguntado por una parte de un archivo, pero el servidor no puede proporcionar esa parte, por ejemplo, si el cliente pregunt� por una parte de un archivo que est� m�s all� de los l�mites del fin del archivo.";  break;
		case '417' :  msg = "Fall� espectativa";  break;

		case '500' :  msg = "Error interno del Servidor";  break;
		case '501' :  msg = "No implementado";  break;
		case '502' :  msg = "Error en el Gateway";  break;
		case '503' :  msg = "Servicio no disponible";  break;
		case '504' :  msg = "Tiempo del Gateway agotado";  break;
		case '505' :  msg = "Versi�n del HTTP no soportada";  break;
		case '506' :  msg = "Variante tambi�n negocia (RFC 2295)"; break;
		case '507' :  msg = "Almacenamiento insuficiente (WebDAV - RFC 4918)"; break;
		case '509' :  msg = "L�mite de ancho de banda excedido-Este c�digo de estatus, mientras que es utilizado por muchos servidores, no es oficial."; break;
		case '510' :  msg = "No extendido (RFC 2774)"; break;
		}
    
    return msg;
}

function Cargar(id,url)
{
	$( id ).load( url );
}

function Confirmar(titulo,tipo,mensaje)
{
	mensaje = mensaje || '';
	var resp = false;
	/*
		tipo = 'warning', 'error', 'success', 'info'
	*/
	Swal({
          title: titulo,
          text: mensaje,
          type: tipo,
          showCancelButton: true,
          confirmButtonText: 'Confirmar',
          cancelButtonText: 'Cancelar'
        }).then((result) => {        	
          if (result.value) {          	
          	resp = true;
          	return resp;
            /*Swal(
              'Deleted!',
              'Your imaginary file has been deleted.',
              'success'
            )*/
          // For more information about handling dismissals please visit
          // https://sweetalert2.github.io/#handling-dismissals
          } else if (result.dismiss === Swal.DismissReason.cancel) {
            /*Swal(
              'Cancelled',
              'Your imaginary file is safe :)',
              'error'
            )*/
            resp =  true;
            return resp;
          }
        });

   
}

function Enviar_formulario(form,event)
{
	event.preventDefault();
	var resp = false;	
	$.ajax({
            url: form.action,
            type: 'POST',
            async: false,	//	Para obligar al usuario a esperar una respuesta
            data: $(form).serialize(),
            error: function(XMLHttpRequest, errMsg, exception){
                var msg = "Ha fallado la petición al servidor";
                //alerta(msg,"error");
                alert(msg);
            },
            success: function(htmlcode){
            	resp = true;
            }
        });

	return resp;
}

 function guardar(form,e)
{
    e.preventDefault();
    if(valida_formulario(form))
    {
        $.ajax({
            url: '<?=base_url();?>index.php/<?=$controller;?>/guardar',
            type: form.method,
            async: true,
            data: $(form).serialize(),
            error: function(XMLHttpRequest, errMsg, exception){
                var msg = "Ha fallado la petición al servidor";
                alerta(msg,"error");              
            },
            success: function(htmlcode){
                var resp = htmlcode.split("-");
                switch(resp[0])
                {
                    case "0":
                        alerta("Los datos han sido guardados","success");
                        buscar();
                        break;                    
                    default:
                        alerta(htmlcode,'error');
                        break;
                }
            }
        });
    }
}