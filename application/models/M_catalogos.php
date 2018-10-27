<?php
class M_catalogos extends CI_Model {


	function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default',TRUE);
	}

	public function datos_grados_estudio($where='')
	{
		$this->db->select('iIdGradoEstudio, vGradoEstudio');
		$this->db->from('GradoEstudio');
		$this->db->where('iActivo',1);

		if($where != '') $this->db->where($where);

		$query = $this->db->get();

		return $query;
	}

	public function datos_ocupaciones($where='')
	{
		$this->db->select('iIdOcupacion,vOcupacion');
		$this->db->from('Ocupacion');
		$this->db->where('iActivo',1);
		$this->db->order_by('vOcupacion');

		if($where != '') $this->db->where($where);

		$query = $this->db->get();

		return $query;
	}
}

?>