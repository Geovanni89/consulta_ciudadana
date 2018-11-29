<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_propuestas_admin extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->helper('url');
        $this->load->library('Class_options');
        $this->load->model('M_propuestas_admin','mp');
    }


    function index_propuestas()
    { 	
    	/*if(isset($_SESSION[PREFIJO.'_idusuario']) && !empty($_SESSION[PREFIJO.'_idusuario']))
    	{*/
	    	$op = new Class_options();
	    	$datos['op_sectores'] = $op->options_sectores(0,'Seleccione un sector');
	    	$datos['op_temas'] = $op->options_temas(0,'Seleccione un tema');
	    	$datos['op_estatus_propuestas'] = $op->options_estatus_propuestas(10);
	    	$datos['op_roles'] = $op->options_roles(0,'Seleccione un rol');
	    	$datos['periodo_activo'] = $this->validar_periodo_integracion();	//	Válida el periodo de integración de propuestas

	    	$datos['resultado_busqueda'] = $this->listado_propuestas();

	    	$this->load->view('propuestas/index',$datos);
	   	/*
	    }
	    else $this->load->view('seguridad/login.php');*/
    }

    public function buscar_propuestas()
    {
    	$pag = $this->input->post('pag');
    	$where = '';
    	$palabra = trim($this->input->post('fTitulo'));
    	if($this->input->post('fSector') > 0) $where['s.iIdSector'] = $this->input->post('fSector');
    	if($this->input->post('fTema') > 0) $where['p.iIdTema'] = $this->input->post('fTema');
    	if($this->input->post('fEstatus') !=  10) $where['p.iEstatus'] = $this->input->post('fEstatus');
    	if($this->input->post('fRol') > 0) $where['u.iIdRol'] = $this->input->post('fRol');

    	//echo $_SESSION['consultap'];
    	echo $this->listado_propuestas($where,$palabra,$pag);

    }

    public function listado_propuestas($where='', $palabra='', $pag=1)
	{
		$qc = $this->mp->carga_propuestas_admin($where,$palabra);
		$periodo_activo = $this->validar_periodo_integracion();	//	Válida el periodo de integración de propuestas
		$listado = '';

		if($qc)
		{
			$paginador = Paginador($qc,$pag);

			if($paginador['total_registros'] > 0)
			{ 
				if($periodo_activo) $listado .= '<p>Puede integrar propuestas, seleccionado otras que se encuentren en estatus "Pendiente de revisión" y haciendo clic en "Crear propuesta"</p>';

               	$listado .= '<div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th width="50px">ID</th>
                                    <th>Código</th>
                                    <th>Título <i class="mdi mdi-lead-pencil" style="align:right !important;"></i></th>
                                    <th>Estatus</th>
                                    <th>Autor</th>                                    
                                    <th width="200px"></th>
                                </tr>
                            </thead>
                            <tbody>';
                            
                            foreach ($paginador['resultado'] as $dc)
                            {	
                            	if($periodo_activo)
                            	{
                            		$checked = ( isset($_SESSION['checks'][$dc->iIdPropuesta] ) ) ? 'checked':'';
                            		$inputcheck = ($dc->iEstatus == 1) ? '<input type="checkbox" class="" id="chk'.$dc->iIdPropuesta.'" onclick="GuardarId('.$dc->iIdPropuesta.')" '.$checked.'>':'';
                            	}else $inputcheck = '';

                                $listado .= '<tr>
                                    <td>'.$dc->iIdPropuesta.'</td>
                                    <td>'.$inputcheck.$dc->vCodigo.'</td>
                                    <td>'.$dc->vTitulo.'</td>
                                    <td>'.$this->estatus_propuesta($dc->iEstatus).'</td>
                                    <td>'.$dc->vCorreo.'</td>
                                    <td width="200px" align="center">';
                                    $listado .= '<button type="button" class="btn waves-effect waves-light btn-outline-dark" onclick="CapturarPropuesta(\''.$dc->iIdPropuesta.'\');"><i class="mdi mdi-lead-pencil"></i>&nbsp;Editar</button>';
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

	function estatus_propuesta($n)
	{
		$r = '';
		switch ($n) {
			case '0':
				$r = 'No viable';
				break;
			case '1':
				$r = 'Por revisar';
				break;
			case '2':
				$r = 'Integrada';
				break;
			case '3':
				$r = 'Aprobada';
				break;
			
			default:
				# code...
				break;
		}

		return $r;
	}

	public function capturar_propuesta()
	{
		if(isset($_POST['id']))
		{
			$id = $this->input->post('id');
			$op = new Class_options();

			if($id == 0)
			{
				$datos = array(	'iIdPropuesta' => $id,
								'iIdSector' => 0,
								'iIdTema' => 0,
								'vTitulo' => '',
								'tDescripcion' => '',
								'vUrlVideoExterno' => '',
								'iIdMunicipio' => 0,
								'iEstatus' => '',
								'nLatDec' => 0,
								'nLongDec' => 0,
								'initialPreview_img' => '',
								'initialPreviewConfig_img' => '',
								'initialPreview_doc'=> '',
								'initialPreviewConfig_doc' => '',
								'numdocsprev' => 0,
								'numimgsprev' => 0
								 );

				$tabla = '';
				if(isset($_SESSION['checks']) && !empty($_SESSION['checks']))
				{
					$qp = $this->mp->consulta_propuestas_array($_SESSION['checks']);
					if($qp)
					{
						if($qp->num_rows() > 0)
						{
							$qp = $qp->result();
							$tabla .= '<table class="table table-hover table-bordered">
			                            <thead>
			                                <tr>
			                                    <th>Código</th>
			                                    <th>Título</th>
			                                    <th>Autor</th>
			                                    <th width="200px"></th>
			                                </tr>
			                            </thead>
			                            <tbody>';
							foreach ($qp as $d)
							{
								$tabla .= '<tr id="'.$d->iIdPropuesta.'">
											<td>'.$d->vCodigo.'<input type="hidden" name="p'.$d->iIdPropuesta.'" value="'.$d->iIdPropuesta.'"></td>
											<td><a href="'.base_url().'C_propuestas/propuesta_sim?ad=1&id='.$d->iIdPropuesta.'" target="_blank">'.$d->vTitulo.'</a></td>
											<td>'.$d->vCorreo.'</td>
											<td><button type="button" class="btn waves-effect waves-light btn-outline-dark" onclick="Ver(\''.$d->iIdPropuesta.'\');"><i class="fas fa-search"></i></button>&nbsp;<button type="button" class="btn waves-effect waves-light btn-outline-dark" onclick="Elim(\''.$d->iIdPropuesta.'\');"><i class="mdi mdi-delete"></i></button></td>
										</tr>';
							}

							$tabla .= '</tbody>
									</table>';
						}
						else
						{
							$tabla = 'No se han seleccionado propuestas que integren esta propuesta';
						}
					}

				}
				else
				{
					$tabla = 'No se han seleccionado propuestas para integrar a esta propuesta';
				}
				

				$datos['propuestas_integradas'] = $tabla;

			}
			else
			{
				//	Modificación				
				$where['p.iIdPropuesta'] = $id;
				$datos['propuestas_integradas'] = '';
				$qp = $this->mp->carga_propuestas_admin($where)->row();
				$imagenes = $this->mp->datos_adjuntos($id,1);
				$documentos = $this->mp->datos_adjuntos($id,2);
				$datos['initialPreview_img'] = '';
				$datos['initialPreviewConfig_img'] = '';
				$datos['initialPreview_doc'] = '';
				$datos['initialPreviewConfig_doc'] = '';
				$datos['numdocsprev'] = $datos['numimgsprev'] = 0;

				//	Datos de la propuesta
				foreach ($qp as $key => $value)
				{
					$datos[$key] = $value;
				}

				//	Datos de adjuntos Imágenes				
				if($imagenes)
				{
					$initialPreview = $initialPreviewConfig = '';
					if($imagenes->num_rows() > 0)
					{
						$imagenes = $imagenes->result();
						foreach ($imagenes as $d)
						{
							$initialPreview .= ($initialPreview != '') ? ',':'';
							$initialPreview .= '\''.base_url().$d->vRutaAdjunto.'\'';

							$initialPreviewConfig .= ($initialPreviewConfig != '') ? ',':'';
							$initialPreviewConfig .= '{caption: "'.$d->vNombreAdjunto.'",  height: "120px", url: "'.base_url().'C_propuestas_admin/eliminar_adjunto_propuesta", previewAsData:true, key:'.$d->iIdPropuestaAdjunto.'}' ;
							$datos['numimgsprev']++;
						}
						$datos['initialPreview_img'] = $initialPreview;
						$datos['initialPreviewConfig_img'] = $initialPreviewConfig;
					}					
				}

				//	Datos de adjuntos Documentos				
				if($documentos)
				{
					$initialPreview = $initialPreviewConfig = '';
					if($documentos->num_rows() > 0)
					{
						$documentos = $documentos->result();
						foreach ($documentos as $d)
						{
							$initialPreview .= ($initialPreview != '') ? ',':'';
							$initialPreview .= '\''.base_url().$d->vRutaAdjunto.'\'';

							$initialPreviewConfig .= ($initialPreviewConfig != '') ? ',':'';
							$initialPreviewConfig .= '{type: "pdf",caption: "'.$d->vNombreAdjunto.'",  height: "120px", url: "'.base_url().'C_propuestas_admin/eliminar_adjunto_propuesta", key:'.$d->iIdPropuestaAdjunto.'}' ;
							$datos['numdocsprev']++;
						}
						$datos['initialPreview_doc'] = $initialPreview;
						$datos['initialPreviewConfig_doc'] = $initialPreviewConfig;
					}					
				}


				//	Consultamos las propuestas que la integran
				$qpi = $this->mp->consulta_propuestas_integradas($id); 
				if($qpi)
				{
					$tabla = '';
					if($qpi->num_rows() > 0)
					{
						$qpi = $qpi->result();
						$tabla .= '<table class="table table-striped">
		                            <thead>
		                                <tr>
		                                    <th>Código</th>
		                                    <th>Título</th>
		                                    <th>Autor</th>
		                                    <th width="200px"></th>
		                                </tr>
		                            </thead>
		                            <tbody>';
						foreach ($qpi as $d)
						{
							$tabla .= '<tr id="'.$d->iIdPropuesta.'">
										<td>'.$d->vCodigo.'<input type="hidden" name="p'.$d->iIdPropuesta.'" value="'.$d->iIdPropuesta.'"></td>
										<td><a href="'.base_url().'C_propuestas/propuesta_sim?ad=1&id='.$d->iIdPropuesta.'" target="_blank">'.$d->vTitulo.'</a></td>
										<td>'.$d->vCorreo.'</td>
										<td><button type="button" class="btn waves-effect waves-light btn-outline-dark" onclick="Ver(\''.$d->iIdPropuesta.'\');"><i class="fas fa-search"></i></button></td>
									</tr>';
						}

						$tabla .= '</tbody>
								</table>';
					}
					else
					{
						$tabla = 'No se han seleccionado propuestas que integren esta propuesta';
					}

					$datos['propuestas_integradas'] = $tabla;
				}

				

			}

			$datos['op_sectores'] = $op->options_sectores($datos['iIdSector'],'Seleccione un sector');
    		$datos['op_temas'] = $op->options_temas($datos['iIdTema'],'Seleccione un tema',$datos['iIdSector']);
			$datos['op_municipios'] = $op->options_municipios($datos['iIdMunicipio'],'Seleccione un municipio');
			$datos['op_estatus_propuestas'] = $op->options_estatus_propuestas($datos['iEstatus'],false);
			
			$this->load->view('propuestas/capturar_propuesta',$datos);
		}
	}

	function guardar_id()
	{
		if(isset($_POST['id']) && isset($_POST['check']))
		{
			$id = $this->input->post('id');
			if($this->input->post('check') > 0)
			{
				$_SESSION['checks'][$id] = $id;
			}
			else
			{
				if(isset($_SESSION['checks'][$id]))	 unset($_SESSION['checks'][$id]);
			}
			var_dump($_SESSION['checks']);
		}
	}


	function guardar_propuesta()
	{
		if(isset($_SESSION[PREFIJO.'_idusuario']) && !empty($_SESSION[PREFIJO.'_idusuario']))
		{
			if(isset($_POST['iIdPropuesta']))
			{
				$this->load->model('M_seguridad','ms');

				$iIdPropuesta = $this->input->post('iIdPropuesta');
				$iIdSector = $this->input->post('iIdSector');
				$mensaje_administrador = $this->input->post('mensajecorreo');
				$estatus_inicial = $this->input->post('estatus_inicial');
				$mensaje_administrador = htmlentities($mensaje_administrador, ENT_QUOTES, "UTF-8");
				$correo_enviado = true;

				$d_propuesta = array(	'vTitulo' => $this->input->post('vTitulo'),
										'tDescripcion' => base64_decode($this->input->post('tDescripcion')),
										'iIdTema' => $this->input->post('iIdTema'),
										'vUrlVideoExterno' => $this->input->post('vUrlVideoExterno'),
										'nLatDec' => (isset($_POST['ambitoMed'])) ? 0:$this->input->post('nLatDec'),
										'nLongDec' => (isset($_POST['ambitoMed'])) ? 0:$this->input->post('nLongDec'),
										'iIdMunicipio' => (isset($_POST['ambitoMed'])) ? 0: $this->input->post('iIdMunicipio')
										 );

				if($iIdPropuesta == 0)
				{
					//	NUEVA PROPUESTA
					$this->load->library('Class_mail');
					$d_propuesta['dFecha'] = date('Y-m-d h:i:s');
					$d_propuesta['vCodigo'] = '';
					$d_propuesta['iEstatus'] = 3; //	Es 3 por que es creada por el administrador
					$d_propuesta['iIdUsuario'] = $_SESSION[PREFIJO.'_idusuario']; //	Administrador que integra la propuesta

					$con = $this->ms->iniciar_transaccion();

					//	Guardamos la propuesta
					$iIdPropuesta = $this->ms->inserta_registro('Propuesta',$d_propuesta,$con);
					//	Generamos su código y actualizamos
					$vCodigo = $this->genera_codigo_propuesta($iIdSector,$d_propuesta['iIdTema'],$iIdPropuesta);
					$where['iIdPropuesta'] = $iIdPropuesta;
					$aux = $this->ms->actualiza_registro('Propuesta',$where,array('vCodigo' => $vCodigo),$con);
					//	Guardamos las propuestas integradas
					if(isset($_SESSION['checks']) && !empty($_SESSION['checks']))
					{
						foreach ($_SESSION['checks'] as $d)
						{
							$datos = array('iIdPropuesta' => $iIdPropuesta,'iIdPropuestaOrigen'=> $d);
							//	Insertamos la nueva propuesta
							$aux = $this->ms->inserta_registro('PropuestaOrigen',$datos,$con);
							//	Actualizamos las porpuestas que la originaron a integradas
							$aux = $this->ms->actualiza_registro('Propuesta',array('iIdPropuesta' => $d),array('iEstatus' => 2),$con);

							//Enviamos un correo a cada usuario
							$autor = $this->mp->datos_autor($d);
							if($autor)
							{
								$template = 'templates/mensaje_integracion.html';
								$vNombre = htmlentities($autor->vNombre, ENT_QUOTES, "UTF-8");
								$vTitulo = htmlentities($autor->vTitulo, ENT_QUOTES, "UTF-8");
								$nuevapropuesta = htmlentities($d_propuesta['vTitulo'], ENT_QUOTES, "UTF-8");

								$mensaje = file_get_contents($template);
								$mensaje = str_replace('{{var_nombre}}', $vNombre, $mensaje);
								$mensaje = str_replace('{{var_propuesta_original}}', $vTitulo, $mensaje);
								$mensaje = str_replace('{{var_nueva_propuesta}}', $nuevapropuesta, $mensaje);
								$mensaje = str_replace('{{var_codigo}}', $vCodigo, $mensaje);
								$mensaje = str_replace('{{var_mensaje}}', $mensaje_administrador, $mensaje);
								
								$asunto = utf8_decode('Propuesta integrada');

								$mail = new Class_mail();
				    			$correo_enviado = $mail->enviar_correo_gmail($autor->vCorreo,$asunto,$mensaje);	
							}
							
						}

					}



					if($this->ms->terminar_transaccion($con))
					{
						if(isset($_SESSION['checks'])) unset($_SESSION['checks']);
						if($correo_enviado)	echo "0-$iIdPropuesta"; //	Los cambios fueron gurdados
						else echo "*";	//	Los cambios fueron guardados pero los correos no pudieron ser enviados
					}
					else echo 'Ha ocurrido un error';
				}
				else
				{
					//	MODIFICAR PROPUESTA
					$d_propuesta['iEstatus'] = $this->input->post('iEstatus');
					$motivo = $this->input->post('vMotivo');
					$motivo = htmlentities($motivo, ENT_QUOTES, "UTF-8");

					$con = $this->ms->iniciar_transaccion();
					$aux = $this->ms->actualiza_registro('Propuesta',array('iIdPropuesta' => $iIdPropuesta),$d_propuesta,$con);


					if($this->ms->terminar_transaccion($con))
					{

						if($d_propuesta['iEstatus'] == 0 && $estatus_inicial != $d_propuesta['iEstatus'])
						{
							//	Si la propuesta no es viable, enviamos un correo al autor con el motivo
							
							$autor = $this->mp->datos_autor($iIdPropuesta);
							$this->load->library('Class_mail');
							$mail = new Class_mail();
							$template = 'templates/propuesta_no_viable.html';
							$vNombre = htmlentities($autor->vNombre, ENT_QUOTES, "UTF-8");
							$vTitulo = htmlentities($autor->vTitulo, ENT_QUOTES, "UTF-8");
							$mensaje = file_get_contents($template);
							$mensaje = str_replace('{{var_nombre}}', $vNombre, $mensaje);
							$mensaje = str_replace('{{var_propuesta}}', $vTitulo, $mensaje);
							$mensaje = str_replace('{{var_codigo}}', $autor->vCodigo, $mensaje);
							$mensaje = str_replace('{{var_motivo}}', $motivo, $mensaje);
							
							$asunto = utf8_decode('Propuesta no viable');
							$correo_enviado = $mail->enviar_correo_gmail($autor->vCorreo,$asunto,$mensaje);

							if($correo_enviado)	echo "0-$iIdPropuesta"; //	Los cambios fueron gurdados
							else echo "*";	//	Los cambios fueron guardados pero los correos no pudieron ser enviados
						}
						else echo '0';
						
					}
					else echo 'Ha ocurrido un error';
				}
			}
		}else echo '<p>Acceso denegado. Debe iniciar sesión</p>';
	}

	function listado_dependiente()
	{
		$nombrelst = $this->input->post('nombrelst');
		switch ($nombrelst)
		{
			case 'temas':
				$op = new Class_options();
				$id = $this->input->post('valor');
				echo $op->options_temas(0,'',$id);
				break;
			default:
				# code...
				break;
		}		
	}

	function genera_codigo_propuesta($iIdSector,$iIdTema,$iIdPropuesta)
	{
		
		$iIdSector = str_pad($iIdSector,2,"0",STR_PAD_LEFT);
		$iIdTema = str_pad($iIdTema,2,"0",STR_PAD_LEFT);
		$iIdPropuesta = str_pad($iIdPropuesta,4,"0",STR_PAD_LEFT);

		return "PYUC-$iIdSector$iIdTema-$iIdPropuesta";
	}

	function subir_adjuntos()
	{
		if(isset($_POST['iIdPropuesta']) && isset($_POST['op']))
		{
			$this->load->model('M_seguridad','ms');
			$iIdPropuesta = $this->input->post('iIdPropuesta');
			$op = $this->input->post('op');
			$num = $this->input->post('num');
			$dFecha = date("Y-m-d H:i:s");
			$elim = $this->input->post('elim');
			$ruta = '';

			//	Guardamos los nuevos archivos
			if(!empty($_FILES))
			{
				$n = $this->mp->devuelve_num_adjuntos($iIdPropuesta,$op);

				for ($i=0; $i < $num ; $i++)
				{ 
					$n++;
					if($op==1)
					{
						$vNombreAdjunto = $_FILES["adjuntoFotos"]["name"][$i];
						$nombreTemp = $_FILES["adjuntoFotos"]["tmp_name"][$i];
						$nombreArch = 'IMG_'.($n).'_'.$iIdPropuesta;
						$ruta = 'archivos/imagenes/';
						$tipo = 1;
					}

					if($op==2)
					{				
						$vNombreAdjunto = $_FILES["adjuntoArchivos"]["name"][$i];
						$nombreTemp = $_FILES["adjuntoArchivos"]["tmp_name"][$i];	
						$nombreArch = 'PDF_'.($n).'_'.$iIdPropuesta;
						$ruta = 'archivos/pdf/';
						$tipo = 2;
					}

					$resto = explode(".", $vNombreAdjunto); 
					$extension = end($resto);
					$nombreArch.='.'.$extension;

					$vRutaAdjunto = $ruta.$nombreArch;

					$datos = array(
								'vNombreAdjunto' => $vNombreAdjunto,
								'vRutaAdjunto' => $vRutaAdjunto,
								'iTipo' => $tipo,
								'vExtension' => $extension,
								'dFecha' => $dFecha,
								'iIdPropuesta' => $iIdPropuesta
							);

					$aux = $this->ms->inserta_registro('PropuestaAdjunto',$datos);

					move_uploaded_file($nombreTemp, $vRutaAdjunto);
					if($tipo==1) $min = $this->genera_miniatura($vRutaAdjunto);
				}
			}

			//	Eliminamos los viejos adjuntos
			if(isset($_POST['elim']) && !empty($_POST['elim']))
			{
				$elim = explode(",",$elim);
				for ($i=0; $i < count($elim); $i++)
				{ 
					$adj = $this->mp->devuelve_adjunto($elim[$i]);
					

					if(file_exists($adj->vRutaAdjunto))
					{ 
						if(unlink($adj->vRutaAdjunto))
						{
							$this->ms->actualiza_registro('PropuestaAdjunto',array('iIdPropuestaAdjunto' => $elim[$i]),array('iActivo' => 0));
						}
					}
				}

			}

			
			echo json_encode(true);
			
		}
	}

	private function genera_miniatura($nombre)
	{
		$this->load->library('image_lib');
		$config['image_library'] = 'GD2';
		$config['source_image'] = 'archivos/imagenes/'.$nombre;
		$config['new_image'] = 'archivos/imagenes/thumbnail/'.$nombre;
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = TRUE;
		$config['width']         = 450;
		$config['height']       = 550;	



		$this->image_lib->clear();
       	$this->image_lib->initialize($config);
       	$this->image_lib->resize();
		if(!$this->image_lib->resize()) $resp = "error_miniatura";
		else $resp = "correcto_miniatura";
		//echo $this->image_lib->display_errors();
		return $resp;
	}

	public function eliminar_adjunto_propuesta()
	{
		echo json_encode(true);
	}

	public function validar_periodo_integracion()
	{
		$inicio = $this->mp->valor_parametro('INI_INT_PRO');
		$fin = $this->mp->valor_parametro('FIN_INT_PRO');

		$hoy = strtotime(date("d-m-Y"));
		$inicio = strtotime($inicio);
		$fin = strtotime($fin);

		return ($hoy >= $inicio && $hoy <= $fin) ? true:false;
	}
}
?>