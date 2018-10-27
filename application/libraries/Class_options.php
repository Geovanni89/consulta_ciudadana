<?php if (!defined('BASEPATH')) exit('No permitir el acceso directo al script');

class Class_options {

    function __construct()
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        $CI->load->helper('Funciones');        
        $CI->load->model('M_catalogos'); 
    }

    function options_grados_estudio($seleccionado="", $opcion0="")
    { 
        $model = new M_catalogos();
        $select = '';

        $query = $model->datos_grados_estudio();

        if($query != false)
        {            
            if($opcion0 != '')
            {
                if($seleccionado == 0) $select .="<option value=\"0\" selected>$opcion0</option>";
                else $select .="<option value=\"0\">$opcion0</option>";
            }
            
            $query = $query->result();
            foreach ($query as $e)
            {
                $selected = ($e->iIdGradoEstudio == $seleccionado) ? 'selected':'';
                $select .= '<option value="'.$e->iIdGradoEstudio.'" '.$selected.'>'.$e->vGradoEstudio.'</option>';
            }
        }

        return $select;
    }

    function options_ocupaciones($seleccionado="", $opcion0="")
    { 
        $model = new M_catalogos();
        $select = '';
                
        $query = $model->datos_ocupaciones();

        if($query != false)
        {            
            if($opcion0 != '')
            {
                if($seleccionado == 0) $select .="<option value=\"0\" selected>$opcion0</option>";
                else $select .="<option value=\"0\">$opcion0</option>";
            }
            
            $query = $query->result();
            foreach ($query as $e)
            {
                $selected = ($e->iIdOcupacion == $seleccionado) ? 'selected':'';
                $select .= '<option value="'.$e->iIdOcupacion.'" '.$selected.'>'.$e->vOcupacion.'</option>';
            }
        }

        return $select;
    }
   
}