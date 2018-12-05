<!-- Header
============================================= -->
<header id="header" class="full-header">

	<div id="header-wrap">

		<div class="container clearfix">

			<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

			<!-- Logo
			============================================= -->
			<div id="logo">
				<!--<a href="index.html" class="standard-logo" data-dark-logo="images/logo-dark.png"><img src="<?=base_url();?>public/images/logo.png" alt="Canvas Logo"></a>
				<a href="index.html" class="retina-logo" data-dark-logo="images/logo-dark@2x.png"><img src="<?=base_url();?>public/images/logo@2x.png" alt="Canvas Logo"></a>-->
			</div><!-- #logo end -->

			<div id="top-account" class="dropdown">
				<?php if(isset($_SESSION[PREFIJO.'_idusuario']) && !empty($_SESSION[PREFIJO.'_idusuario']))
				{ ?>
					<a href="#" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="icon-user"></i>&nbsp;<?=$_SESSION[PREFIJO.'_usuario'];?></a>
				<?php 
				}
				else
				{?>
					<a href="#" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="icon-user"></i></a>
				<?php 
				}?>
				
				<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
					
					
					<?php if(isset($_SESSION[PREFIJO.'_idusuario']) && !empty($_SESSION[PREFIJO.'_idusuario']))
					{ 
						if( $_SESSION[PREFIJO.'_idrol'] != 2  ){ echo '<a class="dropdown-item tleft" href="'.base_url().'Sitio/admin" target="_blank">Panel de administración <i class="icon-gears"></i></a><div class="dropdown-divider"></div>';}
						
						
						echo '<a class="dropdown-item tleft" href="'.base_url().'Sitio/cerrar_sesion">Cerrar sesión <i class="icon-signout"></i></a>';
					}
					else
					{
						echo '<a class="dropdown-item tleft" href="'.base_url().'Sitio/login">Entrar <i class="icon-signin"></i></a>';
					} ?>
				</ul>
				
			</div>

			<!-- Primary Navigation
			============================================= -->
			<nav id="primary-menu">

				<ul>
					<li <?php if(isset($active) && $active == 1) echo 'class="current"'; ?>><a href="<?=base_url();?>"><div>Inicio</div></a></li>
					<li <?php if(isset($active) && $active == 6) echo 'class="current"'; ?>><a href="<?=base_url();?>participa"><div>Crea tu propuesta</div></a></li>
					<li <?php if(isset($active) && $active == 2) echo 'class="current"'; ?>><a href="<?=base_url();?>vota"><div>Vota</div></a></li>
					<!--<li <?php if(isset($active) && $active == 3) echo 'class="current"'; ?>><a href="<?=base_url();?>Sitio/votaciones"><div>Votaciones</div></a></li>-->
					<li <?php if(isset($active) && $active == 7) echo 'class="current"'; ?>><a href="<?=base_url();?>presupuesto"><div>Dirige el presupuesto</div></a></li>
					<li <?php if(isset($active) && $active == 8) echo 'class="current"'; ?>><a href="<?=base_url();?>encuestas"><div>Encuestas</div></a></li>					
					<?php if(!isset($_SESSION[PREFIJO.'_idusuario']) || empty($_SESSION[PREFIJO.'_idusuario']))
					{ ?>
					<li <?php if(isset($active) && $active == 4) echo 'class="current"'; ?>><a href="<?=base_url();?>login"><div>Entrar</div></a></li>
					<li <?php if(isset($active) && $active == 5) echo 'class="current"'; ?>><a href="<?=base_url();?>registro"><div>Registro</div></a></li>
					<?php } ?>
				</ul>

				

				<!-- Top Search
				============================================= -->
				<!--<div id="top-search">
					<a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
					<form action="search.html" method="get">
						<input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
					</form>
				</div>-->
				<!-- #top-search end -->



			</nav><!-- #primary-menu end -->

		</div>

	</div>

</header><!-- #header end -->