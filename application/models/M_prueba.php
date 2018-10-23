<?php
class M_prueba extends CI_Model {


	function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default',TRUE);
		
	}

	public function datos_tabla()
	{
		$this->db->select('id,clave_inegi,municipio');
		$this->db->from('municipios');
		$query = $this->db->get();

		if($query->result()!=false) return $query->result();
		else return false;
	}
}


