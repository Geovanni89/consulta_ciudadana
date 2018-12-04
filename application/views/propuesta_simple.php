
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
	<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.2&appId=305657250272074&autoLogAppEvents=1';
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>

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
										<li><a href="javascript:"><i class="icon-comments"></i> <?php echo $total_coment; echo ($total_coment>1)? " Comentarios":" Comentario"; ?></a></li>
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
											<div class="row" id="div_btn_apoyo">
											
												<?php 
													

													
												?>	

											<?php
											if(isset($_SESSION[PREFIJO.'_idusuario']))
											{
												$inicio = $inicio_voto[0]->vValor;
												$fin = $fin_voto[0]->vValor;
												$dFecha = date("Y-m-d");
												echo '<input type="hidden" name="valida_sesion" id="valida_sesion" value="1">';

												if($dFecha>=$inicio && $dFecha<=$fin) 
												{
													if($apoyo>0)
														echo '<div class="col-md-12"><button id="apoyar_prop" type="button" class="btn btn-outline-warning btn-lg btn-block">Usted ya ha apoyado esta propuesta</button></div>';
													else
														echo '<div class="col-md-6"><button id="apoyar_prop" type="button" class="btn btn-outline-success btn-lg btn-block" onclick="apoya_propuesta('.$iIdPropuesta.',1);">A favor</button></div>
														<div class="col-md-6"><button id="apoyar_prop_dislike" type="button" class="btn btn-outline-danger btn-lg btn-block" onclick="apoya_propuesta('.$iIdPropuesta.',0);">En contra</button></div>';
												}
												elseif($dFecha<$inicio) echo '<div class="col-md-12"><div id="error_sesion" class="style-msg2 errormsg"><div class="msgtitle">Votaciones</div><div class="sb-msg"><ul><li>Aún no inicia el periodo de votaciones</li></ul></div></div></div>';
												elseif($dFecha>$fin) echo '<div class="col-md-12"><div id="error_sesion" class="style-msg2 errormsg"><div class="msgtitle">Votaciones</div><div class="sb-msg"><ul><li>El período de votaciones ha concluido</li></ul></div></div></div>';


											}
											else echo '<div class="col-md-12"><div id="error_sesion" class="style-msg2 errormsg"><div class="msgtitle">Inicio de sesión</div><div class="sb-msg"><ul><li>Para poder apoyar una propuesta debe <a href="'.base_url().'Sitio/login?r=1">iniciar sesión</a> o <a href="'.base_url().'Sitio/registrarse">Registrarse</a></li></ul></div></div></div>';
											?>					
											</div>		
										</div>
										<?php echo $tDescripcion;?>


										<!-- Post Single - Content End -->

										<div class="entry clearfix">
											<div class="tabs nobottommargin topmargin clearfix" id="sidebar-tabs">
												<input type="hidden" name="nLatDec" id="nLatDec" value="<?php echo $nLatDec;?>">
												<input type="hidden" name="nLongDec" id="nLongDec" value="<?php echo $nLongDec; ?>">					

												<ul class="tab-nav clearfix">
													<li><a href="#tab-mapa"><i class="icon-map norightmargin"></i> Mapa</a></li>
													<li><a href="#tabs-doc"><i class="icon-files norightmargin"></i> Documentación
													</a></li>
													<li><a href="#tab-video"><i class="icon-line-video norightmargin"> Video</i></a></li>
												</ul>

												<div class="tab-container">

													<div class="tab-content clearfix" id="tab-mapa">
														<div id="map"></div>
													</div>
													<div class="tab-content clearfix" id="tabs-doc">
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
																else echo '<h4>La propuesta no cuenta con documentos</h4>';
															?>
															

														</div>
													</div>
													<div class="tab-content clearfix" id="tab-video">
														<?php
														if(strpos($video, 'youtube')!==false)
														{
															$idVideo = explode("=", $video);
														    echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$idVideo[1].'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
														}
														else
														    echo "<h4>La propuesta no cuenta con video</h4>";
														?>
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
												<a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo $url_actual; ?>" class="social-icon si-borderless si-facebook">
													<i class="icon-facebook"></i>
													<i class="icon-facebook"></i>
												</a>
												<a target="_blank" href="https://twitter.com/?status=Me gusta esta página <?php echo $url_actual; ?>" class="social-icon si-borderless si-twitter">
													<i class="icon-twitter"></i>
													<i class="icon-twitter"></i>
												</a>					
												<a target="_blank" href="https://plus.google.com/share?url=<?php echo $url_actual; ?>" class="social-icon si-borderless si-gplus">
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

									<h3 id="comments-title"><span><?php echo $total_coment; ?></span> <?php echo ($total_coment>1)? " Comentarios":" Comentario"; ?></h3>
									
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
													<a class="comment-reply-link" href="javascript:" onclick="responder('.$vcom->iIdComentario.',\''.$vcom->vNombre.'\');"><i class="icon-reply"></i></a>
													<div class="row">';
												if(isset($_SESSION[PREFIJO.'_idusuario']))
												{
													if($vcom->iLike=="")
													{
														echo '<div class="col-"><a id="like_'.$vcom->iIdComentario.'" href="javascript:" onclick="like(1,'.$vcom->iIdComentario.')"><i class="icon-thumbs-up"></i> Me gusta</a></div>
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														<div class="col-"><a id="dislike_'.$vcom->iIdComentario.'" href="javascript:" onclick="like(0,'.$vcom->iIdComentario.')"><i class="icon-thumbs-down"></i> No me gusta</a></div>';
													}
													elseif($vcom->iLike==0)
													{
														echo '<div class="col-"><a id="like_'.$vcom->iIdComentario.'" href="javascript:" onclick="like(1,'.$vcom->iIdComentario.')"><i class="icon-thumbs-up"></i> Me gusta</a></div>
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														<div class="col-"><a class="btn-like" id="dislike_'.$vcom->iIdComentario.'" href="javascript:"><i class="icon-thumbs-down"></i> No me gusta</a></div>';
													}
													elseif($vcom->iLike==1)
													{
														echo '<div class="col-"><a class="btn-like" id="like_'.$vcom->iIdComentario.'" href="javascript:"><i class="icon-thumbs-up"></i> Me gusta</a></div>
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														<div class="col-"><a id="dislike_'.$vcom->iIdComentario.'" href="javascript:" onclick="like(0,'.$vcom->iIdComentario.')"><i class="icon-thumbs-down"></i> No me gusta</a></div>';
													}
												}

													
												if($vcom->respuestas > 0)
												{
													echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													<div class="col"><a id="respuestas_'.$vcom->iIdComentario.'" href="javascript:" onclick="respuestas('.$vcom->iIdComentario.')">Ver respuestas</a></div>
													</div>
													</div>
													<div class="col" style="display: none;" id="container_respuesta_'.$vcom->iIdComentario.'"></div>
													<div class="clear"></div>
												</div>
												<div id="resp_'.$vcom->iIdComentario.'"></div>';

												}
												else
												{
													echo '</div></div>
													<div class="col" style="display: none;" id="container_respuesta_'.$vcom->iIdComentario.'"></div>
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
												<label for="comment">Comentario <i class="icon icon-asterisk text-danger"></i></label>
												<textarea name="comment" cols="58" rows="7" tabindex="4" class="sm-form-control" id="vComentario" name="comentario"></textarea>
											</div>

											<div class="col_full nobottommargin">
											<?php
												if(isset($_SESSION[PREFIJO.'_idusuario']))
												{
													echo '<button name="enviaComentario" type="button" id="enviaComentario" tabindex="5" onclick="envia_comentario();" class="button button-3d nomargin">Publicar comentario</button>';
												}
												else echo '<div class="col-md-12"><div id="error_sesion" class="style-msg2 errormsg"><div class="msgtitle">Inicio de sesión</div><div class="sb-msg"><ul><li>Para poder comentar la propuesta debe <a href="'.base_url().'Sitio/login?r=1">iniciar sesión</a> o <a href="'.base_url().'Sitio/registrarse">Registrarse</a></li></ul></div></div></div>';
											?>													
											</div>

										</form>

									</div><!-- #respond end -->

								</div><!-- #comments end -->

							</div>
						<!------------------------------------------------------------------------------------->
						</div><!-- #posts end -->						

					</div><!-- .postcontent end -->

					<!-- Sidebar
					============================================= 
					<div class="sidebar nobottommargin col_last clearfix">						
						<div class="sidebar-widgets-wrap">							

							<div class="widget clearfix">

								<h4>Selectores</h4>
								<div class="form-group">
									<label for="exampleFormControlSelect1">Sector</label>
									<select class="form-control" id="busqueda_sector">
										<option value="">Sector</option>
										<?php /*
											if($sectores!=false) 
											{
												foreach ($sectores as $vsec) {
													echo '<option value="'.$vsec->iIdSector.'">'.$vsec->vSector.'</option>';
												}
											}*/
										?>
									</select>
								</div>
								<div class="form-group">
									<label for="exampleFormControlSelect1">Temas</label>
									<select class="form-control" id="busqueda_tema">
										<option value="">Temas</option>										
									</select>
								</div>
								<div class="form-group">
									<label for="exampleFormControlSelect1">Orden</label>
									<select class="form-control" id="ordenamiento">
										<option value="">Orden</option>
										<option value="1">Votadas (de menor a mayor)</option>
										<option value="2">Votadas (de mayor a menor)</option>
										<option value="3">Más recientes</option>
										<option value="4">Más antiguas</option>										
									</select>
								</div>
							</div>

						</div>
						<hr>
					</div>


					<div class="sidebar nobottommargin col_last clearfix">
						<div class="sidebar-widgets-wrap">							

							<div class="widget clearfix">

								<h4>Palabras clave</h4>
								<div class="tagcloud">
									<input class="form-control mb-2" id="busqueda_palabras" type="text" placeholder="Ejemplo: Presupuesto">
								</div>

							</div>

						</div>

					</div>
					.sidebar end -->

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

	function apoya_propuesta(id,op) {
			$.post('<?=base_url();?>C_propuestas/apoyar_propuesta',{id:id,op:op}, function(resp){
				switch(resp)
				{
					case 'correcto' :  
						toastr.success('Operación completa', 'Correcto', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 2000 });
						$('#div_btn_apoyo').empty().html('<div class="col-md-12"><button id="apoyar_prop" type="button" class="btn btn-outline-warning btn-lg btn-block">Usted ya ha apoyado esta propuesta</button></div>');
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
			var valido = document.getElementById('valida_sesion');
			//console.log(valido);
			if(resp_act!="") {				
				document.getElementById("li_comentario_"+resp_act).style.boxShadow = "";
			}

			document.getElementById("li_comentario_"+idcoment).style.boxShadow = "10px 10px 5px 0px #abadaf";
			document.getElementById('idresp_com').value=idcoment;

			/*if(document.getElementById('container_respuesta_'+idcoment).childNodes.length > 0) {
				$('#container_respuesta_'+idcoment).addClass('animated fadeOutDown');
				$('#container_respuesta_'+idcoment).hide('slow');	
				$('#container_respuesta_'+idcoment).html('');
			} else {*/
				if(valido!==null && valido!=="undefined") {
					$('#container_respuesta_'+idcoment).html('<br><br><h4>Responder comentario <i class="icon icon-asterisk text-danger"></i></h4><textarea class="form-control" id="resp_coment_'+idcoment+'" name="resp_coment_'+idcoment+'" rows="5"></textarea><br><button class="btn btn-success" onclick="responder_comentario('+idcoment+');" id="btn_resp_'+idcoment+'">Responder</button>');
				}
				else {
					$('#container_respuesta_'+idcoment).html('<br><br><h4>Responder comentario <i class="icon icon-asterisk text-danger"></i></h4><textarea class="form-control" id="resp_coment_'+idcoment+'" name="resp_coment_'+idcoment+'" rows="5"></textarea><br><div class="col-md-12"><div class="style-msg errormsg" id="error_sesion"><div class="sb-msg"><i class="icon-remove"></i><strong>Inicio de sesión</strong> Para poder responder el comentario debe iniciar sesión.</div></div></div>');
				}

				$('#container_respuesta_'+idcoment).addClass('animated fadeInDown');
				$('#container_respuesta_'+idcoment).show('slow');				
			//}
			

		}

		function envia_comentario() {
			var idPropuesta = document.getElementById('idprop_com').value;
			var vComentario =  document.getElementById('vComentario').value;

			$.post('<?=base_url();?>C_propuestas/envia_comentario', {idprop:idPropuesta,com:vComentario}, function(resp){
				console.log(resp);
				if(resp==1) { toastr.success('Su comentario será validado por los moderadores y podrá verlo pronto', 'Correcto', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 5000 }); $('#vComentario').val("");}
				else toastr.warning('Error al enviar su comentario', '¡Advertencia!', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 2000 });
			});
		}

		function responder_comentario(idcoment) {
			var idPropuesta = document.getElementById('idprop_com').value;
			var vComentario =  document.getElementById('resp_coment_'+idcoment).value;

			$.post('<?=base_url();?>C_propuestas/envia_comentario', {idprop:idPropuesta,idcom:idcoment,com:vComentario}, function(resp){
				console.log(resp);
				if(resp==1) {
					toastr.success('Su comentario será validado por los moderadores y podrá verlo pronto', 'Correcto', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 5000 });
					$('#container_respuesta_'+idcoment).removeClass('fadeInDown').addClass('fadeOutDown');
					$('#container_respuesta_'+idcoment).hide('slow');					
					$('#container_respuesta_'+idcoment).html('').removeClass('animated fadeOutDown');
				}
				else toastr.warning('Error al enviar su comentario', '¡Advertencia!', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 2000 });
			});
		}

		function like(reaccion,comentario) {
			var btn_reac = '';
			if(reaccion=='0') { btn_reac = 'dislike_'; btn_reac_op = 'like_';}
			else if(reaccion=='1') { btn_reac = 'like_'; btn_reac_op = 'dislike_';}
			$.post('<?=base_url();?>C_propuestas/like_comentario', {iLike:reaccion,iIdComentario:comentario}, function(resp) {
				var obj = JSON.parse(resp);
				var res = obj['res'];

				if(res==true) {

					//onclick="like(0,'.$vcom->iIdComentario.')"
					//onclick="like(0,'.$vcom->iIdComentario.')"

					$('#'+btn_reac+comentario).addClass('btn-like').removeAttr("onclick");;
					if($('#'+btn_reac_op+comentario).hasClass("btn-like")==true) {
						$('#'+btn_reac_op+comentario).removeClass('btn-like');	
						if(btn_reac_op=='like_') $('#'+btn_reac_op+comentario).attr( "onclick","like(1,"+comentario+")");
						else if(btn_reac_op=='dislike_') $('#'+btn_reac_op+comentario).attr( "onclick","like(0,"+comentario+")");

					}
				}
				else console.log('error');
			});
		}

		function respuestas(iIdComentario) {
			$.post('<?=base_url();?>C_propuestas/respuestas', {iIdComentario:iIdComentario}, function(resp) {
				$('#resp_'+iIdComentario).html(resp);
			});
		}

		function comp_face() {
			FB.ui({
			  method: 'share',
			  href: 'https://siegy.yucatan.gob.mx',
			}, function(response){});
		}
</script>