<?php
class M_votacion extends CI_Model {


	function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default',TRUE);
	}

	public function carga_propuestas()
	{
		$this->db->select('p.iIdPropuesta,p.vTitulo,p.tDescripcion,p.nLatDec,p.nLongDec,p.dFecha,u.iIdUsuario,u.vNombre,u.vApellidoPaterno,u.vApellidoMaterno,p.vCodigo');
		$this->db->from('Propuesta p');
		$this->db->join('Usuario u','p.iIdUsuario = u.iIdUsuario','INNER');
		$this->db->where('p.iEstatus',3);
		$this->db->order_by('dFecha','DESC');

		$query = $this->db->get();
		if($query!=false) return $query->result();
		else return false;
	}

	public function carga_adjuntos($iIdPropuesta,$tipo)
	{
		$this->db->select('vRutaAdjunto,vNombreAdjunto,dFecha');
		$this->db->from('PropuestaAdjunto');
		$this->db->where('iIdPropuesta',$iIdPropuesta);
		$this->db->where('iTipo',$tipo);
		$this->db->order_by('dFecha','ASC');

		$query = $this->db->get();
		if($query!=false) return $query->result();
		else return false;		
	}

	public function total_comentarios($iIdPropuesta)
	{
		$this->db->select('iIdComentario');
		$this->db->from('Comentario');
		$this->db->where('iIdPropuesta',$iIdPropuesta);
		$this->db->where('iEstatus',2);

		$query = $this->db->get();
		if($query!=false) return $query->num_rows();
		else return false;
	}
}

?>