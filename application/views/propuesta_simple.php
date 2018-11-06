<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
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

						<!-- Posts
						============================================= -->
						<div id="posts">
							<div class="single-post nobottommargin">	
								<!-- Single Post
								============================================= -->
								<div class="entry clearfix">

									<!-- Entry Title
									============================================= -->
									<div class="entry-title">
										<h2><?php echo $vTitulo;?></h2>
									</div><!-- .entry-title end -->

									<!-- Entry Meta
									============================================= -->
									<ul class="entry-meta clearfix">
										<li><a href="#"><i class="icon-comments"></i> 2 Comentarios</a></li>
										<li><i class="icon-calendar3"></i> <?php $fecha = new DateTime($dFecha); echo date_format($fecha,'d/m/Y'); ?></li>
										<li><a href="#"><i class="icon-user"></i> <?php echo $vNombre.' '.$vApellidoPaterno.' '.$vApellidoMaterno; ?></a></li>
									</ul><!-- .entry-meta end -->

									<!--Multi Entry Image
									============================================= -->
									<div class="entry-image">
										<div class="fslider" data-arrows="false" data-lightbox="gallery">
											<div class="flexslider">
												<div class="slider-wrap">
													<?php 
														if($img!=false) 
														{
															foreach ($img as $vimg) {
																echo '<div class="slide"><a href="'.base_url().$vimg->vRutaAdjunto.'" data-lightbox="gallery-item"><img class="image_fade" src="'.base_url().$vimg->vRutaAdjunto.'" alt="'.$vimg->vNombreAdjunto.'"></a></div>';
															}
														}
														else
														{
															echo '<div class="slide"><a href="'.base_url().'public/images/blog/full/10.jpg" data-lightbox="gallery-item"><img class="image_fade" src="'.base_url().'public/images/blog/standard/10.jpg" alt="Imagen predeterminada"></a></div>';
														}
													?>

												</div>
											</div>
										</div>
									</div>

									<!-- Entry Content
									============================================= -->
									<div class="entry-content notopmargin ">
										<div class="clearfix bottommargin-sm">				
											<?php
											if(isset($_SESSION[PREFIJO.'_idusuario']))
											{

												if($apoyo>0)
													echo '<button id="apoyar_prop" type="button" class="btn btn-outline-warning btn-lg btn-block">Usted ya ha apoyado esta propuesta</button>';
												else
													echo '<button id="apoyar_prop" type="button" class="btn btn-outline-success btn-lg btn-block" onclick="apoya_propuesta('.$iIdPropuesta.');">Apoyar</button>';
											}
											else echo '<div id="error_sesion" class="style-msg2 errormsg"><div class="msgtitle">Inicio de sesión</div><div class="sb-msg"><ul><li>Para poder apoyar una propuesta debe iniciar sesión</li></ul></div></div>';
											?>					
										</div>
										<?php echo $tDescripcion;?>


										<!-- Post Single - Content End -->

										<div class="entry clearfix">
											<div class="tabs nobottommargin topmargin clearfix" id="sidebar-tabs">
												<input type="hidden" name="nLatDec" id="nLatDec" value="<?php echo $nLatDec;?>">
												<input type="hidden" name="nLongDec" id="nLongDec" value="<?php echo $nLongDec; ?>">					

												<ul class="tab-nav clearfix">
													<li><a href="#tab-mapa"><i class="icon-map norightmargin"></i> Mapa</a></li>
													<li><a href="#tabs-2"><i class="icon-files norightmargin"></i> Documentación</a></li>
												</ul>

												<div class="tab-container">

													<div class="tab-content clearfix" id="tab-mapa">
														<div id="map"></div>
													</div>
													<div class="tab-content clearfix" id="tabs-2">
														<div id="recent-post-list-sidebar">
															<?php 
																if($pdf!=false) 
																{
																	foreach ($pdf as $vpdf) {
																		$fecha_adj = new DateTime($vpdf->dFecha);
																		
																		echo '<div class="spost clearfix">
																				<div class="entry-image">
																					<a href="javascript:" class="nobg"><img class="rounded-circle" src="'.base_url().'img/pdf.jpg" alt=""></a>
																				</div>
																				<div class="entry-c">										
																					<div class="entry-title">
																						<h4><a target="_blank" href="'.base_url().$vpdf->vRutaAdjunto.'">'.$vpdf->vNombreAdjunto.'</a></h4>
																					</div>
																					<ul class="entry-meta">
																						<li>'.date_format($fecha_adj,'d/m/Y').'</li>
																					</ul>
																				</div>
																			</div>';
																	}
																}
																else echo '<h3>Sin documentos</h3>';
															?>
															

														</div>
													</div>
												</div>

											</div>
										</div>

										<!-- Tag Cloud
										============================================= -->
										<!--<div class="tagcloud clearfix bottommargin">
											<a href="#">general</a>
											<a href="#">information</a>
											<a href="#">media</a>
											<a href="#">press</a>
											<a href="#">gallery</a>
											<a href="#">illustration</a>
										</div>-->

										<div class="clear"></div>

										<!-- Post Single - Share
										============================================= -->
										<div class="si-share noborder clearfix">
											<span>Compártelo en tus redes sociales:</span>
											<div>
												<a href="#" class="social-icon si-borderless si-facebook">
													<i class="icon-facebook"></i>
													<i class="icon-facebook"></i>
												</a>
												<a href="#" class="social-icon si-borderless si-twitter">
													<i class="icon-twitter"></i>
													<i class="icon-twitter"></i>
												</a>					
												<a href="#" class="social-icon si-borderless si-gplus">
													<i class="icon-gplus"></i>
													<i class="icon-gplus"></i>
												</a>					
											</div>
										</div><!-- Post Single - Share End -->

									</div>
								</div><!-- .entry end -->

								<!-- Comments
								============================================= -->
								<div id="comments" class="clearfix">

									<h3 id="comments-title"><span><?php echo count($comentarios); ?></span> Comentarios</h3>
									
									<br><br>
									<ol class="commentlist clearfix">
										
									<?php
										if($comentarios!=false) 
										{	
											/*echo '<pre>';
											print_r($comentarios);
											echo '</pre>';
											$respuestas = 1;
											*/
														
											foreach ($comentarios as $vcom) {												
												echo '<li class="comment byuser comment-author-_smcl_admin even thread-odd thread-alt depth-1" id="li_comentario_'.$vcom->iIdComentario.'">
											<div id="comment-2" class="comment-wrap clearfix">
												<div class="comment-meta">
													<div class="comment-author vcard">
														<span class="comment-avatar clearfix">
														<img alt="" src="'.base_url().'img/icon-user.png" class="avatar avatar-60 photo" height="60"  width="60"/></span>
													</div>
												</div>
												<div class="comment-content clearfix">
													<div class="comment-author">
													<a href="http://themeforest.net/user/semicolonweb" rel="external nofollow" class="url">'.$vcom->vNombre.' '.$vcom->vApellidoPaterno.' '.$vcom->vApellidoMaterno.'</a>
													<span><a href="#" title="Permalink to this comment">'.$vcom->dFecha.'</a></span></div>
													<p>'.$vcom->vComentario.'</p>
													<a class="comment-reply-link" href="javascript:" onclick="responder('.$vcom->iIdComentario.',\''.$vcom->vNombre.'\');"><i class="icon-reply"></i></a>';
													
													if($vcom->iLike=="")
													{
														echo '<a id="like_'.$vcom->iIdComentario.'" href="javascript:" onclick="like(1,'.$vcom->iIdComentario.')"><i class="icon-thumbs-up"></i> Me gusta</a>
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														<a id="dislike_'.$vcom->iIdComentario.'" href="javascript:" onclick="like(0,'.$vcom->iIdComentario.')"><i class="icon-thumbs-down"></i> No me gusta</a>';	
													}
													elseif($vcom->iLike==0)
													{
														echo '<a id="like_'.$vcom->iIdComentario.'" href="javascript:" onclick="like(1,'.$vcom->iIdComentario.')"><i class="icon-thumbs-up"></i> Me gusta</a>
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														<a class="btn-like" id="dislike_'.$vcom->iIdComentario.'" href="javascript:" onclick="like(0,'.$vcom->iIdComentario.')"><i class="icon-thumbs-down"></i> No me gusta</a>';
													}
													elseif($vcom->iLike==1)
													{
														echo '<a class="btn-like" id="like_'.$vcom->iIdComentario.'" href="javascript:" onclick="like(1,'.$vcom->iIdComentario.')"><i class="icon-thumbs-up"></i> Me gusta</a>
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													<a id="dislike_'.$vcom->iIdComentario.'" href="javascript:" onclick="like(0,'.$vcom->iIdComentario.')"><i class="icon-thumbs-down"></i> No me gusta</a>';
													}


												if($vcom->respuestas > 0)
												{
													echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													<a id="respuestas_'.$vcom->iIdComentario.'" href="javascript:" onclick="respuestas('.$vcom->iIdComentario.')">Ver respuestas</a>
													</div>
													<div class="clear"></div>
												</div>
												<div id="resp_'.$vcom->iIdComentario.'"></div>';

												}
												else
												{
													echo '</div>
													<div class="clear"></div>
												</div>';
												}

										echo '</li>';
											}
										} 										
									?>
									</ol>
									

									<div class="clear"></div>

									<!-- Comment Form
									============================================= -->
									<div id="respond" class="clearfix">

										<h3 id="title-coment">Deja tu comentario</h3>

										<form class="clearfix" id="formComentario">
											<input type="hidden" id="idprop_com" name="idprop_com" value="<?php echo $iIdPropuesta; ?>">
											<input type="hidden" id="idresp_com" name="idresp_com">
											<div class="clear"></div>

											<div class="col_full">
												<label for="comment">Comentario</label>
												<textarea name="comment" cols="58" rows="7" tabindex="4" class="sm-form-control" id="vComentario" name="comentario"></textarea>
											</div>

											<div class="col_full nobottommargin">
												<button name="enviaComentario" type="button" id="enviaComentario" tabindex="5" onclick="envia_comentario();" class="button button-3d nomargin">Publicar comentario</button>
											</div>

										</form>

									</div><!-- #respond end -->

								</div><!-- #comments end -->

							</div>
						<!------------------------------------------------------------------------------------->
						</div><!-- #posts end -->						

					</div><!-- .postcontent end -->

					<!-- Sidebar
					============================================= -->
					<div class="sidebar nobottommargin col_last clearfix">
						<?php if(isset($_SESSION[PREFIJO.'_idusuario'])) {?>
						<a href="<?=base_url();?>Sitio/form_propuesta" class="btn btn-success">Crear una propuesta</a>
						<br>

						<?php } ?>
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

					</div>
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
<!-- Google Maps API v3
============================================= -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnOBLYrneZlLUF5_bhWzGnwc6I7s01qEs&callback=initMap" async defer></script>
<script type="text/javascript">
	$('#formComentario').validate({
			rules: {
				vComentario: {
					required: true,
					minlength: 10,
					maxlength: 150
				}
			},
			messages: {
				vComentario: {
					required: "Este campo es obligatorio",
					minlength: "El comentario debe contener un mínimo de 10 caracteres",
					maxlength: "El título puede contener un máximo de 150 caracteres"
				}

			}
		});	

	function initMap() {
		var nLatDec = $('#nLatDec').val();
		var nLongDec = $('#nLongDec').val();
		var key = 'AIzaSyBnOBLYrneZlLUF5_bhWzGnwc6I7s01qEs';
		var marker = "";

		if(nLatDec!="" && nLongDec!="") {
			/*var latLong = {lat: nLatDec, lng: nLongDec}
	        map = new google.maps.Map(document.getElementById('map'), {
	          zoom: 12,
	          center: latLong
	        });

	        var marker = new google.maps.Marker({
	          position: latLong,
	          map: map,
	          title: 'Propuesta'
	        });*/
	        zoom = 12;
	        maptype="roadmap"
	        marker = '&markers=color:blue%7Clabel:P%7C'+nLatDec+','+nLongDec;    
	        url = 'https://maps.googleapis.com/maps/api/staticmap?center='+nLatDec+','+nLongDec+'&zoom='+zoom+'&size=840x400&maptype='+maptype+marker+'&key='+key
		}
		else {
			nLatDec = 20.55489;
			nLongDec = -88.8236247;
			zoom = 8;
			maptype="terrain";
			url = '<?=base_url();?>img/mapa.jpg';
		}	

		var img = document.createElement("IMG");
		img.setAttribute('src',url);
		document.getElementById('map').appendChild(img);
	  }

	function apoya_propuesta(id) {
			$.post('<?=base_url();?>C_propuestas/apoyar_propuesta',{id:id}, function(resp){
				switch(resp)
				{
					case 'correcto' :  
						toastr.success('Correcto', 'Operación completa', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 2000 });
						document.getElementById("apoyar_prop").removeAttribute("onclick");
						document.getElementById("apoyar_prop").setAttribute("disabled",'');
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

		function responder(idcoment,nombre) {
			var resp_act = document.getElementById('idresp_com').value;
			if(resp_act!="") {				
				document.getElementById("li_comentario_"+resp_act).style.boxShadow = "";
			}
			
			document.getElementById("li_comentario_"+idcoment).style.boxShadow = "10px 10px 5px 0px #0c67a79e";
			document.getElementById('idresp_com').value=idcoment;
			document.getElementById("title-coment").innerText = "Respuesta al comentario de "+nombre;

		}

		function envia_comentario() {
			var idPropuesta = document.getElementById('idprop_com').value;
			var idComent = document.getElementById('idresp_com').value;
			var vComentario =  document.getElementById('vComentario').value;

			$.post('<?=base_url();?>C_propuestas/envia_comentario', {idprop:idPropuesta,idcom:idComent,com:vComentario}, function(resp){
				console.log(resp);
				if(resp==1) toastr.success('Correcto', 'Operación completa', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 2000 });
				else toastr.warning('Error al enviar su comentario', '¡Advertencia!', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 2000 });
			})
		}

		function like(reaccion,comentario) {
			var btn_reac = '';
			if(reaccion=='0') { btn_reac = 'dislike_'; btn_reac_op = 'like_';}
			else if(reaccion=='1') { btn_reac = 'like_'; btn_reac_op = 'dislike_';}
			$.post('<?=base_url();?>C_propuestas/like_comentario', {iLike:reaccion,iIdComentario:comentario}, function(resp) {
				var obj = JSON.parse(resp);
				var res = obj['res'];

				if(res==true) {
					$('#'+btn_reac+comentario).addClass('btn-like');
					if($('#'+btn_reac_op+comentario).hasClass("btn-like")==true)
						$('#'+btn_reac_op+comentario).removeClass('btn-like');
				}
				else console.log('error');
			});
		}

		function respuestas(iIdComentario) {
			$.post('<?=base_url();?>C_propuestas/respuestas', {iIdComentario:iIdComentario}, function(resp) {
				console.log(resp);
				$('#resp_'+iIdComentario).html(resp);
			});
		}

</script>