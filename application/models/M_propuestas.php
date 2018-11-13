<?php
class M_propuestas extends CI_Model {


	function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default',TRUE);
	}

	public function datos_sectores($iIdSector=0)
	{
		$this->db->select('iIdSector,vSector');
		$this->db->from('Sector');
		if($iIdSector>0) $this->db->where('iIdSector',$iIdSector);
		$this->db->where('iActivo',1);

		$query = $this->db->get();

		if($query!=false) return $query->result();
		else return false;
	}

	public function datos_temas($id_sec=0,$iIdTema=0)
	{
		$this->db->select('iIdTema,vTema');
		$this->db->from('Tema');
		$this->db->where('iIdSector',$id_sec);
		if($iIdTema>0) $this->db->where('iIdTema',$iIdTema);
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

	public function inserta_propuesta($datos,$tabla,$codigo)
	{		
		$this->db->trans_begin();
		
		$query = $this->db->insert($tabla,$datos);
		$id = $this->db->insert_id();


		if($id<10) $data['vCodigo']=$codigo.'-000'.$id;
		elseif($id>=10 && $id<100) $data['vCodigo']=$codigo.'-00'.$id;
		elseif($id>=100 && $id<1000) $data['vCodigo']=$codigo.'-0'.$id;
		elseif($id>=1000) $data['vCodigo']=$codigo.$id;

		$this->db->where('iIdPropuesta',$id);
		$this->db->update('Propuesta',$data);


		if($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;		
		}
		else
		{
			$this->db->trans_commit();
			return $id;
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

	public function carga_propuestas($iIdPropuesta=0,$pagina=0,$lim=0)
	{
		$lim_inf = 5;
		$this->db->select('p.iIdPropuesta,p.vTitulo,p.tDescripcion,p.nLatDec,p.nLongDec,p.dFecha,u.iIdUsuario,u.vNombre,u.vApellidoPaterno,u.vApellidoMaterno,p.vCodigo');
		$this->db->from('Propuesta p');
		$this->db->join('Usuario u','p.iIdUsuario = u.iIdUsuario','INNER');
		$this->db->where('p.iEstatus',3);
		if($iIdPropuesta>0) $this->db->where('p.iIdPropuesta',$iIdPropuesta);
		$this->db->order_by('dFecha','DESC');

		if($lim==0)
		{
			$limit = $pagina*$lim_inf;
			$this->db->limit($lim_inf,$limit);					
		}
		elseif($lim > 0) $this->db->limit($lim);

		$query = $this->db->get();
		if($query!=false) return $query->result();
		else return false;
	}

	public function carga_comentarios($iIdPropuesta,$iIdComentario=0)
	{
		$this->db->select('(select count(c2."iIdComentario") from "Comentario" c2 where c2."iIdReplicaDe" = c."iIdComentario" and c2."iEstatus" > 1) as respuestas, cl.iLike,c.iIdComentario,c.vComentario,c.iIdPropuesta,c.iIdReplicaDe,c.dFecha,u.iIdUsuario,u.vNombre,u.vApellidoPaterno,u.vApellidoMaterno');
		$this->db->from('Comentario c');
		$this->db->join('Usuario u','c.iIdUsuario = u.iIdUsuario','INNER');
		$this->db->join('ComentarioLike cl','c.iIdComentario = cl.iIdCometario','LEFT');
		$this->db->where('c.iIdPropuesta',$iIdPropuesta);
		$this->db->where('c.iEstatus >',1);
		$this->db->where('c.iIdReplicaDe',0);

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

	public function carga_prop_admin($iIdTema)
	{
		$this->db->select('p.iIdPropuesta,p.vTitulo');
		$this->db->from('Propuesta p');
		$this->db->where('p.iEstatus>',1);
		$this->db->where('p.iIdTema',$iIdTema);
		$this->db->order_by('dFecha','DESC');

		$query = $this->db->get();
		if($query!=false) return $query->result();
		else return false;
	}

	public function carga_coment_admin($iIdPropuesta)
	{
		$this->db->select('iIdComentario,vComentario,dFecha');
		$this->db->from('Comentario');
		$this->db->where('iEstatus',1);
		$this->db->where('iIdPropuesta',$iIdPropuesta);

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

	public function total_propuestas()
	{
		$this->db->select('p.iIdPropuesta');
		$this->db->from('Propuesta p');
		$this->db->where('p.iEstatus',3);

		$query = $this->db->get();
		if($query!=false) return $query->num_rows();
		else return false;
	}

	public function ver_apoyo($iIdPropuesta,$iIdUsuario)
	{
		/*
		$this->db->select('iIdPropuesta,iIdUsuario');
		$this->db->from('PropuestaLike');
		$this->db->where('iIdPropuesta',$iIdPropuesta);
		$this->db->where('iIdUsuario',$iIdUsuario);
		*/

		$this->db->select('iIdPropuesta,iIdUsuario');
		$this->db->from('VotoPropuesta');
		$this->db->where('iIdPropuesta',$iIdPropuesta);
		$this->db->where('iIdUsuario',$iIdUsuario);

		$query = $this->db->get();
		if($query!=false) return $query->num_rows();
		else return false;
	}

	public function apoyar_propuesta($datos)
	{
		$this->db->trans_begin();
		//$query = $this->db->insert('PropuestaLike',$datos);
		$query = $this->db->insert('VotoPropuesta',$datos);
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

	public function guarda_comentario($datos)
	{
		$this->db->trans_begin();
		$query = $this->db->insert('Comentario',$datos);
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

	public function verifica_like($iIdUsuario,$iIdComentario)
	{
		$this->db->select('iIdCometario');
		$this->db->from('ComentarioLike');
		$this->db->where('iIdUsuario',$iIdUsuario);
		$this->db->where('iIdCometario',$iIdComentario);

		$query = $this->db->get();
		if($query!=false) return $query->num_rows();
		else return false;
	}

	public function guarda_like($datos,$op,$iIdUsuario,$iIdComentario)
	{
		$this->db->trans_begin();
		if($op=='update') 
		{
			$this->db->where('iIdUsuario',$iIdUsuario);
			$this->db->where('iIdCometario',$iIdComentario);
			$query = $this->db->update('ComentarioLike',$datos);
		}
		elseif($op=='insert') 
			$query = $this->db->insert('ComentarioLike',$datos);

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

	public function carga_respuestas($iIdComentario)
	{
		$this->db->select('(select count(c2."iIdComentario") from "Comentario" c2 where c2."iIdReplicaDe" = c."iIdComentario") as respuestas, cl.iLike,c.iIdComentario,c.vComentario,c.iIdPropuesta,c.iIdReplicaDe,c.dFecha,u.iIdUsuario,u.vNombre,u.vApellidoPaterno,u.vApellidoMaterno');
		$this->db->from('Comentario c');
		$this->db->join('Usuario u','c.iIdUsuario = u.iIdUsuario','INNER');
		$this->db->join('ComentarioLike cl','c.iIdComentario = cl.iIdCometario','LEFT');
		$this->db->where('c.iEstatus >',1);
		$this->db->where('c.iIdReplicaDe',$iIdComentario);

		$query = $this->db->get();
		if($query!=false) return $query->result();
		else return false;
	}

	public function actualiza_comentario($datos,$idcoment)
	{
		$this->db->trans_begin();
		$this->db->where('iIdComentario',$idcoment);
		$query = $this->db->update('Comentario',$datos);

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

	public function datos_correo($idcoment)
	{
		$this->db->select('c.vComentario,c.dFecha,p.vTitulo,p.vCodigo,u.iIdUsuario,u.vNombre,u.vApellidoPaterno,u.vApellidoMaterno,u.vCorreo');
		$this->db->from('Comentario c');
		$this->db->join('Propuesta p','c.iIdPropuesta = p.iIdPropuesta','INNER');
		$this->db->join('Usuario u','c.iIdUsuario = u.iIdUsuario','INNER');
		$this->db->where('c.iIdComentario',$idcoment);

		$query = $this->db->get();
		if($query!=false) return $query->result();
		else return false;
	}
}

?>