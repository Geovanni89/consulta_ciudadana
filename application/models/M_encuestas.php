<?php
class M_encuestas extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default',TRUE);
	}

	public function trae_encuesta($vTabla,$iIdTabla)
	{
		$this->db->select('iIdEncuesta,vTitulo, vTabla');
		$this->db->from('Encuesta');
		$this->db->where('vTabla',$vTabla);
		$this->db->where('iIdTabla',$iIdTabla);

		$this->db->where('iActivo',1);


		return $this->db->get()->row();
	}

	public function trae_preguntas($iIdEncuesta)
	{
		$this->db->select('iIdPregunta, vPregunta, iTipo,iOrden');
		$this->db->from('Pregunta');
		$this->db->where('iIdEncuesta',$iIdEncuesta);

		$this->db->where('iActivo',1);
		$this->db->order_by('iOrden','ASC');


		return $this->db->get();
	}

	public function trae_respuestas($iIdPregunta,$iIdUsuario=0)
	{
		$this->db->select('r.iIdRespuesta, r.vRespuesta, r.iTipoElemento, r.iOrden');
		$this->db->select('COALESCE(ur."vRespuesta",\' \') AS resp_us',FALSE);
		$this->db->from('Respuesta r');
		$this->db->join('UsuarioRespuesta ur','ur.iIdRespuesta = r.iIdRespuesta AND ur.iIdUsuario = '.$iIdUsuario,'LEFT OUTER');
		$this->db->where('iIdPregunta',$iIdPregunta);
		$this->db->where('iActivo',1);
		$this->db->order_by('iOrden','ASC');


		return $this->db->get();
	}

}
?>