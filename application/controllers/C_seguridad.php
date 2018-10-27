<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_seguridad extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->helper('url');
        $this->load->model('M_seguridad');
    }

    public function guardar_usuario()
    {
    	if(isset($_POST) && !empty($_POST))
    	{
    		//	Datos del usuario
    		$id = 0;
    		$d_usuario = array(
    			'nombre' => $this->input->post('nombre'),
    			'apellido_paterno' => $this->input->post('apellido_paterno'),
    			'apellido_materno' => $this->input->post('apellido_materno'),
    			'fecha_nacimiento' => $this->input->post('fecha_nacimiento'),
    			'genero' => $this->input->post('genero'),
    			'id_grado_estudio' => $this->input->post('id_grado_estudio'),
    			'id_ocupacion' => $this->input->post('id_ocupacion'),
    			'correo' => $this->input->post('correo'),
    			'registrado_con' => 1,
    			'id_asentamiento' => $this->input->post('id_asentamiento'),
    			'id_rol' => $this->input->post('id_rol')
    		);

    		if(isset($_POST['id']) && !empty($_POST['id']))
    		{
    			//	Modificación

    		}
    		else
    		{
    			//	Registro de usuario
    			$d_usuario['registrado_con'] = 1;
    			$d_usuario['fecha_registro'] = date('Y-m-d H:i:s');
    			$d_usuario['contrasenia'] = $this->input->post('contrasenia');
    			$d_usuario['estatus'] = 1;	//	Pendiente de confirmación

    			//	Sólo cuando el administrador da de alta al usuario
    			if(isset($_SESSION[PREFIJO.'_id_rol']))
	    		{
	    			if($_SESSION[PREFIJO.'_id_rol'] == 1)
	    			{
	    				$d_usuario['registrado_con'] = 1;
	    			}
	    		}
	    		else
	    		{
	    			//	Registro del ciudadano
	    			$d_usuario['id_rol'] = 2;	// Rol de ciudadano
	    		}

    		}

    		

    		
    		
    	}
    }

}
