<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url();?>img/favicon_2.png">
    <title>Consulta ciudadana</title>
    <!-- Custom CSS -->
    <link href="<?=base_url();?>admin/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="<?=base_url();?>admin/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="<?=base_url();?>admin/assets/libs/toastr/build/toastr.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?=base_url();?>admin/dist/css/style.css?v=0.1.1.4" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>admin/assets/libs/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css">
    <!--Modal Loading -->
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>admin/plugins/modal-loading/css/modal-loading.css" />
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>admin/plugins/modal-loading/css/modal-loading-animate.css" />    
    <!--Modal Loading -->
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>admin/assets/extra-libs/prism/prism.css">
    <!-- Sweet Alerts-->
    <link href="<?=base_url();?>admin/assets/libs/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    
                    <ul class="navbar-nav float-left mr-auto">


                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="flag-icon flag-icon-us font-18"></i><?php echo  $_SESSION[PREFIJO.'_usuario']; ?>
                            </a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <img src="<?=base_url();?>admin/assets/images/users/usuario.jpg" alt="user" class="rounded-circle" width="31">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                    <div class="">
                                        <img src="<?=base_url();?>admin/assets/images/users/usuario.jpg" alt="user" class="img-circle" width="60">
                                    </div>
                                    <div class="m-l-10">
                                        <h4 class="m-b-0"><?php echo  $_SESSION[PREFIJO.'_nombre']; ?></h4>
                                        <p class=" m-b-0"><?php echo  $_SESSION[PREFIJO.'_correo']; ?></p>                                        
                                    </div>
                                </div>                                
                                
                                <a class="dropdown-item" href="<?=base_url();?>Sitio" target="_blank">
                                    <i class="fa fa-home m-r-5 m-l-5"></i> Página principal</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" onclick="Cerrar_sesion();" style="cursor:pointer;">
                                    <i class="fa fa-power-off m-r-5 m-l-5"></i> Cerrar sesión</a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <?php echo $menu; ?>
               
            </div>
        </aside>

        <div class="page-wrapper">
            
            <div class="container-fluid" id="contenido">
    
            </div>
            
            <footer class="footer text-center">
                <a href="www.seplan.yucatan.gob.mx">SEPLAN</a>
            </footer>
            
        </div>
        
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- customizer Panel -->
    <!-- ============================================================== -->
    <aside class="customizer">
        <a href="javascript:void(0)" class="service-panel-toggle"><i class="fa fa-spin fa-cog"></i></a>
        <div class="customizer-body">
            <ul class="nav customizer-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="mdi mdi-wrench font-20"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#chat" role="tab" aria-controls="chat" aria-selected="false"><i class="mdi mdi-message-reply font-20"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"><i class="mdi mdi-star-circle font-20"></i></a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <!-- Tab 1 -->
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="p-15 border-bottom">
                        <!-- Sidebar -->
                        <h5 class="font-medium m-b-10 m-t-10">Layout Settings</h5>
                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" class="custom-control-input" name="theme-view" id="theme-view">
                            <label class="custom-control-label" for="theme-view">Dark Theme</label>
                        </div>
                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" class="custom-control-input" name="sidebar-position" id="sidebar-position">
                            <label class="custom-control-label" for="sidebar-position">Fixed Sidebar</label>
                        </div>
                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" class="custom-control-input" name="header-position" id="header-position">
                            <label class="custom-control-label" for="header-position">Fixed Header</label>
                        </div>
                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" class="custom-control-input" name="boxed-layout" id="boxed-layout">
                            <label class="custom-control-label" for="boxed-layout">Boxed Layout</label>
                        </div>
                    </div>
                    <div class="p-15 border-bottom">
                        <!-- Logo BG -->
                        <h5 class="font-medium m-b-10 m-t-10">Logo Backgrounds</h5>
                        <ul class="theme-color">
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-logobg="skin1"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-logobg="skin2"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-logobg="skin3"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-logobg="skin4"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-logobg="skin5"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-logobg="skin6"></a></li>
                        </ul>
                        <!-- Logo BG -->
                    </div>
                    <div class="p-15 border-bottom">
                        <!-- Navbar BG -->
                        <h5 class="font-medium m-b-10 m-t-10">Navbar Backgrounds</h5>
                        <ul class="theme-color">
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-navbarbg="skin1"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-navbarbg="skin2"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-navbarbg="skin3"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-navbarbg="skin4"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-navbarbg="skin5"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-navbarbg="skin6"></a></li>
                        </ul>
                        <!-- Navbar BG -->
                    </div>
                    <div class="p-15 border-bottom">
                        <!-- Logo BG -->
                        <h5 class="font-medium m-b-10 m-t-10">Sidebar Backgrounds</h5>
                        <ul class="theme-color">
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin1"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin2"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin3"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin4"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin5"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin6"></a></li>
                        </ul>
                        <!-- Logo BG -->
                    </div>
                </div>
                <!-- End Tab 1 -->
                <!-- Tab 2 -->
                <div class="tab-pane fade" id="chat" role="tabpanel" aria-labelledby="pills-profile-tab">
                    
                </div>
                <!-- End Tab 2 -->
                <!-- Tab 3 -->
                <div class="tab-pane fade p-15" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    
                </div>
                <!-- End Tab 3 -->
            </div>
        </div>
    </aside>
    <div class="chat-windows"></div>
    <!-- Modal para login -->
    <div id="modal_login" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <form name="modal_form_login" id="modal_form_login" action="" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Iniciar sesión</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">CORREO ELECTRÓNICO:</label>
                            <input type="hidden" name="id_login" id="id_login" value="<?php echo $_SESSION[PREFIJO.'_idusuario']; ?>">
                            <input type="text" class="form-control" id="correo_login" name="correo_login">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">CONTRASE&Ntilde;A:</label>
                            <input type="password" class="form-control" id="contrasenia_login" name="contrasenia_login">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>-->
                    <button type="submit" class="btn btn-danger waves-effect waves-light">INICIAR SESIÓN</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?=base_url();?>admin/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?=base_url();?>admin/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?=base_url();?>admin/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="<?=base_url();?>admin/dist/js/app.min.js"></script>
    <script src="<?=base_url();?>admin/dist/js/app.init.horizontal.js"></script>
    <script src="<?=base_url();?>admin/dist/js/app-style-switcher.horizontal.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?=base_url();?>admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?=base_url();?>admin/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?=base_url();?>admin/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <!--<script src="../../dist/js/sidebarmenu.js"></script>-->
    <!--Custom JavaScript -->
    <script src="<?=base_url();?>admin/dist/js/custom.min.js"></script>
    <!--Mensajes SweetAlert -->
    <script src="<?=base_url();?>admin/assets/libs/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="<?=base_url();?>admin/assets/libs/sweetalert2/sweet-alert.init.js"></script>
    <!-- Mensajes del sistema -->
    <script src="<?=base_url();?>admin/assets/libs/toastr/build/toastr.min.js"></script>
    <!--<script src="<?=base_url();?>admin/assets/libs/sweetalert2/sweet-alert.init.js"></script> Este es el ejemplo-->
    <script src="<?=base_url();?>admin/assets/libs/moment/moment.js?v=1.1"></script>
    <script src="<?=base_url();?>admin/assets/libs/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker-custom.js?v=1.3"></script>
    <script src="<?=base_url();?>public/js/plugins/jquery.validation.js"></script>
    <?php /*
    <!--chartis chart-->
    <script src="../../assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="../../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 charts -->
    <script src="../../assets/extra-libs/c3/d3.min.js"></script>
    <script src="../../assets/extra-libs/c3/c3.min.js"></script>
    <!--chartjs -->
    <script src="../../assets/libs/raphael/raphael.min.js"></script>
    <script src="../../assets/libs/morris.js/morris.min.js"></script>

    <script src="../../dist/js/pages/dashboards/dashboard1.js"></script>
    */ ?>
    <!-- funciones Jorge Estrella-->

    <!--Modal Loading -->
    <script src="<?=base_url();?>admin/plugins/modal-loading/js/modal-loading.js"></script>
    <!--Modal Loading -->
    <script src="<?=base_url();?>admin/assets/extra-libs/prism/prism.js"></script>
    <script src="<?=base_url();?>public/js/funciones.js?v=6"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnOBLYrneZlLUF5_bhWzGnwc6I7s01qEs" async defer></script>

    <script src="<?=base_url();?>js/funciones_barbosa.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function(){
            <?php if ($modulo_inicial != ''){ ?>
            Cargar('<?=$modulo_inicial;?>','#contenido');
            <?php } ?>
        });

        var url_sitio = '<?=base_url();?>';
        //$("#modal_login").modal();
        $( "#modal_form_login" ).validate({
            rules: {
                correo_login: {
                    required: true
                },
                contrasenia_login: {
                    required: true
                }
            },
            messages: {
                
                correo_login: "Este campo es requerido",
                contrasenia_login: "Este campo es requerido"
            },
            submitHandler: function(form){
                Iniciar_sesion(form,'<?=base_url();?>C_seguridad/iniciar_sesion');

            }
        });

        function Iniciar_sesion(form,url_destino)
        {
            $.ajax({
                url: url_destino,
                type: 'POST',
                async: false,   //  Para obligar al usuario a esperar una respuesta
                data: $(form).serialize(),
                error: function(XMLHttpRequest, errMsg, exception){
                    var msg = "Ha fallado la petición al servidor";
                    alert(msg);
                },
                success: function(htmlcode){
                    $("#modal_login").modal('hide');
                    var cod = htmlcode.split("-");

                    switch(cod[0])
                    {
                        case "0":
                            Notificacion('Autentificado','success');
                            break;
                        case "1":
                            Notificacion('Autentificado','success');
                            window.location.href = '<?=base_url();?>Sitio/admin';
                            break;
                        default:
                            Notificacion(msg[cod[0]],'error');
                            break;
                    }
                }
            }); 
        }        

        function Confirmar_cerrar_sesion()
        {
            $('#confirmar_cerrar_sesion').modal();
        }

        function Cerrar_sesion()
        {
            Swal({
              title: 'Cerrar sesión',
              text: '¿Realmente desea cerrar sesión?',
              type: 'question',
              showCancelButton: true,
              confirmButtonText: 'Confirmar',
              cancelButtonText: 'Cancelar'
            }).then((result) => {           
                if (result.value) {           
                    window.location.href = '<?=base_url(); ?>/Sitio/cerrar_sesion';
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                
                }
            });
        }

        function Cargar(pagina,obj,metodo,variables)
        {
            var loading = '<div id="page-loader" class="fade in"><span class="spinner"></span></div>';

            if(typeof(metodo) == "undefined" || metodo == ""){ metodo = "POST";}
            if(typeof(variables) == "undefined" || variables == ""){ variables = "";}
            $(obj).html(loading);
            $.ajax({
                url: pagina,
                type: metodo,
                async: true,
                data: variables,
                success: function(htmlcode){
                    $(obj).html(htmlcode);
                },
                error: function(XMLHttpRequest, errMsg, exception){
                    Notificacion(errMsg,"error");
                }
            });
          
        }
    </script>
</body>

</html>