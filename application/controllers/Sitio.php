<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sitio extends CI_Controller {

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
        $this->load->helper('url');
        $this->load->model('M_prueba');
    }

    
	public function index()
	{
		$this->load->view('index');
	}

	public function propuestas()
	{
		$this->load->view('propuestas');
	}

	public function form_propuesta()
	{
		$this->load->view('form_propuesta');
	}

	public function test()
	{
		$prueba = new M_prueba();
		$datos['prueba'] = $prueba->datos_tabla();
		$this->load->view('test',$datos);
	}

	public function login()
	{
		$this->load->view('login');
	}
}
