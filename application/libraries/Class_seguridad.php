<?php if (!defined('BASEPATH')) exit('No permitir el acceso directo al script');

class Class_seguridad {

    function __construct()
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        $CI->load->model('M_seguridad');
    }

    function iniciar_sesion($usuario,$contrasenia,$codigo='')
    {
        $cod = 500;
        if( !empty($usuario) && !empty($contrasenia) )
        {
            if(true)    //  En caso de requerir un captcha o proceso de verificación
            {
                $ms = new M_seguridad();
                $where['u.vCorreo'] = $usuario;
                $where['u.vContrasenia'] = sha1($contrasenia);
                $qu = $ms->consulta_existe_usuario($where);
                
                if($qu != false)
                {
                    if($qu->num_rows() > 0)
                    {
                        $du = $qu->row();
                        $_SESSION[PREFIJO.'_idusuario'] = $du->idusuario;
                        $_SESSION[PREFIJO.'_correo'] = $du->vCorreo;
                        $_SESSION[PREFIJO.'_idrol'] = $du->idrol;
                        $_SESSION[PREFIJO.'_nombre'] = $du->vNombre.' '.$du->vApellidoPaterno.' '.$du->vApellidoMaterno ;
                        $cod = 0;
                    }else $cod = 101;
                }else $cod = 500;
            }else $cod = 102;
        }else $cod = 100;

        return $cod;
    }

    function pintar_menu($idusuario)
    {
        $str = '';
        $id_permiso_ant = 0;
        $modseguridad =  new M_seguridad();
        $menu = $modseguridad->traer_menu_sistema($idusuario, 0);
        if($menu)
        {
            if($menu->num_rows () > 0)
            {
                $menu = $menu->result();
                
                $str = '<nav class="sidebar-nav">
                            <ul id="sidebarnav">';
                foreach ($menu as $padre)
                {
                    $submenu = $modseguridad->traer_menu_sistema($idusuario, $padre->iIdPermiso);
                    if($submenu != false && $submenu->num_rows() > 0)
                    {
                        $submenu = $submenu->result();                        
                        $str .=  '<li class="sidebar-item">
                                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-Car-Wheel"></i><span class="hide-menu">'.$padre->vPermiso.'</span></a>
                                                <ul aria-expanded="false" class="collapse  first-level">
                                        ';
                        foreach ($submenu as $hijo)
                        {
                            $str .=  '<li class="sidebar-item"><a href="index.html" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu">'.$hijo->vPermiso.'</span></a></li>';
                        }
                                
                        $str .= '   </ul>
                                </li>';
                    }
                    else
                    {
                         $str .= '<li class="sidebar-item">
                                <a class="sidebar-link  waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-Car-Wheel"></i><span class="hide-menu">'.$padre->vPermiso.'</span></a>
                            </li>';
                    }
                }

                $str .= '   </ul>
                        </nav>';

            }
            
            /*$cadena .= '<li class="active expanding">
                            <a class="active" href="../../html/dashboards/dashboard.html" class="active">
                                <div class="gui-icon"><i class="md md-home"></i></div>
                                <span class="title">Inicio</span>
                            </a>
                        </li>';*/
            /*foreach($menu as $padre)
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
            }*/
        }
        return $str;
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