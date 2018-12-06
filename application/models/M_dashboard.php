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

	function propuestas_puntos()
	{
		$sql = 'SELECT p."iIdPropuesta",p."vTitulo", p."tDescripcion", p."nLatDec", p."nLongDec", p."iEstatus", 
				COALESCE((SELECT pa."vRutaAdjunto" FROM "PropuestaAdjunto" pa WHERE pa."iIdPropuesta" = p."iIdPropuesta" AND pa."iTipo" = 1 LIMIT 1),\' \') as ruta
				FROM "Propuesta" p
				WHERE "iEstatus" != 0 AND "iIdMunicipio" > 0';
		return $this->db->query($sql);
	}

	function ConsultaAvancesPorMunicipio()
	{
		$sql = 'SELECT m."vMunicipio" municipio, t.avance, m."iIdMunicipio" municipioid, l."nLatDec" lat, l."nLongDec" lng
				FROM "Municipio" m
				INNER JOIN (SELECT COUNT(p."iIdPropuesta") as avance, p."iIdMunicipio"
										FROM "Propuesta" p
										WHERE p."iEstatus" != 0 AND p."iIdMunicipio" > 0
										GROUP BY p."iIdMunicipio") AS t ON t."iIdMunicipio" = m."iIdMunicipio"
				INNER JOIN "Localidad" l on l."iIdMunicipio" = m."iIdMunicipio" AND l."vClaveInegi" = \'0001\'';
		return $this->db->query($sql);
	}

}
?>