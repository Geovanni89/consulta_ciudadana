<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_propuestas extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->helper('url');
        $this->load->model('M_propuestas');
        $this->load->library('Class_propuestas');
        $this->load->library('Class_mail');

    }

	public function propuesta_sim()
	{
		$iIdPropuesta = $this->input->get('id', TRUE);
		$model = new M_propuestas();
		if(isset($_SESSION[PREFIJO.'_idusuario']))
		{
			
			$iIdUsuario = $_SESSION[PREFIJO.'_idusuario'];
			$query_existe = $model->ver_apoyo($iIdPropuesta,$iIdUsuario);
		}
		else $query_existe = 0;
		$query_prop = $model->carga_propuestas($iIdPropuesta);
		$query_coment = $model->carga_comentarios($iIdPropuesta);
		$total_coment = $model->total_comentarios($iIdPropuesta);

		if($query_prop!=false) 
		{
			$datos['iIdPropuesta'] = $iIdPropuesta;
			$datos['vTitulo'] = $query_prop[0]->vTitulo;
			$datos['tDescripcion'] = $query_prop[0]->tDescripcion;
			$datos['nLatDec'] = $query_prop[0]->nLatDec;
			$datos['nLongDec'] = $query_prop[0]->nLongDec;
			$datos['vNombre'] = $query_prop[0]->vNombre;
			$datos['vApellidoPaterno'] = $query_prop[0]->vApellidoPaterno;
			$datos['vApellidoMaterno'] = $query_prop[0]->vApellidoMaterno;
			$datos['dFecha'] = $query_prop[0]->dFecha;
			$datos['video'] = $query_prop[0]->vUrlVideoExterno;
			$datos['img'] = $model->carga_adjuntos($iIdPropuesta,1);
			$datos['pdf'] = $model->carga_adjuntos($iIdPropuesta,2);
			$datos['apoyo'] = $query_existe;
			$datos['comentarios'] = $query_coment;
			$datos['total_coment'] = $total_coment;
			$datos['url_actual'] = base_url().'C_propuestas/propuesta_sim?id='.$iIdPropuesta;
			//$datos['url_actual'] = 'http://siegy.yucatan.gob.mx/';
			$this->load->view('propuesta_simple',$datos);
		} 
		else header("Location: ".base_url()."Sitio/propuestas");
	}

	public function captura_propuesta()
	{
		$descrip64 = $this->input->post('vDescripcion', TRUE);
		
		$vTitulo = $this->input->post('vTitulo', TRUE);
		//$descrip64 = $this->input->post('vDescripcion', TRUE);
		$vDescripcion = $this->input->post('vDescripcion', TRUE);
		$iIdSector = $this->input->post('iIdSector', TRUE);
		$iIdTema = $this->input->post('iIdTema', TRUE);
		$vUrlVideoExterno = $this->input->post('vUrlVideoExterno', TRUE);
		$iIdMunicipio = $this->input->post('iIdMunicipio', TRUE);
		$nLatDec = $this->input->post('nLatDec', TRUE);
		$nLongDec = $this->input->post('nLongDec', TRUE);
		$imagenes = $this->input->post('adjuntoFotos', TRUE);
		$archivos = $this->input->post('adjuntoArchivos', TRUE);
		$ambitoMed = $this->input->post('ambitoMed', TRUE);
		$iIdUsuario = $_SESSION[PREFIJO.'_idusuario'];

		//$vDescripcion = base64_decode($descrip64);
		$dFecha = date("Y-m-d H:i:s");


		$vCodigo = 'PYUC-0'.$iIdSector;
		if($iIdTema>=10) $vCodigo.= $iIdTema;
		else $vCodigo.= '0'.$iIdTema;
		
		$datos = array(
			'vTitulo' => $vTitulo,
			'tDescripcion' => $vDescripcion,
			'iIdTema' => $iIdTema,
			'vUrlVideoExterno' => $vUrlVideoExterno,
			'iEstatus' => 1,
			'iIdUsuario' => $iIdUsuario,
			'vCodigo' => $vCodigo,
			'dFecha' => $dFecha
		);

		if($ambitoMed=="on") 
		{
			$datos['iIdMunicipio'] = 0;
		}
		else
		{
			$datos['iIdMunicipio'] = $iIdMunicipio;
			$datos['nLatDec'] = $nLatDec;
			$datos['nLongDec'] = $nLongDec;
		}

		$model = new M_propuestas();
		$query_prop = $model->inserta_propuesta($datos,'Propuesta',$vCodigo);
		if($query_prop===false)
			echo 0;
		else 
		{
			//envio de correo
			$iIdUsuario = $_SESSION[PREFIJO.'_idusuario'];

			$query_correo = $model->datos_correo(0,$iIdUsuario);

			//$propuesta = $query[0]->vTitulo;
			$nombre = $query_correo[0]->vNombre.' '.$query_correo[0]->vApellidoPaterno.' '.$query_correo[0]->vApellidoMaterno;
			$correo = $query_correo[0]->vCorreo;
			//$correo = 'vg.barbosa89@gmail.com';
			//$codigo = $query[0]->vCodigo;
			$asunto = 'Propuesta enviada';

			$this->load->library('Class_mail');
			$mail = new Class_mail();
			$template = 'templates/propuesta_enviada.html';
			$mensaje = file_get_contents($template);
			$mensaje = str_replace("{{var_nombre}}", $nombre, $mensaje);
			//$mensaje = str_replace("{{var_propuesta}}", $propuesta, $mensaje);
			//$mensaje = str_replace("{{var_codigo}}", $codigo, $mensaje);


			/*if($mail->enviar_correo_gmail($correo,$asunto,$mensaje)) 
				echo 'correcto';
			else 
				echo 'error1';*/
			$mail->enviar_correo_gmail($correo,$asunto,$mensaje);
			//envio de correo

			echo $query_prop;
		} 
	}

	public function carga_temas()
	{
		$select = '<option value="">Temas</option>';
		$id_sec = $this->input->post('id', TRUE);
		$model = new M_propuestas();
		$query_tem = $model->datos_temas($id_sec);
		if($query_tem!=false)
		{
			foreach ($query_tem as $tema) {
				$select .= '<option value="'.$tema->iIdTema.'">'.$tema->vTema.'</option>';
			}
		}
		echo $select;
	}

	public function pagina_prop()
	{
		$pagina = $this->input->post('pagina', TRUE);
		$prop = new Class_propuestas();
		$propuestas = $prop->carga_propuestas($pagina);
		echo $propuestas;
	}

	public function paginador()
	{
		$op = $this->input->post('op', TRUE);
		$lim_i = $this->input->post('lim_i', TRUE);
		$lim_s = $this->input->post('lim_s', TRUE);
		$total = $this->input->post('total', TRUE);
		if($op=="sig")
		{
			$lim_i+=1;
			$lim_s+=1;			
		}
		elseif($op=="ant")
		{
			$lim_i-=1;
			$lim_s-=1;			
		}

		if($lim_i == 1) $dis_ant = "disabled";
		else $dis_ant = "";

		//echo 'total: '.$total;
		//echo '<br>limite_superior: '.$lim_s;

		if($lim_i == 0)
			echo '<li id="previous" class="page-item disabled"><a class="page-link" href="javascript:">&laquo;</a></li>';
		else
			echo '<li id="previous" class="page-item"><a class="page-link" onclick="paginador(\'ant\','.$lim_i.','.$lim_s.','.$total.')" href="javascript:">&laquo;</a></li>';

		for ($i=$lim_i; $i <=$lim_s; $i++) { 
			echo '<li id="pg_'.$i.'" class="page-item"><a class="page-link" onclick="pagina_propuesta('.$i.')" href="javascript:">'.($i+1).'</a></li>';
		}

		if($lim_s == $total)
			echo '<li id="next" class="page-item disabled"><a class="page-link" href="javascript:">&raquo;</a></li>';
		else
			echo '<li id="next" class="page-item"><a class="page-link" onclick="paginador(\'sig\','.$lim_i.','.$lim_s.','.$total.')" href="javascript:">&raquo;</a></li>';
	}

	public function subir()
	{		
		$op = $this->input->get('op', TRUE);
		$iIdPropuesta = $this->input->post('iIdPropuesta', TRUE);		
		$ruta = 'archivos/';
		$tArchivos = 0;
		$dFecha = date("Y-m-d H:i:s");
		
		if($op==1)
		{
			$ruta.='imagenes/';
			$tArchivos = count($_FILES["adjuntoFotos"]["name"]);
		}
		elseif($op==2)
		{
			$ruta.='pdf/';
			$tArchivos = count($_FILES["adjuntoArchivos"]["name"]);
		}

		for ($i=0; $i < $tArchivos; $i++) 
		{
			if($op==1)
			{
				$vNombreAdjunto = $_FILES["adjuntoFotos"]["name"][$i];
				$nombreTemp = $_FILES["adjuntoFotos"]["tmp_name"][$i];
				$nombreArch = 'IMG_'.($i+1).'_'.$iIdPropuesta;
				$tipo=1;
			}
			elseif($op==2)
			{				
				$vNombreAdjunto = $_FILES["adjuntoArchivos"]["name"][$i];
				$nombreTemp = $_FILES["adjuntoArchivos"]["tmp_name"][$i];	
				$nombreArch = 'PDF_'.($i+1).'_'.$iIdPropuesta;
				$tipo=2;
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

			

			$modal = new M_propuestas();
			$query_adj = $modal->inserta_adjuntos($datos);
			if($query_adj===true)
			{
			
				move_uploaded_file($nombreTemp, $vRutaAdjunto);
				if($tipo==1) $min = $this->genera_miniatura($nombreArch);
				
				//$infoImagenesSubidas[$i]=array("caption"=>"$nombreArch","height"=>"120px","url"=>"C_propuestas/borrar","key"=>$nombreArch);		
			}
		}

		$arr = array("file_id"=>0,"overwriteInitial"=>true);
		echo json_encode($arr);
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

	public function apoyar_propuesta()
	{
		$iIdUsuario = $_SESSION[PREFIJO.'_idusuario'];

		$iIdPropuesta = $this->input->post('id');
		$vVoto = $this->input->post('op', TRUE);
		$dFecha = date("Y-m-d H:i:s");
		$model = new M_propuestas();

		$datos = array(
			'iIdPropuesta' => $iIdPropuesta,
			'iIdUsuario' => $iIdUsuario,
			'vVoto' => $vVoto,
			'dFecha' => $dFecha,
		);


		/*$datos = array(
			'iIdPropuesta' => $iIdPropuesta,
			'iIdUsuario' => $iIdUsuario,
			'iLike' => 1,
			'dFecha' => $dFecha,
		);
		$query_existe = $model->ver_apoyo($iIdPropuesta,$iIdUsuario);*/

		$query_existe = $model->ver_apoyo($iIdPropuesta,$iIdUsuario);
		if($query_existe>0) echo 'error1';
		else {
			$query_like = $model->apoyar_propuesta($datos);
			if($query_like==false) echo "error";
			else echo "correcto";			
		}

	}

	public function envia_comentario()
	{
		$model = new M_propuestas();
		$iIdUsuario = $_SESSION[PREFIJO.'_idusuario'];
		$idprop = $this->input->post('idprop', TRUE);
		$idresp = $this->input->post('idcom', TRUE);
		$vComentario = $this->input->post('com', TRUE);
		$dFecha = date("Y-m-d H:i:s");

		$datos = array( 
			'vComentario'=>$vComentario,
			'iEstatus'=>1,
			'iIdPropuesta'=>$idprop,
			'iIdUsuario'=>$iIdUsuario,
			'iIdReplicaDe' => 0,
			'dFecha'=> $dFecha);
		
		if(isset($idresp) && $idresp > 0) $datos['iIdReplicaDe'] = $idresp;

		$coment = $model->guarda_comentario($datos);
		echo $coment;
	}

	public function like_comentario()
	{
		$iIdUsuario = $_SESSION[PREFIJO.'_idusuario'];

		$iIdComentario = $this->input->post('iIdComentario', TRUE);
		$iLike = $this->input->post('iLike', TRUE);
		$dFecha = date("Y-m-d H:i:s");
		
		$datos = array(			
			'iLike' => $iLike,
			'dFecha' => $dFecha);

		$model = new M_propuestas();
		$verifica = $model->verifica_like($iIdUsuario,$iIdComentario);
		if($verifica!=false)
			$op = 'update';
		else
		{
			$op = 'insert';
			$datos['iIdCometario'] = $iIdComentario;
			$datos['iIdUsuario'] = $iIdUsuario;
		}
		$like = $model->guarda_like($datos,$op,$iIdUsuario,$iIdComentario);

		$arr = array("res"=>$like,"accion"=>$op);
		echo json_encode($arr);
	}

	public function respuestas()
	{
		$iIdComentario = $this->input->post('iIdComentario', TRUE);
		$model = new M_propuestas();
		$resp = $model->carga_respuestas($iIdComentario);
		if($resp!=false) 
		{
			foreach ($resp as $vresp) {
				echo '<ul class="children">
						<li class="comment byuser comment-author-_smcl_admin odd alt depth-2" id="li_comentario_'.$vresp->iIdComentario.'">
							<div id="comment-3" class="comment-wrap clearfix">
								<div class="comment-meta">
									<div class="comment-author vcard">
										<span class="comment-avatar clearfix">
										<img alt="" src="'.base_url().'img/icon-user.png" class="avatar avatar-40 photo" height="40" width="40" /></span>
									</div>
								</div>
								<div class="comment-content clearfix">
									<div class="comment-author"><a href="#" rel="external nofollow" class="url">'.$vresp->vNombre.' '.$vresp->vApellidoPaterno.' '.$vresp->vApellidoMaterno.'</a><span><a href="#" title="Permalink to this comment">'.$vresp->dFecha.'</a></span></div>
									<p>'.$vresp->vComentario.'</p>									
									<a class="comment-reply-link" href="javascript:" onclick="responder('.$vresp->iIdComentario.',\''.$vresp->vNombre.'\');"><i class="icon-reply"></i></a>
									<div class="row">';
									if($vresp->iLike=="")
									{
										echo '<div class="col-"><a id="like_'.$vresp->iIdComentario.'" href="javascript:" onclick="like(1,'.$vresp->iIdComentario.')"><i class="icon-thumbs-up"></i> Me gusta</a></div>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<div class="col-"><a id="dislike_'.$vresp->iIdComentario.'" href="javascript:" onclick="like(0,'.$vresp->iIdComentario.')"><i class="icon-thumbs-down"></i> No me gusta</a></div>';	
									}
									elseif($vresp->iLike==0)
									{
										echo '<div class="col-"><a id="like_'.$vresp->iIdComentario.'" href="javascript:" onclick="like(1,'.$vresp->iIdComentario.')"><i class="icon-thumbs-up"></i> Me gusta</a></div>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<div class="col-"><a class="btn-like" id="dislike_'.$vresp->iIdComentario.'" href="javascript:" onclick="like(0,'.$vresp->iIdComentario.')"><i class="icon-thumbs-down"></i> No me gusta</a></div>';
									}
									elseif($vresp->iLike==1)
									{
										echo '<div class="col-"><a class="btn-like" id="like_'.$vresp->iIdComentario.'" href="javascript:" onclick="like(1,'.$vresp->iIdComentario.')"><i class="icon-thumbs-up"></i> Me gusta</a></div>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<div class="col-"><a id="dislike_'.$vresp->iIdComentario.'" href="javascript:" onclick="like(0,'.$vresp->iIdComentario.')"><i class="icon-thumbs-down"></i> No me gusta</a></div>';
									}

									if($vresp->respuestas > 0)
									{
										echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<div class="col"><a id="respuestas_'.$vresp->iIdComentario.'" href="javascript:" onclick="respuestas('.$vresp->iIdComentario.')">Ver respuestas</a></div>
										</div>
										</div>
										<div class="col" style="display: none;" id="container_respuesta_'.$vresp->iIdComentario.'"></div>
										<div class="clear"></div>
									</div>
									<div id="resp_'.$vresp->iIdComentario.'"></div>';

									}
									else
									{
										echo '</div></div>
										<div class="col" style="display: none;" id="container_respuesta_'.$vresp->iIdComentario.'"></div>
										<div class="clear"></div>
									</div>';
									}
					echo '</li>
					</ul>';
			}
		}
		//print_r($resp);

		else echo 'Sin respuestas';
	}

	//-------------------------------------------moderación de comentarios -------------------------------------------

	public function modera_comentario()
	{
		$model = new M_propuestas();
		$query_sector = $model->datos_sectores();
		$datos['sectores'] = $query_sector;
		$this->load->view('modera_comentarios',$datos);
	}

	public function carga_propuestas()
	{
		$id_tema = $this->input->post('id', TRUE);
		$model = new M_propuestas();
		$query_prop = $model->carga_prop_admin($id_tema);
		echo '<option value="">Seleccione una propuesta</option>';
		if($query_prop!=false) 
		{
			foreach ($query_prop as $vprop) {
				echo '<option value="'.$vprop->iIdPropuesta.'">'.$vprop->vTitulo.'</option>';
			}
		}
	}

	public function carga_comentarios()
	{
		$iIdPropuesta = $this->input->post('iIdPropuesta', TRUE);
		
		$model = new M_propuestas();
		$query_coment = $model->carga_coment_admin($iIdPropuesta);
		//print_r($query_coment);
		echo '<div class="col-12">
                <div class="card">                    
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Comentario</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>';
                            if($query_coment!=false)
                            {
                            	foreach ($query_coment as $vcom) {
                            		echo '<tr><th scope="row">'.$vcom->iIdComentario.'</th><td>'.$vcom->vComentario.'</td><td>'.$vcom->dFecha.'</td>
                            		<td><div class="row">
                            		<div class="col-md-2"><a href="javascript:" title="Aceptar comentario" onclick="modera_coment(1,'.$vcom->iIdComentario.');">
                            			<li class="fa fa-check"></li>
                            		</a></div>
                            		<div class="col-md-2"><a href="javascript:" title="Eliminar comentario" onclick="modera_coment(0,'.$vcom->iIdComentario.');">
                            			<li class="fa fa-times"></li>
                            		</a></div>
                            		</div></td></tr>';
                            	}
                            }
                            else echo '<tr><td colspan="4">Sin resultados</td></tr>';
                            echo '</tbody>
                        </table>
                    </div>
                </div>
            </div>';
	}

	public function act_coment()
	{
		

		$idcoment = $this->input->post('idcoment', TRUE);
		$op = $this->input->post('op', TRUE);
		
		$datos = array();
		if($op==1) $datos['iEstatus'] = 2;
		elseif($op==0) $datos['iEstatus'] = 0;

		$model = new M_propuestas();
		$query_coment = $model->actualiza_comentario($datos,$idcoment);
		if($query_coment!=false)
		{
			$model = new M_propuestas();
			$query = $model->datos_correo($idcoment);
			if($op==0)
			{
				$propuesta = $query[0]->vTitulo;
				$nombre = $query[0]->vNombre.' '.$query[0]->vApellidoPaterno.' '.$query[0]->vApellidoMaterno;
				$correo = $query[0]->vCorreo;
				//$correo = 'vg.barbosa89@gmail.com';
				$codigo = $query[0]->vCodigo;
				$asunto = 'Comentario eliminado';

				$this->load->library('Class_mail');
				$mail = new Class_mail();
				$template = 'templates/comentario_eliminado.html';
				$mensaje = file_get_contents($template);
				$mensaje = str_replace("{{var_nombre}}", $nombre, $mensaje);
				$mensaje = str_replace("{{var_propuesta}}", $propuesta, $mensaje);
				$mensaje = str_replace("{{var_codigo}}", $codigo, $mensaje);


				if($mail->enviar_correo_gmail($correo,$asunto,$mensaje)) 
					echo 'correcto';
				else 
					echo 'error1';
					
			}
		}
		else echo "error2";
	}
	
}
