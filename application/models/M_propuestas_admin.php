<?php
class M_propuestas_admin extends CI_Model {


	function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default',TRUE);
	}


	public function carga_propuestas_admin($where='',$palabra='')
	{
		$this->db->select('p.iIdPropuesta,p.vTitulo,p.tDescripcion, p.vUrlVideoExterno, p.nLatDec,p.nLongDec,p.dFecha,u.iIdUsuario,u.vNombre,u.vApellidoPaterno,u.vApellidoMaterno,p.vCodigo, p.iEstatus');
		$this->db->select('r.vRol, u.vCorreo, s.iIdSector, p.iIdTema, p.iIdMunicipio');
		$this->db->from('Propuesta p');
		$this->db->join('Usuario u','p.iIdUsuario = u.iIdUsuario','INNER');
		$this->db->join('Rol r','r.iIdRol = u.iIdRol','INNER');
		$this->db->join('Tema t','t.iIdTema = p.iIdTema','INNER');
		$this->db->join('Sector s','s.iIdSector = t.iIdSector','INNER');
		
		if($where != '') $this->db->where($where);
		if($palabra != '') $this->db->where('p."vTitulo" ILIKE \'%'.$palabra.'%\'');
		//if($palabra != '') $this->db->ilike("p.vTitulo",$palabra);
		$this->db->order_by('p.dFecha','DESC');		

		$query = $this->db->get();
		$_SESSION['consultap'] = $this->db->last_query();
		return $query;
	}

	public function consulta_propuestas_array($array)
	{
		$this->db->select('p.iIdPropuesta,p.vTitulo,u.iIdUsuario,u.vNombre,u.vApellidoPaterno,u.vApellidoMaterno, u.vCorreo, p.vCodigo');
		$this->db->from('Propuesta p');
		$this->db->join('Usuario u','p.iIdUsuario = u.iIdUsuario','INNER');
		
		
		$this->db->where_in('p.iIdPropuesta',$array);

		$query = $this->db->get();
		$_SESSION['consultap'] = $this->db->last_query();
		return $query;
	} 


	public function consulta_propuestas_integradas($iIdPropuesta)
	{
		$this->db->select('p.iIdPropuesta, p.vTitulo, u.vCorreo, p.vCodigo');
		$this->db->from('PropuestaOrigen po');
		$this->db->join('Propuesta p','p.iIdPropuesta = po.iIdPropuestaOrigen','INNER');
		$this->db->join('Usuario u','u.iIdUsuario = p.iIdUsuario','INNER');
		
		$this->db->where('po.iIdPropuesta',$iIdPropuesta);

		$query = $this->db->get();
		$_SESSION['consultap'] = $this->db->last_query();
		return $query;
	} 

	function datos_autor($iIdPropuesta)
	{
		$this->db->select('u.vCorreo, u.vNombre, u.vApellidoPaterno, u.vApellidoMaterno, p.vTitulo, p.vCodigo');
		$this->db->from('Propuesta p');
		$this->db->join('Usuario u','u.iIdUsuario = p.iIdUsuario','INNER');
		
		$this->db->where('p.iIdPropuesta',$iIdPropuesta);

		$query = $this->db->get()->row();
		return $query;
	}

	function datos_adjuntos($iIdPropuesta,$tipo='')
	{
		$this->db->select('pa.iIdPropuestaAdjunto, pa.vNombreAdjunto, pa.vRutaAdjunto, pa.iTipo');
		$this->db->from('PropuestaAdjunto pa');
		$this->db->where('iActivo',1);
		
		$this->db->where('pa.iIdPropuesta',$iIdPropuesta);
		if($tipo != '') $this->db->where('pa.iTipo',$tipo);

		$query = $this->db->get();
		return $query;
	}

	function devuelve_adjunto($iIdPropuestaAdjunto)
	{
		$this->db->select('pa.iIdPropuestaAdjunto, pa.vNombreAdjunto, pa.vRutaAdjunto, pa.iTipo');
		$this->db->from('PropuestaAdjunto pa');
		
		$this->db->where('pa.iIdPropuestaAdjunto',$iIdPropuestaAdjunto);

		$query = $this->db->get()->row();
		return $query;	
	}

	function devuelve_num_adjuntos($iIdPropuesta,$tipo)
	{
		$this->db->select('COUNT(pa."iIdPropuestaAdjunto") AS num',false);
		$this->db->from('PropuestaAdjunto pa');
		$this->db->where('pa.iTipo',$tipo);
		$this->db->where('pa.iIdPropuesta',$iIdPropuesta);

		$query = $this->db->get()->row()->num;
		return $query;	
	}

	function valor_parametro($vId)
	{
		$this->db->select('vValor');
		$this->db->from('Parametro');
		$this->db->where('vId',$vId);

		$query = $this->db->get()->row()->vValor;
		return $query;		
	}
}
?>
