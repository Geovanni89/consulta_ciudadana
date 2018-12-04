<?php
class M_presupuesto extends CI_Model {


	function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default',TRUE);
	}	

	public function guarda_presupuesto($datos)
	{
		$this->db->trans_begin();
		
		$query = $this->db->insert('PresupuestoUsuario',$datos);		


		if($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;		
		}
		else
		{
			$this->db->trans_commit();
			return $query;
		}	
	}

	public function pres_ususario($iIdUsuario)
	{
		$this->db->select('iIdUsuario');
		$this->db->from('PresupuestoUsuario');
		$this->db->where('iIdUsuario',$iIdUsuario);

		$query = $this->db->get();
		if($query!=false) return $query->num_rows();
		else return false;
	}

	public function propuestas_tema()
	{
		/*
		select t."iIdTema", t."vTema", t."iIdSector", (select count(p."iIdPropuesta")
		from "Propuesta" p
		where p."iEstatus" = 3
		and p."iIdTema" = t."iIdTema") as total_propuestas
		from "Tema" t;
		*/

		//$this->db->select('t.iIdTema, t.vTema, t.iIdSector, (select count(p."iIdPropuesta") from "Propuesta" p where p."iEstatus" = 1 and p."iIdTema" = t."iIdTema") as total_propuestas');
		$this->db->select('t.iIdTema, t.vTema, t.iIdSector, (select count(p."iIdPropuesta") from "Propuesta" p where p."iIdTema" = t."iIdTema") as total_propuestas');
		$this->db->from('Tema t');
		$this->db->where('t.iActivo',1);
		$this->db->order_by('t.iIdTema','ASC');

		$query = $this->db->get();
		if($query!=false) return $query->result();
		else return false;
	}


}

?>