<?php
class M_seguridad extends CI_Model {


	function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default',TRUE);
	}

	public function consulta_existe_usuario($where='')
	{
		$this->db->select('u.id AS id_usuario, u.nombre, u.apellido_paterno, u.apellido_materno, u.correo',FALSE);
		$this->db->select('r.id AS id_rol, r.rol',FALSE);
		$this->db->from('usuarios u');
		$this->db->join('roles r','r.id = u.id_rol','INNER');
		$this->db->where('u.estatus',2);

		if($where != '') $this->db->where($where);

		$query = $this->db->get();
		$_SESSION['consulta'] = $this->db->last_query();

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