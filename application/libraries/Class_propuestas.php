<?php if (!defined('BASEPATH')) exit('No permitir el acceso directo al script');

class Class_propuestas {

    function __construct()
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        //$CI->load->helper('Funciones');    
        $CI->load->model('M_propuestas'); 
    }

    function carga_propuestas($pagina=0)
    {
        $propuestas = "";
        $model = new M_propuestas();
        $query_prop = $model->carga_propuestas(0,$pagina);
        if($query_prop!=false)
        {            

            foreach ($query_prop as $vprop) {
                $fecha = new DateTime($vprop->dFecha);
                $query_img = $model->carga_adjuntos($vprop->iIdPropuesta,1);
                if(isset($query_img[0])) $urlImg = $query_img[0]->vRutaAdjunto;
                else $urlImg = "public/images/blog/standard/17.jpg";

                $propuestas.='<div class="entry clearfix">
                                <div class="entry-image">
                                    <a href="'.base_url().$urlImg.'" data-lightbox="image"><img class="image_fade" src="'.base_url().$urlImg.'" alt="Standard Post with Image"></a>
                                </div>
                                <div class="entry-title">
                                    <h2><a href="javascript:" onclick="propuesta_simple('.$vprop->iIdPropuesta.')">'.$vprop->vTitulo.'-'.$vprop->iIdPropuesta.'</a></h2>
                                </div>
                                <ul class="entry-meta clearfix">
                                    <li><a href="javascript:"><i class="icon-comments"></i> 2 Comentarios</a></li>
                                    <li><i class="icon-calendar3"></i> '.date_format($fecha,'d/m/Y').'</li>
                                    <li><a href="javascript:"><i class="icon-user"></i> '.$vprop->vNombre.' '.$vprop->vApellidoPaterno.' '.$vprop->vApellidoMaterno.'</a></li>
                                </ul>
                                <div class="entry-content">
                                    '.$vprop->tDescripcion.'
                                    <br>
                                    <a href="javascript:" onclick="propuesta_simple('.$vprop->iIdPropuesta.');" class="btn btn-success">Apoyar</a>
                                </div>
                            </div>';
            }
        }
        return $propuestas;
    }

    function prop_index()
    {
        $propuestas = '';
        for ($i=0; $i < 4; $i++) 
        { 
            $propuestas.='<div class="col-lg-6 bottommargin">
                <div class="team team-list clearfix">
                    <div class="team-image">
                        <img src="'.base_url().'public/images/team/3.jpg" alt="John Doe">
                    </div>
                    <div class="team-desc">
                        <div class="team-title"><h4>John Doe</h4><span>CEO</span></div>
                        <ul class="entry-meta clearfix">
                            <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 2 Comentarios</a></li>
                            <li>08/10/2017</li>
                            <li><a href="#"><i class="icon-user"></i> Elías</a></li>
                        </ul>
                        <div class="team-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat assumenda similique unde mollitia.</div>
                        <br><button class="btn btn-success">Consultar</button>                                      
                    </div>
                </div>
            </div>';
        }

        return $propuestas;
    }

    function total_propuestas()
    {
        $model = new M_propuestas();
        $query_total = $model->total_propuestas();
        if($query_total!=false) return $query_total;
        else return false;
    }

   
}