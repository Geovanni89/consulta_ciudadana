<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_propuestas extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('M_propuestas');
        $this->load->library('Class_propuestas');
    }

	public function propuesta_sim()
	{
		$iIdPropuesta = $this->input->post('iIdPropuesta', TRUE);
		$model = new M_propuestas();
		$query_prop = $model->carga_propuestas($iIdPropuesta);
		if($query_prop!=false) 
		{
			$datos['vTitulo'] = $query_prop[0]->vTitulo;
			$datos['tDescripcion'] = $query_prop[0]->tDescripcion;
			$datos['nLatDec'] = $query_prop[0]->nLatDec;
			$datos['nLongDec'] = $query_prop[0]->nLongDec;
			$datos['vNombre'] = $query_prop[0]->vNombre;
			$datos['vApellidoPaterno'] = $query_prop[0]->vApellidoPaterno;
			$datos['vApellidoMaterno'] = $query_prop[0]->vApellidoMaterno;
			$datos['img'] = $model->carga_adjuntos($iIdPropuesta,1);
			$datos['pdf'] = $model->carga_adjuntos($iIdPropuesta,2);
			$this->load->view('propuesta_simple',$datos);
		} 
		else echo "error";
	}

	public function captura_propuesta()
	{

		$vTitulo = $this->input->post('vTitulo', TRUE);
		$descrip64 = $this->input->post('vDescripcion', TRUE);
		$iIdSector = $this->input->post('iIdSector', TRUE);
		$iIdTema = $this->input->post('iIdTema', TRUE);
		$vUrlVideoExterno = $this->input->post('vUrlVideoExterno', TRUE);
		$iIdMunicipio = $this->input->post('iIdMunicipio', TRUE);
		$nLatDec = $this->input->post('nLatDec', TRUE);
		$nLongDec = $this->input->post('nLongDec', TRUE);
		$imagenes = $this->input->post('adjuntoFotos', TRUE);
		$archivos = $this->input->post('adjuntoArchivos', TRUE);
		$ambitoMed = $this->input->post('ambitoMed', TRUE);

		$vDescripcion = base64_decode($descrip64);


		$vCodigo = 'PYUC-0'.$iIdSector;
		if($iIdTema>=10) $vCodigo.= $iIdTema;
		else $vCodigo.= '0'.$iIdTema;
		
		$datos = array(
			'vTitulo' => $vTitulo,
			'tDescripcion' => $vDescripcion,
			'iIdTema' => $iIdTema,
			'vUrlVideoExterno' => $vUrlVideoExterno,
			'iEstatus' => 1,
			'iIdUsuario' => 1,
			'vCodigo' => $vCodigo
		);

		if($ambitoMed=="on") 
		{
			$datos['iIdMunicpio'] = 0;
		}
		else
		{
			$datos['iIdMunicpio'] = $iIdMunicipio;
			$datos['nLatDec'] = $nLatDec;
			$datos['nLongDec'] = $nLongDec;
		}

		$model = new M_propuestas();
		$query_prop = $model->inserta_propuesta($datos,'Propuesta');
		if($query_prop===false) echo 0;
		else echo $query_prop;
		
	}

	public function carga_temas()
	{
		$select = '<option value="">Temas</option>';
		$id_sec = $this->input->post('id', TRUE);
		$model = new M_propuestas();
		$query_tem = $model->datos_temas($id_sec);
		if($query_tem!=false)
		{
			foreach ($query_tem as $tema) {
				$select .= '<option value="'.$tema->iIdTema.'">'.$tema->vTema.'</option>';
			}
		}
		echo $select;
	}

	public function pagina_prop()
	{
		$pagina = $this->input->post('pagina', TRUE);
		$prop = new Class_propuestas();
		$propuestas = $prop->carga_propuestas($pagina);
		echo $propuestas;
	}

	public function subir()
	{
		
		$op = $this->input->get('op', TRUE);
		$iIdPropuesta = $this->input->post('iIdPropuesta', TRUE);		
		$ruta = 'archivos/';
		$tArchivos = 0;
		$dFecha = $today = date("Y-m-d H:i:s");
		
		if($op==1)
		{
			$ruta.='imagenes/';
			$tArchivos = count($_FILES["adjuntoFotos"]["name"]);
		}
		elseif($op==2)
		{
			$ruta.='pdf/';
			$tArchivos = count($_FILES["adjuntoArchivos"]["name"]);
		}

		for ($i=0; $i < $tArchivos; $i++) 
		{
			if($op==1)
			{
				$vNombreAdjunto = $_FILES["adjuntoFotos"]["name"][$i];
				$nombreTemp = $_FILES["adjuntoFotos"]["tmp_name"][$i];
				$nombreArch = 'IMG_'.($i+1).'_'.$iIdPropuesta;
				$tipo=1;
			}
			elseif($op==2)
			{				
				$vNombreAdjunto = $_FILES["adjuntoArchivos"]["name"][$i];
				$nombreTemp = $_FILES["adjuntoArchivos"]["tmp_name"][$i];	
				$nombreArch = 'PDF_'.($i+1).'_'.$iIdPropuesta;
				$tipo=2;
			}

			$resto = explode(".", $vNombreAdjunto); 
			$extension = end($resto);
			$nombreArch.='.'.$extension;

			$vRutaAdjunto = $ruta.$nombreArch;

			$datos = array(
						'vNombreAdjunto' => $vNombreAdjunto,
						'vRutaAdjunto' => $vRutaAdjunto,
						'iTipo' => $tipo,
						'vExtension' => $extension,
						'dFecha' => $dFecha,
						'iIdPropuesta' => $iIdPropuesta
			);

			

			$modal = new M_propuestas();
			$query_adj = $modal->inserta_adjuntos($datos);
			if($query_adj===true)
			{
			
				move_uploaded_file($nombreTemp, $vRutaAdjunto);
				
				//$infoImagenesSubidas[$i]=array("caption"=>"$nombreArch","height"=>"120px","url"=>"C_propuestas/borrar","key"=>$nombreArch);		

				$arr = array("file_id"=>0,"overwriteInitial"=>true);
				echo json_encode($arr);		
			}
		}
	}
	
}
