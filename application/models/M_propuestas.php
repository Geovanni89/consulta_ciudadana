<?php
class M_propuestas extends CI_Model {


	function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default',TRUE);
	}

	public function datos_sectores()
	{
		$this->db->select('iIdSector,vSector');
		$this->db->from('Sector');
		$this->db->where('iActivo',1);

		$query = $this->db->get();

		if($query!=false) return $query->result();
		else return false;
	}

	public function datos_temas($id_sec)
	{
		$this->db->select('iIdTema,vTema');
		$this->db->from('Tema');
		$this->db->where('iIdSector',$id_sec);
		$this->db->where('iActivo',1);

		$query = $this->db->get();
		if($query!=false) return $query->result();
		else return false;
	}

	public function datos_municipios()
	{
		$this->db->select('iIdMunicipio,vMunicipio');
		$this->db->from('Municipio');
		$this->db->where('iActivo',1);

		$query = $this->db->get();
		if($query!=false) return $query->result();
		else return false;
	}

	public function inserta_propuesta($datos,$tabla)
	{
		$this->db->trans_begin();
		
		$query = $this->db->insert($tabla,$datos);

		if($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;		
		}
		else
		{
			$this->db->trans_commit();
			return $this->db->insert_id();			
		}		
	}

	public function inserta_adjuntos($datos) 
	{
		$this->db->trans_begin();
		$query = $this->db->insert('PropuestaAdjunto',$datos);
		if($this->db->trans_status() === FALSE) 
		{
			$this->db->trans_rollback();
			return false;
		}
		else 
		{
			$this->db->trans_commit();
			return true;
		}
	}
}

?>