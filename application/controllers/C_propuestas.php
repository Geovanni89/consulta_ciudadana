<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_propuestas extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('M_propuestas');
    }

	public function propuesta_sim()
	{
		$this->load->view('propuesta_simple');
	}

	public function captura_propuesta()
	{
		$vTitulo = $this->input->post('vTitulo', TRUE);
		$vDescripcion = $this->input->post('vDescripcion', TRUE);
		$iIdTema = $this->input->post('iIdTema', TRUE);
		$vUrlVideoExterno = $this->input->post('vUrlVideoExterno', TRUE);
		$iIdMunicipio = $this->input->post('iIdMunicipio', TRUE);
		$nLatDec = $this->input->post('nLatDec', TRUE);
		$nLongDec = $this->input->post('nLongDec', TRUE);
		
		$datos = array(
			'vTitulo' => $vTitulo,
			'tDescripcion' => $vDescripcion,
			'iIdTema' => $iIdTema,
			'vUrlVideoExterno' => $vUrlVideoExterno,
			'iIdMunicpio' => $iIdMunicipio,
			'nLatDec' => $nLatDec,
			'nLongDec' => $nLongDec,
			'iEstatus' => 1,
			'iIdUsuario' => 1,
			'vCodigo' => 'PYUC-001'
		);

		$model = new M_propuestas();
		$query_prop = $model->inserta_propuesta($datos,'Propuesta');
		if($query_prop===false) echo "no funcionó";
		else echo $query_prop;
	}

	public function carga_temas()
	{
		$select = '<option value="0">Temas</option>';
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
}
