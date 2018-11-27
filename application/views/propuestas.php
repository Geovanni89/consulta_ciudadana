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
					<!--<div class="sidebar nobottommargin col_last clearfix">						
						<div class="sidebar-widgets-wrap">							

							<div class="widget clearfix">

								<h4>Categorías</h4>
								<div class="tagcloud">
									<a href="#">general</a>
									<a href="#">videos</a>
									<a href="#">music</a>
									<a href="#">media</a>
									<a href="#">photography</a>
									<a href="#">parallax</a>
									<a href="#">ecommerce</a>
									<a href="#">terms</a>
									<a href="#">coupons</a>
									<a href="#">modern</a>
								</div>
							</div>

						</div>
						<hr>
					</div>


					<div class="sidebar nobottommargin col_last clearfix">
						<div class="sidebar-widgets-wrap">							

							<div class="widget clearfix">

								<h4>Tendencias</h4>
								<div class="tagcloud">
									<a href="#">general</a>
									<a href="#">videos</a>
									<a href="#">music</a>
									<a href="#">media</a>
									<a href="#">photography</a>
									<a href="#">parallax</a>
									<a href="#">ecommerce</a>
									<a href="#">terms</a>
									<a href="#">coupons</a>
									<a href="#">modern</a>
								</div>

							</div>

						</div>

					</div>-->
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
	
	<!-- Footer Scripts
	============================================= -->
	<script src="<?=base_url();?>public/js/functions.js"></script>

	<script type="text/javascript">
		(function(){
			$('#pg_0').addClass('active');
		})();

		var map;
		var pagina_actual = 0;		
		var image = '<?=base_url();?>img/logo_vertical_2.png';

		/*function propuesta_simple(idProp) {
			$.post('<?=base_url();?>C_propuestas/propuesta_sim', {iIdPropuesta:idProp},function(resp){
				if(resp!="error")
				{
					$('#posts').addClass('animated fadeOut')
					.empty()
					.html(resp)
					.addClass('fadeIn')
					.removeClass('fadeOut');
					SEMICOLON.initialize.goToTop();
					SEMICOLON.widget.tabs();
					SEMICOLON.widget.loadFlexSlider();
					window.scrollTo(0,0);
					$('#container_paginador').empty();					
				} else {
					alert("Error al cargar la propuesta");
				}
			});
		}*/

		function pagina_propuesta(pagina) {

			$.post('<?=base_url();?>C_propuestas/pagina_prop',{pagina:pagina}, function(resp){
				$('#pg_'+pagina_actual).removeClass('active')
				$('#pg_'+pagina).addClass('active');
				pagina_actual = pagina;
				$('#posts').empty().html(resp);
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