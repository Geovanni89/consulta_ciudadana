<?php
class M_prueba extends CI_Model {


	function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default',TRUE);
		
	}

	public function datos_tabla()
	{
		
		
	}
}


