<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_propuestas extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        //$this->load->model('M_prueba');
    }

	public function propuesta_sim()
	{
		$this->load->view('propuesta_simple');
	}

	public function captura_propuesta()
	{
		$titulo = $this->input->post('titulo', TRUE);
		$descripcion = $this->input->post('descripcion', TRUE);
		$video_url = $this->input->post('video_url', TRUE);
		$id_municipio = $this->input->post('id_municipio', TRUE);
		$punto_x = $this->input->post('punto_x', TRUE);
		$punto_y = $this->input->post('punto_y', TRUE);

		$array = array(
			'titulo' => $titulo,
			'descripcion' => $descripcion,
			'video_url' => $video_url,
			'id_municipio' => $id_municipio,
			'punto_x' => $punto_x,
			'punto_y' => $punto_y
		);

		print_r($array);
	}
}
