<?php
class M_propuestas extends CI_Model {


	function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default',TRUE);
	}

	public function datos_temas()
	{
		$this->db->select('');
		$this->db->from('');
		$this->db->where('activo',1);

		$query = $this->db->get();

		return $query;
	}

	public function datos_municipios()
	{
		$this->db->select('id,municipio');
		$this->db->from('municipios');
		$this->db->where('activo',1);

		$query = $this->db->get();
		if($query!=false) return $query->result();
		else return false;

	}
}

?>