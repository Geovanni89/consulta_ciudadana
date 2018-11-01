<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_seguridad extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->helper('url');
        $this->load->helper('Funciones');
        $this->load->model('M_seguridad','ms');
    }

    public function guardar_usuario()
    {
    	if(isset($_POST) && !empty($_POST))
    	{
    		//	Datos del usuario
    		$dia = $this->input->post('dia');
    		$mes = $this->input->post('mes');
    		$anio = $this->input->post('anio');
    		$fecha_nacimiento = $anio.'-'.$mes.'-'.$dia;
    		$id = 0;
    		$d_usuario = array(
    			'vNombre' => $this->input->post('nombre'),
    			'vApellidoPaterno' => $this->input->post('apellido_paterno'),
    			'vApellidoMaterno' => $this->input->post('apellido_materno'),
    			'dFechaNacimiento' => $fecha_nacimiento,
    			'iGenero' => $this->input->post('genero'),
    			'iIdGradoEstudio' => $this->input->post('id_grado_estudio'),
    			'iIdOcupacion' => $this->input->post('id_ocupacion'),
    			'vCorreo' => $this->input->post('correo'),
    			'iRegistroCon' => 1,
    			'iIdAsentamiento' => $this->input->post('id_asentamiento'),
    			'iIdRol' => $this->input->post('id_rol')
    		);



    		if(isset($_POST['id']) && !empty($_POST['id']))
    		{
    			//	Modificación

    		}
    		else
    		{

    			if(!$this->ms->verificar_existe_correo_usuario($d_usuario['vCorreo']))
    			{
	    			//	Registro de usuario
	    			$token = generar_token();
	    			$d_usuario['iRegistroCon'] = 1;
	    			$d_usuario['dFechaRegistro'] = date('Y-m-d H:i:s');	    			
	    			$d_usuario['vContrasenia'] = SHA1($this->input->post('contrasenia'));
	    			$d_usuario['iEstatus'] = 1;	//	Pendiente de confirmación
	    			$d_usuario['vToken'] = $token;

	    			//	Sólo cuando el administrador da de alta al usuario
	    			if(isset($_SESSION[PREFIJO.'_id_rol']))
		    		{
		    			if($_SESSION[PREFIJO.'_id_rol'] == 1)
		    			{
		    				$d_usuario['iRegistroCon'] = 1;
		    			}
		    		}
		    		else
		    		{
		    			//	Registro del ciudadano
		    			$d_usuario['iIdRol'] = 2;	// Rol de ciudadano
		    		}

		    		$con = $this->ms->iniciar_transaccion();

		    		$idusuario = $this->ms->inserta_registro('Usuario',$d_usuario,$con);

		    		if($this->ms->terminar_transaccion($con))
		    		{
		    			if($this->enviar_correo_confirmacion($d_usuario['vCorreo'],$d_usuario['vNombre'],$idusuario,$token))
		    			{
		    				echo '0';
		    			}
		    			else
		    			{
		    				echo 'No se ha podido enviar el correo';
		    			}
		    		}
		    		else
		    		{
		    			echo 500;
		    		}
		    	}
		    	else
		    	{
		    		echo "El correo ya ha sido registrado";
		    	}

    		}
    		
    	}
    }


    public function index_usuarios()
    {

    	$datos['resultado_busqueda'] = $this->listado_usuarios('',1);

    	$this->load->view('usuarios/index',$datos);
    }

    public function buscar_usuarios()
    {
    	$pag = $this->input->post('pag');

    	echo $this->listado_usuarios('',$pag);
    }

    public function listado_usuarios($palabra='',$pag=1)
	{
		$qc = $this->ms->buscar_usuarios('',$palabra);
		$listado = '';

		if($qc)
		{
			$paginador = Paginador($qc,$pag,3);

			if($paginador['total_registros'] > 0)
			{ 
				$listado .= '
               <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th width="100px">ID</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Rol</th>                                    
                                    <th width="200px"></th>
                                </tr>
                            </thead>
                            <tbody>';
                            
                            foreach ($paginador['resultado'] as $dc)
                            {	
                                $listado .= '<tr>
                                    <td>'.$dc->iIdUsuario.'</td>
                                    <td>'.$dc->vNombre.' '.$dc->vApellidoPaterno.' '.$dc->vApellidoMaterno.'</td>
                                    <td>'.$dc->vCorreo.'</td>
                                    <td>'.$dc->vRol.'</td>
                                    <td width="300px" align="center">';
                                    $listado .= '<button type="button" class="btn waves-effect waves-light btn-outline-dark"><i class="mdi mdi-lead-pencil"></i>&nbsp;Editar</button>';
                                if($dc->iIdUsuario != $_SESSION[PREFIJO.'_idusuario'])
                            	{
                            		
                            		$listado .= '&nbsp;<button type="button" class="btn waves-effect waves-light btn-outline-dark" onclick="Eliminar(\''.$dc->iIdUsuario.'\');"><i class="mdi mdi-delete"></i>&nbsp;Eliminar</button>';
                            	}
                        		$listado .= '</td>
                                </tr>';                        
                            }
                            
                    $listado .='
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-12">'.$paginador['botones_paginacion'].'</div>
                    </div>';
            } else $listado = '<p align="center">No se han encontrado resultados para mostrar.</p>';
		}else $listado = '<p align="center">Ha ocurrido un error.</p>';


		return $listado;
	}

	function eliminar_usuario()
	{
		if(isset($_POST['id']) && !empty($_POST['id']))
		{
			
			$datos['iEstatus'] = 0;
			$where['iIdUsuario'] = $this->input->post('id');
			$con = $this->ms->iniciar_transaccion();

    		$aux = $this->ms->actualiza_registro('Usuario',$where,$datos,$con);

    		if($this->ms->terminar_transaccion($con))
    		{
    			echo 0;
    		}
    		else
    		{
    			echo 'No fue posible eliminar el usuario';
    		}

		}else echo 'Acceso denegado';
	}

	function enviar_correo_confirmacion($correo_dest,$nombre_dest,$idusuario,$token)
	{
		$this->load->library('Class_mail');
		$mail = new Class_mail();


		$mail->isSMTP();                            // Establecer el correo electrónico para utilizar SMTP
		$mail->Host = 'smtp.gmail.com';             // Especificar el servidor de correo a utilizar 
		$mail->SMTPAuth = true;                     // Habilitar la autenticacion con SMTP
		$mail->Username = 'jorge.alph@gmail.com';          // Correo electronico saliente ejemplo: tucorreo@gmail.com
		$mail->Password = 'N30-4lph@1351'; 		// Tu contraseña de gmail
		$mail->SMTPSecure = 'tls';                  // Habilitar encriptacion, `ssl` es aceptada
		$mail->Port = 587;                          // Puerto TCP  para conectarse 
		$mail->setFrom('jorge.alph@gmail.com', 'Jorge Estrella');//Introduzca la dirección de la que debe aparecer el correo electrónico. Puede utilizar cualquier dirección que el servidor SMTP acepte como válida. El segundo parámetro opcional para esta función es el nombre que se mostrará como el remitente en lugar de la dirección de correo electrónico en sí.
		$mail->addReplyTo('jorge.alph@gmail.com', 'Jorge Estrella');//Introduzca la dirección de la que debe responder. El segundo parámetro opcional para esta función es el nombre que se mostrará para responder
		$mail->addAddress($correo_dest);   // Agregar quien recibe el e-mail enviado
		$template = 'templates/confirmar_correo.html';
		$message = file_get_contents($template);
		$message = str_replace('{{var_nombre_dest}}', $nombre_dest, $message);
		$message = str_replace('{{var_id}}', $idusuario, $message);
		$message = str_replace('{{var_token}}', $token, $message);
		
		$mail->isHTML(true);  // Establecer el formato de correo electrónico en HTML
		
		$mail->Subject = utf8_decode('Confirmación de correo');
		$mail->msgHTML($message);
		if(!$mail->send()) {
			return false;
			//echo '<p style="color:red">No se pudo enviar el mensaje..';
			//echo 'Error de correo: ' . $mail->ErrorInfo."</p>";
		} else {
			return true;
			//echo '<p style="color:green">Tu mensaje ha sido enviado!</p>';
		}

	}

	public function confirmar_correo()
	{
		if( isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['token']) && !empty($_GET['token']) )
		{

			$idusuario = $this->input->get('id');
			$token = $this->input->get('token');

			if($this->ms->consultar_usuario_por_token($idusuario,$token))
			{
				$datos_usuario = array('iEstatus'=>2);
				$where['iIdUsuario'] = $idusuario;
				$con = $this->ms->iniciar_transaccion();

				$this->ms->actualiza_registro('Usuario',$where,$datos_usuario,$con);

				if($this->ms->terminar_transaccion($con)) echo 'Correo confirmado';
				else echo 'Ha ocurrido un error';

			}else echo 'No se encontró el usuario o ha sido bloquedado por un administrador';
		}
		else
		{
			echo 'Accedo denegado';
		}
	}

	public function recuperar_contrasenia()
	{
		$this->load->view('seguridad/recuperar_contrasenia');
	}

	public function validar_envio_recuperacion_contrasenia()
	{
		if(isset($_POST['correo']) && !empty($_POST['correo']))
		{

			$correo = $this->input->post('correo');

			$query = $this->ms->consultar_usuario_por_correo($correo);
			if($query)
			{
				if($query->num_rows() == 1)
				{	
					//	Obtenermos los datos del usuario
					$token = generar_token();				
					$where['iIdUsuario'] = $idusuario = $query->row()->iIdUsuario;
					$nombre = $query->row()->vNombre;
					$datos_usuario['vToken'] = $token;

					//	Guardamos el token para enviar el correo
					$con = $this->ms->iniciar_transaccion();

					$this->ms->actualiza_registro('Usuario',$where,$datos_usuario,$con);

					if($this->ms->terminar_transaccion($con))
					{
						if( $this->enviar_correo_recuperacion_contrasenia($correo,$nombre,$idusuario,$token) ) echo 0;
						else echo 'No se ha podido enviar el correo, intente de nuevo más tarde';
					}


				}else echo 'No se encontró ningún usuario con el correo proporcionado';
			}else echo 500;


		}

	}

	public function enviar_correo_recuperacion_contrasenia($correo_dest,$nombre_dest,$idusuario,$token)
	{		
		$this->load->library('Class_mail');
		$mail = new Class_mail();


		$mail->isSMTP();                            // Establecer el correo electrónico para utilizar SMTP
		$mail->Host = 'smtp.gmail.com';             // Especificar el servidor de correo a utilizar 
		$mail->SMTPAuth = true;                     // Habilitar la autenticacion con SMTP
		$mail->Username = 'jorge.alph@gmail.com';          // Correo electronico saliente ejemplo: tucorreo@gmail.com
		$mail->Password = 'N30-4lph@1351'; 		// Tu contraseña de gmail
		$mail->SMTPSecure = 'tls';                  // Habilitar encriptacion, `ssl` es aceptada
		$mail->Port = 587;                          // Puerto TCP  para conectarse 
		$mail->setFrom('jorge.alph@gmail.com', 'Jorge Estrella');//Introduzca la dirección de la que debe aparecer el correo electrónico. Puede utilizar cualquier dirección que el servidor SMTP acepte como válida. El segundo parámetro opcional para esta función es el nombre que se mostrará como el remitente en lugar de la dirección de correo electrónico en sí.
		$mail->addReplyTo('jorge.alph@gmail.com', 'Jorge Estrella');//Introduzca la dirección de la que debe responder. El segundo parámetro opcional para esta función es el nombre que se mostrará para responder
		$mail->addAddress($correo_dest);   // Agregar quien recibe el e-mail enviado
		$template = 'templates/recuperar_contrasenia.html';
		$message = file_get_contents($template);
		$message = str_replace('{{var_nombre_dest}}', $nombre_dest, $message);
		$message = str_replace('{{var_id}}', $idusuario, $message);
		$message = str_replace('{{var_token}}', $token, $message);
		
		$mail->isHTML(true);  // Establecer el formato de correo electrónico en HTML
		
		$mail->Subject = utf8_decode('Recuperar contraseña');
		$mail->msgHTML($message);
		if(!$mail->send()) {
			return false;
			//echo '<p style="color:red">No se pudo enviar el mensaje..';
			//echo 'Error de correo: ' . $mail->ErrorInfo."</p>";
		} else {
			return true;
			//echo '<p style="color:green">Tu mensaje ha sido enviado!</p>';
		}
	}

	public function cambiar_contrasenia()
	{
		if( isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['token']) && !empty($_GET['token']) )
		{

			$datos['idusuario'] = $this->input->get('id');
			$datos['token'] = $this->input->get('token');

			$this->load->view('seguridad/cambiar_contrasenia',$datos);			
		}
		else
		{
			echo 'Accedo denegado';
		}
	}

	public function actualizar_contrasenia()
	{
		if( isset($_POST['idusuario']) && !empty($_POST['idusuario']) && isset($_POST['token']) && !empty($_POST['token']))
		{
			$datos_usuario = array('vContrasenia' => SHA1($this->input->post('contrasenia')));
			$where['iIdUsuario'] = $this->input->post('idusuario');
			$where['vToken'] = $this->input->post('token');

			$con = $this->ms->iniciar_transaccion();

			$this->ms->actualiza_registro('Usuario',$where,$datos_usuario,$con);

			if($this->ms->terminar_transaccion($con)) echo 0;
			else echo 500;

		}else echo 'Acceso denegado';
	}

	public function verificar_existe_correo()
	{
		if( isset($_POST['correo']) && !empty($_POST['correo']) )
		{
			$correo = $this->input->post('correo');
			if(!$this->ms->verificar_existe_correo_usuario($correo)) echo 0;
			else echo "1";
		}
	}

}
