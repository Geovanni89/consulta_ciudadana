<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_encuestas extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->helper('url');
        //$this->load->helper('Funciones');
        $this->load->model('M_seguridad','ms');
        $this->load->model('M_encuestas','me');
    }

    public function mostrar_encuesta()
	{
		$iIdTema = $this->input->get('tema');
		$qencuesta = $this->me->trae_encuesta('Tema',$iIdTema);
		$iIdUsuario = (isset($_SESSION[PREFIJO.'_idusuario'])) ? $_SESSION[PREFIJO.'_idusuario']:0;
		$str = '';
		$datos['contestado'] = 0;

		if($qencuesta)
		{
			
			$datos['iIdEncuesta'] = $qencuesta->iIdEncuesta;
			$datos['nombre_encuesta'] = $qencuesta->vTitulo;

			$qpreg = $this->me->trae_preguntas($datos['iIdEncuesta']);
			if($qpreg)
			{
				$qpreg = $qpreg->result();
				foreach ($qpreg as $p) {
					$str .= '<div class="">';
						$str .= '<div class="col_full"><label>'.$p->iOrden.'. '.$p->vPregunta.'</label>';

						$resp = $this->me->trae_respuestas($p->iIdPregunta,$iIdUsuario);
						if($resp)
						{
							$resp = $resp->result();
							foreach ($resp as $r)
							{
								if(trim($r->resp_us) != '') $datos['contestado'] = 1;
								$str .= $this->elemento_form($p->iIdPregunta,$r->iIdRespuesta,$r->iTipoElemento,$r->vRespuesta,$r->resp_us);
							}
						}

						$str .= '</div>';
					//$str .= '</div><div class="line"></div>';
					
				}
			}

			$datos['encuesta'] = $str;
			$this->load->view('encuestas/encuesta',$datos);
		}		
		
	}

	function elemento_form($idpreg,$idresp,$tipo,$resp,$resp_us)
	{
		$str = '';
		switch ($tipo)
		{
			case '1':	//	Option
				$checked = ($resp_us != ' ') ? 'checked = "checked"':'';
				$str .= '<div class="form-check">';
				$str .= '<input type="radio" class="form-check-input" id="rb-'.$idpreg.'" name="rb-'.$idpreg.'" value="'.$idresp.'" '.$checked.'>';
				$str .= '<span>'.$resp.'</span>';
				$str .= '</div>';
				break;
			case '2':	//	Option con input text
				$checked = ($resp_us != ' ') ? 'checked = "checked"':'';
				$str .= '<div class="form-check">';
				$str .= '<input type="radio" class="form-check-input" id="rb-'.$idpreg.'" name="rb-'.$idpreg.'" value="'.$idresp.'" '.$checked.'>';
				$str .= '<span>'.$resp.'</span><input type="text" class="form-control" name="txt-'.$idresp.'" id="txt-'.$idresp.'" value="'.$resp_us.'" >';
				$str .= '</div>';
				break;
			case '3':	//	Checkbox
				$checked = ($resp_us != ' ') ? 'checked = "checked"':'';
				$str .= '<div class="form-check">';
				$str .= '<input type="checkbox" class="form-check-input" id="chk-'.$idresp.'" name="chk-'.$idresp.'" value="'.$idresp.'" '.$checked.'>';
				$str .= '<span>'.$resp.'<span>';
				$str .= '</div>';
				break;
			case '4':	//	Checkbox con input text
				$checked = ($resp_us != ' ') ? 'checked = "checked"':'';
				$str .= '<div class="form-check">';
				$str .= '<input type="checkbox" class="form-check-input" id="chk-'.$idresp.'" name="chk-'.$idresp.'" value="'.$idresp.'" '.$checked.'>';
				$str .= '<span>'.$resp.'<input type="text" class="form-control" name="txt-'.$idresp.'" id="txt-'.$idresp.'" value="'.$resp_us.'" ></span>';
				$str .= '</div>';
				break;
			case '5':	//	Textarea
				$str .= '<div class="form-group">';
				$str .= '<span>'.$resp.'</span>';
				$str .= '<textarea class="form-control" id="text-'.$idresp.'" name="text-'.$idresp.'" rows="3">'.trim($resp_us).'</textarea>';
				$str .= '</div>';
				break;
			default:
				# code...
				break;
		}

		return $str;
	}

	function guardar_respuestas()
	{
		if(isset($_POST['iIdUsuario']) && !empty($_POST['iIdUsuario']) && isset($_POST['iIdEncuesta']) && !empty($_POST['iIdEncuesta']))
		{
			$iIdUsuario = $this->input->post('iIdUsuario');
			$iIdEncuesta = $this->input->post('iIdEncuesta');

			$con = $this->ms->iniciar_transaccion();

			foreach ($_POST as $key => $value)
			{
				$aux = explode('-',$key);
				$respuesta = array(	'iIdUsuario' => $iIdUsuario,
									'iIdRespuesta' => '',
									'vRespuesta' => ''
								);

				if($aux[0] == 'rb')
				{
					$respuesta['iIdRespuesta'] = $this->input->post($key);
					if(isset($_POST['txt-'.$value])) $respuesta['vRespuesta'] = $this->input->post('txt-'.$value);

					$reg = $this->ms->inserta_registro_no_pk('UsuarioRespuesta',$respuesta,$con);
				}

				if($aux[0] == 'chk')
				{
					$respuesta['iIdRespuesta'] = $this->input->post($key);
					if(isset($_POST['txt-'.$value])) $respuesta['vRespuesta'] = $this->input->post('txt-'.$value);

					$reg = $this->ms->inserta_registro_no_pk('UsuarioRespuesta',$respuesta,$con);
				}

				if($aux[0] == 'text')
				{
					$respuesta['iIdRespuesta'] = $aux[1];
					$respuesta['vRespuesta'] = $this->input->post($key);

					$reg = $this->ms->inserta_registro_no_pk('UsuarioRespuesta',$respuesta,$con);
				}

				/*var_dump($key);
				var_dump($value);*/
			}

			if($this->ms->terminar_transaccion($con)) echo '0';
			else echo 'Error!!!';

		}else echo 'Error!!';
	}

}

?>