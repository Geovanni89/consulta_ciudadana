<?php if (!defined('BASEPATH')) exit('No permitir el acceso directo al script');
/*
    2015-09-27
        -Se modifica la función clave_permiso.
        -Se agregan las opciones de seguridad para el módulo de profesores
 */

class Class_seguridad {

    function __construct()
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        $CI->load->model('Model_seguridad');
    }

    function pintar_menu($id_usuario)
    {
        $cadena = '';
        $id_permiso_ant = 0;
        $modseguridad =  new Model_seguridad();
        $menu = $modseguridad->traer_menu_sistema($id_usuario, 0);
        if($menu != false)
        {
            $menu = $menu->result();
            /*$cadena .= '<li class="active expanding">
                            <a class="active" href="../../html/dashboards/dashboard.html" class="active">
                                <div class="gui-icon"><i class="md md-home"></i></div>
                                <span class="title">Inicio</span>
                            </a>
                        </li>';*/
            foreach($menu as $padre)
            {
                $submenu = $modseguridad->traer_menu_sistema($id_usuario,$padre->permisoid);
                $onclick = '';
                if($submenu != false && $submenu->num_rows() > 0) $cadena .= '  <li class="gui-folder">';
                else
                {
                    $onclick = 'onclick="cargar(\''.base_url().'index.php/'.$padre->url.'\',\'#content\',\'POST\');"';
                    $cadena .= '<li>';
                }
                
                $cadena .=  '<a href="#" '.$onclick.'>
                                <div class="gui-icon"><i class="'.$padre->imagen.'"></i></div>
                                <span class="title">'.$padre->permiso.'</span>
                            </a>';
                if($submenu != false && $submenu->num_rows() > 0)
                {
                    $submenu = $submenu->result();
                    $cadena .= '<ul>';

                    foreach ($submenu as $hijo)
                    {
                        $cadena .= '<li><a href="#" onclick="cargar(\''.base_url().'index.php/'.$hijo->url.'\',\'#content\',\'POST\');"><span class="title">'.$hijo->permiso.'</span></a></li>';
                    }
                    
                    $cadena .= '</ul>';
                }

                $cadena .= '  </li>'.PHP_EOL;
            }
        }
        return $cadena;
    }
    
    function pintar_submenu($id_usuario, $opciones, $ruta)
    {
        $submenu = '';
        $id_permiso_ant = 0;
        $modseguridad =  new Model_seguridad();
        foreach( $opciones as $opcion ){
            if( (int)$opcion->id_permiso != $id_permiso_ant ){
                $mostrar = ( ((int)$opcion->permiso_usuario > 0) || ((int)$opcion->permiso_usuario < 0 && (int)$opcion->permiso_rol > 0) );
                if( $mostrar ){
                    if( strlen($submenu) == 0 ){
                        $submenu .= '    <ul>'.PHP_EOL;
                    }
                    $onclick = '';
                    $nuevaruta = $ruta.'<li>'.$opcion->modulo.'</li>';
                    if( strlen($opcion->url) > 0 ){
                        //$url = base_url().'index.php/'.$opcion->url;
                        $onclick = ' onclick="CargarModulo(\''.base_url().'\', \''.$opcion->url.'\', \''.$nuevaruta.'\');"';
                    }
                    $submenu .= '      <li><a href="javascript:void(0);"'.$onclick.'>';
                    if( strlen($opcion->clase) > 0 ){
                        $submenu .= '<i class="'.$opcion->clase.'"></i> ';
                    }
                    $submenu .= $opcion->modulo.'</a>'.PHP_EOL;
                    $permisos = $modseguridad->traer_menu_sistema($id_usuario, $opcion->id_permiso);
                    if( $permisos != false )
                    {
                        $submenu .= $this->pintar_submenu($id_usuario, $permisos, $nuevaruta);
                    }
                    $submenu .= '      </li>'.PHP_EOL;
                    $id_permiso_ant = (int)$opcion->id_permiso;
                }
            }
        }
        if( strlen($submenu) > 0 ){
            $submenu .= '    </ul>'.PHP_EOL;
        }
        return $submenu;
    }

    function verifica_permiso($permiso, $id_usuario=0, $id_rol=0)
    {
        $acceso = -1;
        $ms = new Model_seguridad();
        $qp = $ms->verificar_permiso($permiso,$id_usuario,$id_rol);
        if($qp != false)
        {
            foreach ($qp as $d)
            {
              $permisousuario = $d->permiso_usuario;
              $permisorol = $d->permiso_rol;
            }

            if($permisousuario > $permisorol) $acceso = $permisousuario;
            else $acceso = $permisorol;
        }

        return $acceso;
    }
   
    
}