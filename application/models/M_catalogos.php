<?php
class M_catalogos extends CI_Model {


	function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default',TRUE);
	}

	public function datos_grados_estudio($where='')
	{
		$this->db->select('id,grado_estudio');
		$this->db->from('grados_estudio');
		$this->db->where('activo',1);

		if($where != '') $this->db->where($where);

		$query = $this->db->get();

		return $query;
	}

	public function datos_ocupaciones($where='')
	{
		$this->db->select('id,ocupacion');
		$this->db->from('ocupaciones_sinco_2011');
		$this->db->where('activo',1);

		if($where != '') $this->db->where($where);

		$query = $this->db->get();

		return $query;
	}
}

?>