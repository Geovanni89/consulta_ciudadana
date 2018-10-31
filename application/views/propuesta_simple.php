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
			<li><i class="icon-calendar3"></i> 22/10/2018</li>
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
				<button type="button" class="btn btn-outline-success btn-lg btn-block">Apoyar</button>
			</div>
			<?php echo $tDescripcion;?>


			<!-- Post Single - Content End -->

			<div class="entry clearfix">
				<div class="tabs nobottommargin topmargin clearfix" id="sidebar-tabs">
					<input type="hidden" name="nLatDec" id="nLatDec" value="<?php echo $nLatDec;?>">
					<input type="hidden" name="nLongDec" id="nLongDec" value="<?php echo $nLongDec; ?>">					

					<ul class="tab-nav clearfix">
						<li><a href="#tab-mapa">Mapa</a></li>
						<li><a href="#tabs-2">Documentación</a></li>
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
											
											
											echo '<div class="spost clearfix">
													<div class="entry-image">
														<a href="javascript:" class="nobg"><img class="rounded-circle" src="'.base_url().'public/images/magazine/small/3.jpg" alt=""></a>
													</div>
													<div class="entry-c">										
														<div class="entry-title">
															<h4><a href="'.base_url().$vpdf->vRutaAdjunto.'">'.$vpdf->vNombreAdjunto.'</a></h4>
														</div>
														<ul class="entry-meta">
															<li>'.$vpdf->dFecha.'</li>
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
			<div class="tagcloud clearfix bottommargin">
				<a href="#">general</a>
				<a href="#">information</a>
				<a href="#">media</a>
				<a href="#">press</a>
				<a href="#">gallery</a>
				<a href="#">illustration</a>
			</div><!-- .tagcloud end -->

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


	<div class="line"></div>


	<!-- Comments
	============================================= -->
	<div id="comments" class="clearfix">

		<h3 id="comments-title"><span>3</span> Comments</h3>

		<!-- Comments List
		============================================= -->
		<ol class="commentlist clearfix">

			<li class="comment even thread-even depth-1" id="li-comment-1">

				<div id="comment-1" class="comment-wrap clearfix">

					<div class="comment-meta">

						<div class="comment-author vcard">

							<span class="comment-avatar clearfix">
							<img alt='' src='http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=60' class='avatar avatar-60 photo avatar-default' height='60' width='60' /></span>

						</div>

					</div>

					<div class="comment-content clearfix">
						<div class="comment-author">Elías Abdala<span><a href="#" title="Permalink to this comment">22/10/2018 . 10:46 am</a></span></div>
						<p>Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>
						<a class='comment-reply-link' href='#'><i class="icon-reply"></i></a>
					</div>

					<div class="clear"></div>

				</div>


				<ul class='children'>

					<li class="comment byuser comment-author-_smcl_admin odd alt depth-2" id="li-comment-3">

						<div id="comment-3" class="comment-wrap clearfix">

							<div class="comment-meta">

								<div class="comment-author vcard">

									<span class="comment-avatar clearfix">
									<img alt='' src='http://1.gravatar.com/avatar/30110f1f3a4238c619bcceb10f4c4484?s=40&amp;d=http%3A%2F%2F1.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D40&amp;r=G' class='avatar avatar-40 photo' height='40' width='40' /></span>

								</div>

							</div>

							<div class="comment-content clearfix">
								<div class="comment-author"><a href='#' rel='external nofollow' class='url'>Jorge Estrella</a><span><a href="#" title="Permalink to this comment">23/10/2018 . 1:03 am</a></span></div>
								<p>Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
								<a class='comment-reply-link' href='#'><i class="icon-reply"></i></a>
							</div>

							<div class="clear"></div>

						</div>


					</li>

				</ul>

			</li>

			<li class="comment byuser comment-author-_smcl_admin even thread-odd thread-alt depth-1" id="li-comment-2">

				<div id="comment-2" class="comment-wrap clearfix">

					<div class="comment-meta">

						<div class="comment-author vcard">

							<span class="comment-avatar clearfix">
							<img alt='' src='http://1.gravatar.com/avatar/30110f1f3a4238c619bcceb10f4c4484?s=60&amp;d=http%3A%2F%2F1.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D60&amp;r=G' class='avatar avatar-60 photo' height='60' width='60' /></span>

						</div>

					</div>

					<div class="comment-content clearfix">

						<div class="comment-author"><a href='http://themeforest.net/user/semicolonweb' rel='external nofollow' class='url'>SemiColon</a><span><a href="#" title="Permalink to this comment">April 25, 2012 at 1:03 am</a></span></div>

						<p>Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>

						<a class='comment-reply-link' href='#'><i class="icon-reply"></i></a>

					</div>

					<div class="clear"></div>

				</div>

			</li>

		</ol><!-- .commentlist end -->

		<div class="clear"></div>

		<!-- Comment Form
		============================================= -->
		<div id="respond" class="clearfix">

			<h3>Deja tu comentario</h3>

			<form class="clearfix" action="#" method="post" id="commentform">

				<div class="clear"></div>

				<div class="col_full">
					<label for="comment">Comentario</label>
					<textarea name="comment" cols="58" rows="7" tabindex="4" class="sm-form-control"></textarea>
				</div>

				<div class="col_full nobottommargin">
					<button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit" class="button button-3d nomargin">Publicar comentario</button>
				</div>

			</form>

		</div><!-- #respond end -->

	</div><!-- #comments end -->

</div>
<!-- Google Maps API v3
============================================= -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnOBLYrneZlLUF5_bhWzGnwc6I7s01qEs&callback=initMap" async defer></script>
<script type="text/javascript">
	function initMap() {

			var nLatDec = $('#nLatDec').val(); console.log(typeof nLatDec);
			var nLongDec = $('#nLongDec').val(); console.log(typeof nLongDec);
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
		        url = 'https://maps.googleapis.com/maps/api/staticmap?center='+nLatDec+','+nLongDec+'&zoom='+zoom+'&size=600x300&maptype='+maptype+marker+'&key='+key
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
</script>