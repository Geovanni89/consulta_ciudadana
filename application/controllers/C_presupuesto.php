<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_presupuesto extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->helper('url');
        $this->load->model('M_presupuesto');
        $this->load->library('Class_propuestas');
        $this->load->library('Class_mail');

    }
	
	public function envia_temas()
	{
		$temas = $this->input->post('temas', TRUE);
		$dFecha = date("Y-m-d H:i:s");
		$iIdUsuario = $_SESSION[PREFIJO.'_idusuario'];
		
		$model = new M_presupuesto();

		foreach ($temas as $key => $value) {
			//echo 'key: '.$key.'<br>value: '.;
			$datos = array('iIdTema' => $value, 'iIdUsuario' => $iIdUsuario, 'dFecha' => $dFecha);
			$query = $model->guarda_presupuesto($datos);
		}
		echo $query;
	}
}
