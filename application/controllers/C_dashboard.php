<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dashboard extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->helper('url');
        //$this->load->helper('Funciones');        
        $this->load->model('M_dashboard');
    }

    public function index()
    {
    	$md = new M_dashboard();

    	$datos['comentarios'] = $md->comentarior_mejor_valorados(5);

    	$this->load->view('dashboard/index',$datos);
    }

}
?>