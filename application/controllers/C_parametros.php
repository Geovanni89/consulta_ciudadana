<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_parametros extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->helper('url');
        $this->load->helper('Funciones');
        $this->load->model('M_seguridad','ms');
    }

    public function index_parametros()
    {
    	$query = $this->ms->consulta_valor_parametros();
    	if($query)
    	{
    		if($query ->num_rows() > 0)
    		{
	    		$query = $query->result();
	    		foreach ($query as $d)
	    		{
	    			$datos[$d->vId] = $d->vValor;
	    		}

	    		$this->load->view('parametros/modificar_parametros',$datos);
	    	}else echo '<p>No existen parámetros creados</p>';
    	}    	
    }

    public function guardar_parametros()
    {    	
    	if(isset($_POST) && !empty($_POST))
    	{

    		$con = $this->ms->iniciar_transaccion();

    		//	Fecha de inicio captura propuestas
    		$datos = array('vValor' => $this->input->post('INI_CAP_PRO') );
    		$where = array('vId' => 'INI_CAP_PRO' );

    		$aux = $this->ms->actualiza_registro('Parametro',$where,$datos,$con);

    		//	Fecha de fin captura propuestas
    		$datos = array('vValor' => $this->input->post('FIN_CAP_PRO') );
    		$where = array('vId' => 'FIN_CAP_PRO' );

    		$aux = $this->ms->actualiza_registro('Parametro',$where,$datos,$con);

    		//	Fecha de inicio integracion propuestas
    		$datos = array('vValor' => $this->input->post('INI_INT_PRO') );
    		$where = array('vId' => 'INI_INT_PRO' );

    		$aux = $this->ms->actualiza_registro('Parametro',$where,$datos,$con);

    		//	Fecha de fin integración propuestas
    		$datos = array('vValor' => $this->input->post('FIN_INT_PRO') );
    		$where = array('vId' => 'FIN_INT_PRO' );

    		$aux = $this->ms->actualiza_registro('Parametro',$where,$datos,$con);

    		if($this->ms->terminar_transaccion($con)) echo 0;
    		else echo 500;
    	}
    }
}
?>