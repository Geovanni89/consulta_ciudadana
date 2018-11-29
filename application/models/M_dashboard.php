<?php
class M_dashboard extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default',TRUE);
	}

	function comentarior_mejor_valorados($limit=5)
	{
		$sql = 'SELECT c."iIdComentario", c."vComentario", u."vNombre", likes.n
				FROM "Comentario" c
				INNER JOIN (SELECT "iIdCometario", COUNT("iIdCometario") As n
										FROM "ComentarioLike" 
										WHERE "iLike" = 1
										GROUP BY "iIdCometario") AS likes ON likes."iIdCometario" = c."iIdComentario"
				INNER JOIN "Usuario" u ON u."iIdUsuario" = c."iIdUsuario"
				WHERE c."iEstatus" = 2
				ORDER BY likes.n DESC
				LIMIT '.$limit;
		return $this->db->query($sql);
	}

}
?>