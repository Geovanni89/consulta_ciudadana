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


}

?>