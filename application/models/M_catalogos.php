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

	public function datos_municipios($where='')
	{
		$this->db->select('iIdMunicipio,vMunicipio');
		$this->db->from('Municipio');
		$this->db->where('iActivo',1);
		$this->db->order_by('vMunicipio');

		if($where != '') $this->db->where($where);

		$query = $this->db->get();

		return $query;
	}

	public function datos_localidades($where='')
	{
		$this->db->select('iIdLocalidad,vLocalidad');
		$this->db->from('Localidad');
		$this->db->where('iActivo',1);
		$this->db->order_by('vLocalidad');

		if($where != '') $this->db->where($where);

		$query = $this->db->get();

		return $query;
	}

	public function datos_asentamientos($where='')
	{
		$this->db->select('iIdAsentamiento,vAsentamiento,iCodigoPostal');
		$this->db->from('Asentamiento');
		$this->db->where('iActivo',1);
		$this->db->order_by('vAsentamiento');

		if($where != '') $this->db->where($where);

		$query = $this->db->get();

		return $query;
	}

	public function devulve_municipio_localidad($idasentamiento)
	{
		$this->db->select('a.iIdAsentamiento, l.vLocalidad, m.vMunicipio');
		$this->db->from('Asentamiento a');
		$this->db->join('Localidad l','l.iIdLocalidad = a.iIdLocalidad','INNER');
		$this->db->join('Municipio m','m.iIdMunicipio = l.iIdMunicipio','INNER');
		$this->db->where('a.iActivo',1);
		$this->db->where('a.iIdAsentamiento',$idasentamiento);

		$query = $this->db->get();

		$_SESSION['c'] = $this->db->last_query();

		return $query;
	}


	public function datos_sectores($where='')
	{
		$this->db->select('iIdSector,vSector');
		$this->db->from('Sector');
		$this->db->where('iActivo',1);

		if($where != '') $this->db->where($where);

		$query = $this->db->get();

		return $query;
	}

	public function devuelve_temas_por_sector($id)
	{
		$this->db->select('a.iIdTema, a.vTema');
		$this->db->from('Tema a');
		$this->db->join('Sector l','l.iIdSector = a.iIdSector','INNER');
		$this->db->where('a.iActivo',1);
		$this->db->where('a.iIdSector',$id);

		$query = $this->db->get();

		//$_SESSION['c'] = $this->db->last_query();

		return $query;
	}

	public function datos_roles($where='')
	{
		$this->db->select('iIdRol,vRol');
		$this->db->from('Rol');
		$this->db->where('iActivo',1);

		if($where != '') $this->db->where($where);

		$query = $this->db->get();

		return $query;
	}

}

?>