<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_seguridad extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->helper('url');
        //$this->load->helper('Funciones');
        $this->load->library('Class_options');
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
	    			$token = $this->generar_token();
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

		    			// Enviar correo de confirmación

		    			$this->load->library('Class_mail');
						$mail = new Class_mail();

						$template = 'templates/confirmar_correo.html';
						$mensaje = file_get_contents($template);
						$url = base_url().'C_seguridad/confirmar_correo?id='.$idusuario.'&token='.$token;
						$mensaje = str_replace('{{var_nombre_dest}}', $d_usuario['vNombre'], $mensaje);
						$mensaje = str_replace('{{var_url}}', $url, $mensaje);
						
						$asunto = utf8_decode('Confirmación de correo');

		    			if($mail->enviar_correo_gmail($d_usuario['vCorreo'],$asunto,$mensaje)) echo '0';		    			
		    			else echo 'No se ha podido enviar el correo';
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
    	$op = new Class_options();
    	$datos['resultado_busqueda'] = $this->listado_usuarios('','',1);
    	$datos['op_roles'] = $op->options_roles(0,'Seleccione un rol');
    	$datos['op_estatus'] = $op->options_estatus_usuario(0,'Seleccione un estatus');

    	$this->load->view('usuarios/index',$datos);
    }

    public function buscar_usuarios()
    {
    	$pag = $this->input->post('pag');
    	$where = '';
    	$palabra = trim($this->input->post('fTitulo'));
    	if($this->input->post('fEstatus') > 0) $where['u.iEstatus'] = $this->input->post('fEstatus');
    	if($this->input->post('fRol') > 0) $where['u.iIdRol'] = $this->input->post('fRol');

    	echo $this->listado_usuarios($where,$palabra,$pag);
    }

    public function listado_usuarios($where='',$palabra='',$pag=1)
	{
		$qc = $this->ms->buscar_usuarios($where,$palabra);
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
                                    $listado .= '<button type="button" class="btn waves-effect waves-light btn-outline-dark" onclick="CapturarUsuario('.$dc->iIdUsuario.');"><i class="mdi mdi-lead-pencil"  ></i>&nbsp;Editar</button>';
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

	public function capturar_usuario()
	{
		if(isset($_POST['id']))
		{
			$id = $this->input->post('id');
			$op = new Class_options();

			if($id == 0)
			{
				$datos['iIdUsuario'] = $id;
				$datos['vNombre'] = '';
				$datos['vApellidoPaterno'] = '';
				$datos['vApellidoMaterno'] = '';
				$datos['vCorreo'] = '';

			}
			else
			{

			}

			$datos['op_grados_estudio'] = $op->options_grados_estudio(0,'Seleccione un grado de estudio');
			$datos['op_ocupaciones'] = $op->options_ocupaciones(0,'Seleccione una ocupación');
			$datos['op_municipios'] = $op->options_municipios(0,'Seleccione un municipio');
			$where1['iIdMunicipio'] = 0;
			$datos['op_localidades'] = $op->options_localidades(0,'Seleccione una localidad',$where1);
			$where2['iIdLocalidad'] = 0;
			$datos['op_asentamientos'] = $op->options_asentamientos(0,'Seleccione una colonia',$where2);
			$datos['op_dias'] = $op->options_dias(0,'Día');
			$datos['op_meses'] = $op->options_meses(0,'Mes');
			$datos['op_anios'] = $op->options_anios(0,'Año');

			$this->load->view('usuarios/capturar_usuario',$datos);	
		}
		
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
		$this->load->view('recuperar_contrasenia');
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
					$token = $this->generar_token();				
					$where['iIdUsuario'] = $idusuario = $query->row()->iIdUsuario;
					$nombre = $query->row()->vNombre;
					$datos_usuario['vToken'] = $token;

					//	Guardamos el token para enviar el correo
					$con = $this->ms->iniciar_transaccion();

					$this->ms->actualiza_registro('Usuario',$where,$datos_usuario,$con);

					if($this->ms->terminar_transaccion($con))
					{
						//Enviamos el correo

						$template = 'templates/recuperar_contrasenia.html';
						$url = base_url().'C_seguridad/cambiar_contrasenia?id='.$idusuario.'&token='.$token;
						$mensaje = file_get_contents($template);
						$mensaje = str_replace('{{var_url}}', $url, $mensaje);
						$asunto = utf8_decode('Recuperación de contraseña');

						$this->load->library('Class_mail');
						$mail = new Class_mail();

						if($mail->enviar_correo_gmail($correo,$asunto,$mensaje)) echo '0';
						else echo 'No se ha podido enviar el correo, intente de nuevo más tarde';

						/*if( $this->enviar_correo_recuperacion_contrasenia($correo,$nombre,$idusuario,$token) ) echo 0;
						else echo 'No se ha podido enviar el correo, intente de nuevo más tarde';*/
					}


				}else echo 'No se encontró ningún usuario con el correo proporcionado';
			}else echo 500;


		}

	}
	
	public function cambiar_contrasenia()
	{
		if( isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['token']) && !empty($_GET['token']) )
		{

			$datos['idusuario'] = $this->input->get('id');
			$datos['token'] = $this->input->get('token');

			$this->load->view('cambiar_contrasenia',$datos);			
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

	public function generar_token()
	{
		$var = rand(100000, 999999);
		return md5($var);
	}

}
