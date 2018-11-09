<?php if (!defined('BASEPATH')) exit('No permitir el acceso directo al script');

class Class_votacion {

    function __construct()
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        //$CI->load->helper('Funciones');    
        $CI->load->model('M_votacion'); 
    }

    function carga_propuestas()
    {

        $propuestas = "";
        $model = new M_votacion();
        $vota = $model->carga_propuestas();
        if($vota!=false)
        {
            foreach ($vota as $vres) {
                $fecha = new DateTime($vres->dFecha);
                
                $query_img = $model->carga_adjuntos($vres->iIdPropuesta,1);
                $total_coment = $model->total_comentarios($vres->iIdPropuesta);

                if(isset($query_img[0])) $urlImg = $query_img[0]->vRutaAdjunto;
                else $urlImg = "public/images/blog/small/17.jpg";

                $propuestas.='<div class="entry clearfix">
                    <div class="entry-image">
                        <a href="'.base_url().$urlImg.'" data-lightbox="image"><img class="image_fade" src="'.base_url().$urlImg.'" alt="Standard Post with Image"></a>
                    </div>
                    <div class="entry-title">
                        <h2><a target="_blank" href="'.base_url().'C_propuestas/propuesta_sim?id='.$vres->iIdPropuesta.'">'.$vres->vTitulo.'</a></h2>
                    </div>
                    <ul class="entry-meta clearfix">
                        <li><i class="icon-calendar3"></i>'.date_format($fecha,'d/m/Y').'</li>
                        <li><a href="#"><i class="icon-comments"></i> '.$total_coment.'</a></li>
                    </ul>
                    <div class="entry-content">
                        <p>'.$vres->tDescripcion.'</p>
                        <a href="Javascript:" class="btn btn-success">Votar</a>
                    </div>
                </div>';  
            }
        }
         
        return $propuestas;
    }       
}