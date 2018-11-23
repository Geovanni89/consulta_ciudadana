<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_presupuesto extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->helper('url');
        $this->load->model('M_propuestas');
        $this->load->library('Class_propuestas');
        $this->load->library('Class_mail');

    }
	
	public function envia_temas()
	{
		$temas = $this->input->post('temas', TRUE);
		foreach ($temas as $key => $value) {
			echo 'key: '.$key.'<br>value: '.$value;
		}
	}
}
