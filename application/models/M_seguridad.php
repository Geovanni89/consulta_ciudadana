<?php
class M_seguridad extends CI_Model {


	function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default',TRUE);
	}

	/*	Funciones para usar transacciones
	======================================
	*/
	public function iniciar_transaccion()
	{
	  $con = $this->load->database('default',TRUE);
	  $con->trans_begin();
	  return  $con;
	}

	public function terminar_transaccion($con)
	{
		if ($con->trans_status() === FALSE)
		{
			$con->trans_rollback();
			return false;
		}
		else 
		{
			$con->trans_commit();
			return true;
		}
	}

	public function inserta_registro($tabla,$datos,$con)
	{
	if($con->insert($tabla,$datos)) return $con->insert_id();
	else return false;
	}

	public function actualiza_registro($tabla,$where,$datos,$con)
	{
	$con->where($where);
		return $con->update($tabla, $datos);
	}

	public function elimina_registro($tabla,$where,$con)
	{
	return $con->delete($tabla,$where);
	}

	/*	Funciones para usar transacciones
	======================================
	*/

	public function consulta_existe_usuario($where='')
	{
		$this->db->select('u.iIdUsuario AS idusuario, u.vNombre, u.vApellidoPaterno, u.vApellidoMaterno, u.vCorreo');
		$this->db->select('r.iIdRol AS idrol, r.vRol');
		$this->db->from('Usuario u');
		$this->db->join('Rol r','r.iIdRol = u.iIdRol','INNER');
		$this->db->where('u.iEstatus',2);

		if($where != '') $this->db->where($where);

		$query = $this->db->get();
		$_SESSION['consulta'] = $this->db->last_query();

		return $query;
	}

	public function traer_menu_sistema($idusuario=0, $idpadre=0)
	{	
		$sql = "SELECT * 
				FROM ((SELECT p.\"iIdPermiso\", p.\"vPermiso\", p.\"vImagen\", up.\"iTipoAcceso\", p.\"vUrl\", p.\"iOrden\"
						FROM \"Permiso\" p
						INNER JOIN \"UsuarioPermiso\" up ON up.\"iIdPermiso\" = p.\"iIdPermiso\" AND up.\"iIdUsuario\" = '$idusuario' AND p.\"iIdPermisoPadre\" = '$idpadre' AND p.\"iTipo\" = 1)
				UNION
					(SELECT p.\"iIdPermiso\", p.\"vPermiso\", p.\"vImagen\", rp.\"iTipoAcceso\", p.\"vUrl\", p.\"iOrden\"
						FROM \"Permiso\" p
						INNER JOIN \"RolPermiso\" rp ON rp.\"iIdPermiso\" = p.\"iIdPermiso\"
						INNER JOIN \"Usuario\" u ON u.\"iIdRol\" = rp.\"iIdRol\"
					WHERE u.\"iIdUsuario\" = '$idusuario' AND p.\"iIdPermisoPadre\" = '$idpadre' AND p.\"iTipo\" = 1)) t
				ORDER BY t.\"iOrden\" ASC";
		return $this->db->query($sql);
	}
	
}

?>