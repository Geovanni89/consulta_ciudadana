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
        $this->load->library('Class_propuestas');
    }





























    
	public function index()
	{
		if(isset($_SESSION[PREFIJO.'_id_rol']) && !empty($_SESSION[PREFIJO.'_id_rol']))
		{
			$id_rol = (int)$_SESSION[PREFIJO.'_id_rol'];

			switch ($id_rol){
				case 1:
					//	Administrador
					$this->load->view('admin');
					break;
				case 2:
					//	Ciudadano
					$this->load->view('index');
					break;
				case 3:
					//	Administrador
					echo 'Hola Moderador';
					break;
				
				default:
					$this->load->view('index');
					break;
			}

		}else $this->load->view('index');
	}

	public function propuestas()
	{
		$prop = new Class_propuestas();
		$datos['propuestas'] = $prop->carga_propuestas();
		$this->load->view('propuestas',$datos);
	}

	public function form_propuesta()
	{
		//estas consultas se moveran posteriormente a C_propuestas
		$select_sec = '';
		$select = '';
		$model = new M_propuestas();

		$query = $model->datos_sectores();
		if($query!=false)
		{
			foreach ($query as $sector)
            {
                $select_sec .= '<option value="'.$sector->iIdSector.'">'.$sector->vSector.'</option>';
            }
		}
		$datos['select_sec'] = $select_sec;
		
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

		$this->load->view('form_propuesta',$datos);
	}

	public function test()
	{
		$prueba = new M_prueba();
		$datos['prueba'] = $prueba->datos_tabla();
		$this->load->view('test',$datos);
	}

	public function login()
	{
		$this->load->library('Class_options');
		$op = new Class_options();
		$datos['op_grados_estudio'] = $op->options_grados_estudio(0,'Seleccione un grado de estudio');
		$datos['op_ocupaciones'] = $op->options_ocupaciones(0,'Seleccione una ocupación');

		$this->load->view('login',$datos);
	}

	public function loguearse()
	{
		if(isset($_POST['correo']) && isset($_POST['contrasenia']))
		{
			$usuario = $this->input->post('correo');
			$contrasenia = $this->input->post('contrasenia');
			$this->load->library('Class_seguridad');
			$seg = new Class_seguridad();

			$cod = $seg->iniciar_sesion($usuario,$contrasenia);
			                        
			echo $cod;
		}else echo 100;
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
}
