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
}
