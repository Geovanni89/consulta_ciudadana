<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" type="image/png" href="<?=base_url();?>img/favicon_2.png"/>
	<link rel="stylesheet" href="<?=base_url();?>public/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/style.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/dark.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/magnific-popup.css" type="text/css" />

	<link type="text/css" rel="stylesheet" href="<?=base_url();?>admin/plugins/modal-loading/css/modal-loading.css" />
	<link type="text/css" rel="stylesheet" href="<?=base_url();?>admin/plugins/modal-loading/css/modal-loading-animate.css" />

	<link rel="stylesheet" href="<?=base_url();?>public/css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>Participación Ciudadana | Propuestas</title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<?php include 'header.php'; ?>		

		<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>Propuestas</h1>			
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<!-- Post Content
					============================================= -->
					<div class="postcontent nobottommargin clearfix">

						<div class="heading-block center">
						<h3></h3>
						<span>Conoce algunas de las propuestas que más ciudadanos han compartido a Tu Plan</span>
					</div>

						<!-- Posts
						============================================= -->
						<div id="posts">

							<?php echo $propuestas; ?>

						</div><!-- #posts end -->

						<div class="row mb-3" id="container_paginador">
							<div class="col-12">
								<div class="col_third_fourth">
									<div class="col_one_third">
										
									</div>
									<div class="col_one_third">
										<ul class="pagination" id="paginador">
											
											<?php
											if($total>0)
											{
												echo '<li id="previous" class="page-item disabled"><a class="page-link" href="javascript:">&laquo;</a></li>';
												$total_pag = floor($total/5);											
												$total = (floor($total/5) > 5) ? 4 : floor($total/5);
												for ($i=0; $i <= $total; $i++) { 
													echo '<li id="pg_'.$i.'" class="page-item"><a class="page-link" onclick="pagina_propuesta('.$i.')" href="javascript:">'.($i+1).'</a></li>';
												}												
												if($total_pag <= 5)
													echo '<li id="next" class="page-item disabled"><a class="page-link" href="javascript:">&raquo;</a></li>';
												else
													echo '<li id="next" class="page-item"><a class="page-link" onclick="paginador(\'sig\',0,4,'.$total_pag.')" href="javascript:">&raquo;</a></li>';												
											}
											?>											
											</ul>
									</div>						
								</div>	
								
							</div>
						</div>

					</div><!-- .postcontent end -->

					<!-- Sidebar
					============================================= -->
					<form id="form_busqueda" action="#">
					<div class="sidebar nobottommargin col_last clearfix">
						<div class="sidebar-widgets-wrap">							

							<div class="widget clearfix">

								<h4>Palabras clave</h4>
								<div class="input-group">									
								  	<input class="form-control" id="input_palabras" name="input_palabras" onchange="busqueda_selector(this.value,4);" type="text" placeholder="Buscar...">
								  	<div class="input-group-prepend">
								    	<span class="input-group-text" id="basic-addon1"><i class="icon-search"></i></span>
								  	</div>
								</div>

								<div class="tagcloud">
									
								</div>

							</div>

						</div>
						<hr>
					</div>

					<div class="sidebar nobottommargin col_last clearfix">						
						<div class="sidebar-widgets-wrap">							
								<div class="widget clearfix">

									<h4>Búsqueda avanzada</h4>
									<div class="form-group">
										<label for="exampleFormControlSelect1">Sector</label>										
										<select class="form-control" id="sel_search_sector" name="sel_search_sector" onchange="busqueda_selector(this.value,1);">
											<option value="">Sector</option>
											<?php 
												if($sectores!=false) 
												{
													foreach ($sectores as $vsec) {
														if($iIdSector==$vsec->iIdSector)
															$selected = 'selected';
														else 
															$selected = '';

														echo '<option value="'.$vsec->iIdSector.'" '.$selected.'>'.$vsec->vSector.'</option>';
													}
												}
											?>
										</select>
									</div>
									<div class="form-group">
										<label for="exampleFormControlSelect1">Temas</label>
										<select class="form-control" id="sel_search_tema" name="sel_search_tema" onchange="busqueda_selector(this.value,2);">
											<option value="">Temas</option>
											<?php 
												var_dump($temas);
												if($temas!='')
												{	
													foreach ($temas as $vtem) {
														if($iIdTema==$vtem->iIdTema)
															$selected_t = 'selected';
														else 
															$selected_t = '';

														echo '<option value="'.$vtem->iIdTema.'" '.$selected_t.'>'.$vtem->vTema.'</option>';
													}
												}
											?>									
										</select>
									</div>
									<div class="form-group">
										<label for="exampleFormControlSelect1">Orden</label>
										<select class="form-control" id="ordenamiento" name="ordenamiento" onchange="busqueda_selector(this.value,3);">
											<option value="">Orden</option>
											<option value="1">Votadas (de menor a mayor)</option>
											<option value="2">Votadas (de mayor a menor)</option>
											<option value="3">Más recientes</option>
											<option value="4">Más antiguas</option>										
										</select>
									</div>
								</div>								

						</div>						
					</div>					
					</form>
					<!-- .sidebar end -->

				</div>

			</div>

		</section><!-- #content end -->

		<?php include 'footer.php'; ?>

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script src="<?=base_url();?>public/js/jquery.js"></script>
	<script src="<?=base_url();?>public/js/plugins.js"></script>
	<!-- Loader 
	============================================= -->
	<script src="<?=base_url();?>admin/plugins/modal-loading/js/modal-loading.js"></script>
	
	<!-- Footer Scripts
	============================================= -->
	<script src="<?=base_url();?>public/js/functions.js"></script>

	<script type="text/javascript">
		(function(){
			$('#pg_0').addClass('active');
		})();

		$(document).keypress(
		  function(event){
		    if (event.which == '13') {
		      event.preventDefault();
		    }
		});

		var map;
		var pagina_actual = 0;		
		var image = '<?=base_url();?>img/logo_vertical_2.png';

		function busqueda_selector(id,op) {
			loading = new Loading({
                discription: 'Cargando propuestas',
                defaultApply: true
            });
			$.post('<?=base_url();?>C_propuestas/busqueda_selector', $('#form_busqueda').serialize(), function(resp){
				var result = resp.split('_separador_');
				$('#posts').html(result[0]);
				$('#paginador').html(result[1]);
				console.log('total propuestas: '+result[2]+'\n total paginas: '+result[3]+'\n pruebas: '+result[4]);
				if(op==1) {
					$.post('<?=base_url();?>C_propuestas/carga_temas', {id:id}, function(resp_tema){
						$('#sel_search_tema').html(resp_tema);						
					});	
				}
				$('#pg_0').addClass('active');				
				loading.out();
			});
		}

		//-------------Apoya propuestas
		function apoya_propuesta(id,op) {
			loading = new Loading({
                discription: 'Cargando propuestas',
                defaultApply: true
            });

			$.post('<?=base_url();?>C_propuestas/apoyar_propuesta',{id:id,op:op}, function(resp){
				loading.out();
				switch(resp)
				{
					case 'correcto' :  
						toastr.success('Operación completa', 'Correcto', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 2000 });
						$('#div_apoyo_'+id).empty().html('<div class="col-md-12"><button id="apoyar_prop" type="button" class="btn btn-outline-warning btn-lg btn-block">Usted ya ha apoyado esta propuesta</button></div>');
						break;
					case 'error' :  
						toastr.error('No se pudo completar la operación', '¡Error!', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 2000 });
						break;
					case 'error1' :  
						toastr.warning('Usted ya ha apoyado esta propuesta', '¡Advertencia!', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 2000 });
						break;
				}

			});
		}
		//------------Fin apoya propuestas

		function pagina_propuesta(pagina) {
			loading = new Loading({
                discription: 'Cargando propuestas',
                defaultApply: true
            });

	            var sector =  $('#sel_search_sector').val();
	            var tema =  $('#sel_search_tema').val();
	            var orden =  $('#ordenamiento').val();
	            var palabra =  $('#input_palabras').val();	            

			$.post('<?=base_url();?>C_propuestas/busqueda_selector', {sel_search_sector:sector,sel_search_tema:tema,ordenamiento:orden,input_palabras:palabra,pagina:pagina}, function(resp){
				$('#pg_'+pagina_actual).removeClass('active')
				$('#pg_'+pagina).addClass('active');
				pagina_actual = pagina;
				
				var result = resp.split('_separador_');
				$('#posts').html(result[0]);
				//$('#paginador').html(result[1]);
				console.log('total propuestas: '+result[2]+'\n total paginas: '+result[3]+'\n pruebas: '+result[4]);
				loading.out();
			});
		}

		function paginador(op,lim_i,lim_s,total) {
			if(op=='sig') pagina = pagina_actual+1;
			if(op=='ant') pagina = pagina_actual-1;
			$.post('<?=base_url();?>C_propuestas/paginador',{op:op,lim_i:lim_i,lim_s:lim_s,total:total}, function(resp){
				$('#paginador').empty().html(resp);
				pagina_propuesta(pagina);				
			});

		}
			
	</script>


</body>
</html>