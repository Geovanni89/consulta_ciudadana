<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitio extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->helper('url');
        $this->load->model('M_propuestas');
        $this->load->model('M_presupuesto');
        $this->load->library('Class_propuestas');
        $this->load->library('Class_votacion');
    }





























    
	public function index()
	{
		$prop = new Class_propuestas();
		$model = new M_presupuesto();

		$datos['active'] = 1;
		$datos['prop_index'] = $prop->prop_index();
		$datos['numeralia'] = $prop->num_index();
		$datos['votos'] = $prop->prop_votos();
		$datos['prop_temas'] = $model->propuestas_tema();
		/*if(isset($_SESSION[PREFIJO.'_idrol']) && !empty($_SESSION[PREFIJO.'_idrol']))
		{
			$idrol = (int)$_SESSION[PREFIJO.'_idrol'];
			$idusuario = (int)$_SESSION[PREFIJO.'_idusuario'];

			switch ($idrol){
				case 1:
					//	Administrador
					$this->load->library('Class_seguridad');
					$ms = new Class_seguridad();
					$datos['menu'] = $ms->pintar_menu($idusuario);
					$this->load->view('admin',$datos);
					break;
				case 2:
					//	Ciudadano
					$this->load->view('index',$datos);
					break;
				case 3:
					//	Moderador
					echo 'Hola Moderador';
					break;
				
				default:
					$this->load->view('plantilla_html');
					break;
			}

		}else*/ 
		//.--  Datos para los mapas
		$this->load->model('M_dashboard','md');
		$datos['puntos'] = array();
		//	Datos para el mapa left
		$puntos = $this->md->propuestas_puntos();
		if($puntos)
		{
			$datos['puntos'] = $puntos->result();			
		}
		//	Datos para el mapa de calor
		$dmap1 = $this->md->ConsultaAvancesPorMunicipio();
		if($dmap1 != false)
		{
			if($dmap1->num_rows() > 0)
			{
				$dmap1 = $dmap1->result();
				$data = '';
				foreach ($dmap1 as $fila)
				{
					if($data != '') $data .= ',';
					$data .= '{"name": "'.$fila->municipio.'","id": "'.$fila->municipioid.'","value": '.$fila->avance.', "lat":'.$fila->lat.', "lng":'.$fila->lng.' }';
				}
				$datos['dm1'] = $data;
			} 
			else $datos['dm1'] = 0;
		}else $datos['dm1'] = false;

		$this->load->view('index',$datos);
	}

	public function propuestas()
	{
		$iIdSector = $this->input->get('iIdSector', TRUE);
		$iIdTema = $this->input->get('iIdTema', TRUE);
		$prop = new Class_propuestas();

		$datos['propuestas'] = $prop->carga_propuestas(0,$iIdSector,$iIdTema);
		$datos['total'] = $prop->total_propuestas($iIdSector,$iIdTema);
		$datos['sectores'] = $prop->datos_sectores();
		if(isset($iIdSector) && $iIdSector>0) {

			$datos['iIdSector'] = $iIdSector;			
			$datos['temas'] = $prop->datos_temas($iIdSector);
			$datos['iIdTema'] = (isset($iIdTema)) ? $iIdTema : 0 ;

		}
		else
		{
			$datos['iIdSector'] = 0;
			$datos['temas'] = '';
			$datos['iIdTema'] = 0;
		}


		$datos['active'] = 2;
		$this->load->view('propuestas',$datos);
	}

	public function form_propuesta()
	{
		//estas consultas se moveran posteriormente a C_propuestas
		$select_sec = '';
		$select = '';
		$select_tema = '';
		$iIdSector = $this->input->get('iIdSector', TRUE);
		$iIdTema = $this->input->get('iIdTema', TRUE);
		$model = new M_propuestas();

		$inicio_cap = $model->consulta_valor_parametros(1);
		$fin_cap = $model->consulta_valor_parametros(2);


		$inicio = $inicio_cap[0]->vValor;
        $fin = $fin_cap[0]->vValor;
        $dFecha = date("Y-m-d");    

		if($dFecha>=$inicio && $dFecha<=$fin)
		{
			if($iIdSector>0 && $iIdTema>0)
			{
				$query_sec = $model->datos_sectores($iIdSector);
				if($query_sec!=false)
				{
					foreach ($query_sec as $sector)
		            {
						$datos['input_sector'] = '<input class="form-control" type="text" readonly value="'.$sector->vSector.'"><input type="hidden" id="iIdSector" name="iIdSector" value="'.$sector->iIdSector.'" required>';
		                //$select_sec .= '<option value="'.$sector->iIdSector.'" selected>'.$sector->vSector.'</option>';
		            }
				}
				//$datos['select_sec'] = $select_sec;

				$query_tema = $model->datos_temas($iIdSector,$iIdTema);
				if($query_tema!=false)
				{
					foreach ($query_tema as $tema)
		            {
						$datos['input_tema'] = '<input class="form-control" type="text" readonly value="'.$tema->vTema.'"><input type="hidden" id="iIdTema" name="iIdTema" value="'.$tema->iIdTema.'" required>';
		                //$select_tema .= '<option value="'.$tema->iIdTema.'" selected>'.$tema->vTema.'</option>';

		            }
				}
				//$datos['select_tema'] = $select_tema;		
			}
			else
			{
				$query_sec = $model->datos_sectores();
				if($query_sec!=false)
				{
					$select_sec .= '<select class="form-control" id="iIdSector" name="iIdSector" onchange="carga_temas(this.value);" required><option value="">Sector</option>';
					foreach ($query_sec as $sector)
		            {					
		                $select_sec .= '<option value="'.$sector->iIdSector.'">'.$sector->vSector.'</option>';
		            }
		            $select_sec .='</select>';
				}
				$datos['input_sector'] = $select_sec;

				$datos['input_tema']=  '<select class="form-control" id="iIdTema" name="iIdTema" required><option value="">Temas</option></select>';					
			}
			
			$query_mun = $model->datos_municipios();
			if($query_mun!=false)
			{
				foreach ($query_mun as $municipio)
	            {
	                $select .= '<option value="'.$municipio->iIdMunicipio.'">'.$municipio->vMunicipio.'</option>';
	            }
			}
			$datos['select'] = $select;
			//estas consultas se moveran posteriormente a C_propuestas
			if(isset($_SESSION[PREFIJO.'_idusuario']))			
				$this->load->view('form_propuesta',$datos);
			else
				header("Location: ".base_url()."Sitio/login");
		}
		else
		{
			header("Location: ".base_url()."Sitio/captura");
		}
	}

	public function test()
	{
		$prueba = new M_prueba();
		var_dump($prueba->datos_tabla());
	}

	public function captura()
	{
		$this->load->view('captura');
	}

	public function login()
	{
		if(isset($_SESSION[PREFIJO.'_idrol']) && !empty($_SESSION[PREFIJO.'_idrol']))
		{
			$this->index();
		}
		else
		{
			$datos['active'] = 4;
			$this->load->view('login',$datos);
		}
	}

	public function loguearse()
	{
		if(isset($_POST['correo']) && isset($_POST['contrasenia']))
		{
			//	Datos Recaptcha Google
			$secret = '6LcFNH0UAAAAANR1lPEs3ezWT_mUor1PiT60wn_P';
	    	$response = $_POST["g-recaptcha-response"];
	    	$remoteip =  $_SERVER['REMOTE_ADDR'];

	    	$url = 'https://www.google.com/recaptcha/api/siteverify';

	    	$captcha = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip");
			$json = json_decode($captcha);
			
			if($json->success)
			{
				$usuario = $this->input->post('correo');
				$contrasenia = $this->input->post('contrasenia');
				$this->load->library('Class_seguridad');
				$seg = new Class_seguridad();

				echo $seg->iniciar_sesion($usuario,$contrasenia);
			}
			else
			{
				echo 'Resulva el captcha para continuar';
			}
			
		}else echo 'Datos insuficientes';
	}

	public function cerrar_sesion()
	{
		if(isset($_SESSION) && !empty($_SESSION))
		{
			foreach ($_SESSION as $key => $value)
			{
				session_unset($key);
			}
		}

		$this->index();
	}

	public function registrarse()
	{
		$this->load->library('Class_options');
		$op = new Class_options();
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
		$datos['active'] = 5;


		$this->load->view('registrarse',$datos);
	}

	function listado_dependiente()
	{
		$this->load->library('Class_options');

		$nombrelst = $this->input->post('nombrelst');
		switch ($nombrelst)
		{
			case 'localidades':
				$op = new Class_options();
				$where['iIdMunicipio'] = $this->input->post('valor');
				echo $op->options_localidades(0,'',$where);
				break;
			case 'asentamientos':
				$op = new Class_options();
				$where['iIdLocalidad'] = $this->input->post('valor');
				echo $op->options_asentamientos(0,'',$where);
				break;
			case 'codigo_postal':
				$op = new Class_options();
				$where['iCodigoPostal'] = $this->input->post('valor');
				echo $op->options_asentamientos_cp(0,'',$where);
				break;
			case 'datos_faltantes':
				$this->load->model('M_catalogos','mc');
				$datos['success'] = false;
				$datos['municipio'] = '';
				$datos['localidad'] = '';
				$datos['id_asentamiento'] = 0;
				$query = $this->mc->devulve_municipio_localidad($this->input->post('valor'));

				if($query)
				{
					if($query->num_rows() > 0)
					{
						$query = $query->row();
						$datos['success'] = true;
						$datos['municipio'] = $query->vMunicipio;
						$datos['localidad'] = $query->vLocalidad;
						$datos['id_asentamiento'] = $query->iIdAsentamiento;	
					}
				}
				
				echo json_encode($datos);

				break;
			default:
				# code...
				break;
		}		
	}

	function admin()
	{
		if(isset($_SESSION[PREFIJO.'_idrol']) && !empty($_SESSION[PREFIJO.'_idrol']))
		{
			$idrol = (int)$_SESSION[PREFIJO.'_idrol'];
			$idusuario = (int)$_SESSION[PREFIJO.'_idusuario'];
			
			$this->load->library('Class_seguridad');
			$ms = new Class_seguridad();
			$aux = $ms->pintar_menu($idusuario);
			$datos['menu'] = $aux['menu'];
			$datos['modulo_inicial'] = $aux['modulo_inicial'];;
			$this->load->view('admin',$datos);

		}else $this->load->view('index');
	}

	function matriz_ejes()
	{
		$model = new M_presupuesto();
		$datos['prop_temas'] = $model->propuestas_tema();
		$datos['active'] = 6;
		$this->load->view('matriz_ejes',$datos);
	}

	function infografia()
	{
		$this->load->view('infografia');
	}

	/*public function votaciones() 
	{
		$vota = new Class_votacion();

		$datos['active'] = 3;
		$datos['prop_vota'] = $vota->carga_propuestas();
		
		$this->load->view('votaciones',$datos);
	}*/

	public function presupuesto()
	{
		$model = new M_presupuesto();
		if(isset($_SESSION[PREFIJO.'_idusuario']))
		{
			$iIdUsuario = $_SESSION[PREFIJO.'_idusuario'];
			$datos['existe'] = $model->pres_ususario($iIdUsuario);
		}
		else $datos['existe'] = -1;

		$datos['active'] = 7;
		$datos['prop_temas'] = $model->propuestas_tema();
		$this->load->view('presupuesto',$datos);
	}

	public function encuestas()
	{
		$model = new M_presupuesto();
		$datos['prop_temas'] = $model->propuestas_tema();
		$datos['active'] = 8;
		$this->load->view('encuestas',$datos);
	}

	/*public function encuestas()
	{
		$this->load->model('M_dashboard','md');
		$datos['puntos'] = array();
		//	Datos para el mapa left
		$puntos = $this->md->propuestas_puntos();
		if($puntos)
		{
			$datos['puntos'] = $puntos->result();			
		}
		//	Datos para el mapa de calor
		$dmap1 = $this->md->ConsultaAvancesPorMunicipio();
		if($dmap1 != false)
		{
			if($dmap1->num_rows() > 0)
			{
				$dmap1 = $dmap1->result();
				$data = '';
				foreach ($dmap1 as $fila)
				{
					if($data != '') $data .= ',';
					$data .= '{"name": "'.$fila->municipioid.'","value": '.$fila->avance.'}';
				}
				$datos['dm1'] = $data;
			} 
			else $datos['dm1'] = 0;
		}else $datos['dm1'] = false;
		
		$datos['active'] = 8;
		$this->load->view('mapa',$datos);
	}*/

}
