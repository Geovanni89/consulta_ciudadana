<?php 
/*
1.-ECONOMÍA
2.-SOCIALES
3.-CULTURALES
4.-AMBIENTALES
5.-EJE TRANSVERSAL
*/
	$alto = 150;
	$alto2 = 325;
	$rutaimagen = base_url().'/img/ejes/';
	$rutaicon = base_url().'img/matriz/';

//arreglos para pintar la matriz
$ejes[0] = array('id'=>1,'eje'=>'ECONOMÍA');
$ejes[1] = array('id'=>2,'eje'=>'SOCIALES');
$ejes[2] = array('id'=>3,'eje'=>'CULTURALES');
$ejes[3] = array('id'=>4,'eje'=>'AMBIENTALES');
$ejes[4] = array('id'=>5,'eje'=>'EJE TRANSVERSAL');

$temas[1] = array('tema'=>'Competividad', 'alto'=>150, 'url' => $rutaimagen.'competividad.jpg','url_icon' => $rutaicon.'i_competitividad.png');
$temas[1] = array('tema'=>'Comercial y turística', 'alto'=>150, 'url' => $rutaimagen.'comercialyturistica.jpg','url_icon' => $rutaicon.'i_comercial_turistica.png');
$temas[1] = array('tema'=>'Industrial', 'alto'=>150, 'url' => $rutaimagen.'industrial.jpg','url_icon' => $rutaicon.'i_industrial.png');
$temas[1] = array('tema'=>'Capital humano', 'alto'=>150, 'url' => $rutaimagen.'capitalhumano.jpg','url_icon' => $rutaicon.'i_Capital-humano.png');
$temas[1] = array('tema'=>'Seguridad patrimonial', 'alto'=>325, 'url' => $rutaimagen.'seguridadpatrimonial.jpg','url_icon' => $rutaicon.'i_Seguridad-patrimonial.png');
$temas[1] = array('tema'=>'Ciencia y tecnología', 'alto'=>150, 'url' => $rutaimagen.'cienciaytecnologia.jpg','url_icon' => $rutaicon.'i_Ciencia-y-tecnología.png');
$temas[1] = array('tema'=>'Empleo y fomento al emprendedurismo', 'alto'=>150, 'url' => $rutaimagen.'empleoyfomentoalemprendedurismo.jpg','url_icon' => $rutaicon.'i_Empleo-y-fomento-al-emprendedurismo.png');
$temas[2] = array('tema'=>'Alimentaria', 'alto'=>150, 'url' => $rutaimagen.'alimentaria.jpg','url_icon' => $rutaicon.'i_Alimentaria.png');
$temas[2] = array('tema'=>'Vivienda', 'alto'=>150, 'url' => $rutaimagen.'vivienda.jpg','url_icon' => $rutaicon.'i_Vivienda.png');
$temas[2] = array('tema'=>'Salud', 'alto'=>150, 'url' => $rutaimagen.'salud.jpg','url_icon' => $rutaicon.'i_Salud.png');
$temas[2] = array('tema'=>'Desarrollo rural y pesquero', 'alto'=>150, 'url' => $rutaimagen.'desarrolloruralypesquero.jpg','url_icon' => $rutaicon.'i_Desarrollo-rural-y-pesquero.png');
$temas[2] = array('tema'=>'Seguridad social', 'alto'=>150, 'url' => $rutaimagen.'seguridadsocial.jpg','url_icon' => $rutaicon.'i_Seguridad-social.png');
$temas[2] = array('tema'=>'Inclusión social', 'alto'=>150, 'url' => $rutaimagen.'inclusionsocial.jpg','url_icon' => $rutaicon.'i_Inclusión-social.png');
$temas[2] = array('tema'=>'Seguridad y estado de derecho', 'alto'=>150, 'url' => $rutaimagen.'seguridadyestadodederecho.jpg','url_icon' => $rutaicon.'i_Seguridad-y-Estado-de-derecho.png');
$temas[2] = array('tema'=>'Pueblos indígenas', 'alto'=>150, 'url' => $rutaimagen.'pueblosindigenas.jpg','url_icon' => $rutaicon.'i_Pueblos-indígenas.png');
$temas[3] = array('tema'=>'Educación universal', 'alto'=>150, 'url' => $rutaimagen.'educacionuniversal.jpg','url_icon' => $rutaicon.'i_Educación_u.png');
$temas[3] = array('tema'=>'Deporte de alto rendimiento', 'alto'=>325, 'url' => $rutaimagen.'deportedealtorendimiento.jpg','url_icon' => $rutaicon.'i_Deporte_alto.png');
$temas[3] = array('tema'=>'Educación de calidad', 'alto'=>150, 'url' => $rutaimagen.'educaciondecalidad.jpg','url_icon' => $rutaicon.'i_Educación_c.png');
$temas[3] = array('tema'=>'Cultura tradicional', 'alto'=>150, 'url' => $rutaimagen.'culturatradicional.jpg','url_icon' => $rutaicon.'i_cultura-tra.png');
$temas[3] = array('tema'=>'Deporte incluyente', 'alto'=>325, 'url' => $rutaimagen.'deporteincluyente.jpg','url_icon' => $rutaicon.'i_deporte_inc.png');
$temas[3] = array('tema'=>'Bellas artes', 'alto'=>150, 'url' => $rutaimagen.'bellasartes.jpg','url_icon' => $rutaicon.'i_bellas_artes.png');
$temas[4] = array('tema'=>'Hídrica', 'alto'=>150, 'url' => $rutaimagen.'hidrica.jpg','url_icon' => $rutaicon.'i_hidirca.png');
$temas[4] = array('tema'=>'Movilidad sustentable y conectividad regional', 'alto'=>325, 'url' => $rutaimagen.'movilidadsustentableyconectividadregional.jpg','url_icon' => $rutaicon.'i_movilidad.png');
$temas[4] = array('tema'=>'Energética', 'alto'=>150, 'url' => $rutaimagen.'energetica.jpg','url_icon' => $rutaicon.'i_energetica.png');
$temas[4] = array('tema'=>'Cambio climático y sustentabilidad', 'alto'=>150, 'url' => $rutaimagen.'cambioclimaticoysustentabilidad.jpg','url_icon' => $rutaicon.'i_cambio_cli.png');
$temas[4] = array('tema'=>'Manejo integral de residuos', 'alto'=>150, 'url' => $rutaimagen.'manejointegralderesiduos.jpg','url_icon' => $rutaicon.'i_manejo.png');
$temas[4] = array('tema'=>'Ordenamiento urbano y territorial', 'alto'=>150, 'url' => $rutaimagen.'ordenamientourbanoyterritorial.jpg','url_icon' => $rutaicon.'i_ordenamiento.png');
$temas[4] = array('tema'=>'Conservación de recursos naturales', 'alto'=>150, 'url' => $rutaimagen.'consevacionderecursosnaturales.jpg','url_icon' => $rutaicon.'i_conservacion.png');
$temas[5] = array('tema'=>'Equidad de género', 'alto'=>150, 'url' => $rutaimagen.'img/ejes/igualdad.jpg','url_icon' => $rutaicon.'i_Igualdad-de-género.png');
$temas[5] = array('tema'=>'Gobierno austero, abierto, innovador y eficiente', 'alto'=>150, 'url' => $rutaimagen.'gobiernoaustero.jpg','url_icon' => $rutaicon.'i_gobierno.png');
$temas[5] = array('tema'=>'Infraestructura y proyectos estratégicos', 'alto'=>150, 'url' => $rutaimagen.'infraestructura.jpg','url_icon' => $rutaicon.'i_infraestructura.png');
//==============================================================================================

	switch ($active) {
		case 6:
			$flip_efect = 'flip-card';
			$flip_back = '<div class="flip-card-back bg-danger no-after" data-height-xl="<?=$alto?>">
							<div class="flip-card-inner">
								<button type="button" class="btn btn-outline-light mt-2" onclick="MostrarInfografía(0);"><i class="icon icon-search"></i></button>
							</div>
						</div>';
			break;
		
		case 7:
			$flip_efect = '';
			$flip_back = '';
			break;
	}
?>

<div class="">
						<div class="feature-box fbox-center fbox-light fbox-plain">
							<h3 style="font-size: 24px;color: #1a4a60; font-weight: 1200;"><strong>MATRIZ DE EJES<br>PED 2018-2024</strong></h3>
						</div>
					</div>
					<?php /*
					foreach ($ejes as $v) {
    					echo "Valor actual es:".$v['eje'];
					}		
 					print_r($ejes); 
					 print_r($temas); */ ?>
					<div class="row">
						<!-- Economía --->
						<div class="col-lg-3">
							<h2 class="text-center" style="color: #4d4d4d;"><b>ECONOMÍA</b></h2>

							<div class="row grid-container" data-layout="masonry" style="overflow: visible">

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center">
										<div class="flip-card-front" style="background-image: url('<?=$rutaimagen;?>competividad.jpg?v=1.3')" data-height-xl="<?=$alto?>">
											<div class="flip-card-inner">
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_competitividad.png" class="h1">
														<p style="font-size: 14px">Competividad</p>
													</div>
												</div>
											</div>
										</div>
										<?=$flip_back;?>
									</div>
								</div>
						

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center">
										<div class="flip-card-front dark" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen;?>comercialyturistica.jpg');">
											<div class="flip-card-inner">													
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_comercial_turistica.png">
														<p style="font-size: 14px">Comercial y turística</p>
													</div>
												</div>
											</div>
										</div>
										<?=$flip_back;?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center">
										<div class="flip-card-front bg-info dark" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen;?>industrial.jpg');">
											<div class="flip-card-inner">
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_industrial.png">
														<p style="font-size: 14px;">Industrial</p>
													</div>
												</div>
											</div>
										</div>
										<?=$flip_back;?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center">
										<div class="flip-card-front dark" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen;?>capitalhumano.jpg');">
											<div class="flip-card-inner">
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_Capital-humano.png">
														<p style="font-size: 14px;">Capital humano</p>
													</div>
												</div>
											</div>
										</div>
										<?=$flip_back;?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center">
										<div class="flip-card-front bg-info dark" data-height-xl="<?=$alto2?>" style="background-image: url('<?=$rutaimagen;?>seguridadpatrimonial.jpg?v=1');">
											<div class="flip-card-inner">
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">												
														<img src="<?=base_url();?>img/matriz/i_Seguridad-patrimonial.png">
														<p style="font-size: 14px;">Seguridad patrimonial</p>
													</div>
												</div>
											</div>
										</div>
										<?=$flip_back;?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center">
										<div class="flip-card-front dark" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen;?>cienciaytecnologia.jpg');">
											<div class="flip-card-inner">												
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_Ciencia-y-tecnología.png">
														<p style="font-size: 14px;">Ciencia y tecnología</p>
													</div>
												</div>
											</div>
										</div>
										<?=$flip_back;?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center">
										<div class="flip-card-front dark" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen;?>empleoyfomentoalemprendedurismo.jpg');">
											<div class="flip-card-inner">
												<div class="flip-card-inner">
													<div class="card nobg noborder text-center">
														<div class="card-body nopadding">
															<img src="<?=base_url();?>img/matriz/i_Empleo-y-fomento-al-emprendedurismo.png">
															<p style="font-size: 14px;">Empleo y <br>fomento al emprendedurismo</p>
														</div>
													</div>
												</div>
											</div>
										</div>
										<?=$flip_back;?>
									</div>
								</div>
							</div>
							
						</div>
						<!-- Economía --->

						<!-- Sociales --->
						<div class="col-lg-3">
							<h2 class="text-center" style="color: #4d4d4d;"><b>SOCIALES</b></h2>
							<div class="row grid-container" data-layout="masonry" style="overflow: visible">
								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center">
										<div class="flip-card-front dark" style="background-image: url('<?=$rutaimagen;?>alimentaria.jpg')" data-height-xl="<?=$alto?>">
											<div class="flip-card-inner">
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_Alimentaria.png">
														<p style="font-size: 14px;">Alimentaria</p>
													</div>
												</div>
											</div>
										</div>
										<?=$flip_back;?>
									</div>
								</div>
						

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center">
										<div class="flip-card-front dark" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen;?>vivienda.jpg');">
											<div class="flip-card-inner">
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_Vivienda.png">
														<p class="card-title">Vivienda</p>
													</div>
												</div>
											</div>
										</div>
										<?=$flip_back;?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center">
										<div class="flip-card-front bg-info dark" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen;?>salud.jpg');">
											<div class="flip-card-inner">
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_Salud.png">
														<p class="card-title">Salud</p>
													</div>
												</div>
											</div>
										</div>
										<?=$flip_back;?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center">
										<div class="flip-card-front dark" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen;?>desarrolloruralypesquero.jpg');">
											<div class="flip-card-inner">
												<div class="card nobg noborder">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_Desarrollo-rural-y-pesquero.png">
														<p class="card-title mb-0">Desarrollo rural y pesquero</p>
													</div>
												</div>
											</div>
										</div>
										<?=$flip_back;?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center">
										<div class="flip-card-front bg-info dark" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen;?>seguridadsocial.jpg');">
											<div class="flip-card-inner">
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_Seguridad-social.png">
														<p>Seguridad social</p>
													</div>
												</div>
											</div>
										</div>
										<?=$flip_back;?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center">
										<div class="flip-card-front dark" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen;?>inclusionsocial.jpg');">
											<div class="flip-card-inner">
												<div class="card nobg noborder">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_Inclusión-social.png">
														<p>Inclusión social</p>
													</div>
												</div>
											</div>
										</div>
										<?=$flip_back;?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center">
										<div class="flip-card-front dark" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen;?>seguridadyestadodederecho.jpg');">
											<div class="flip-card-inner">
												<div class="card nobg noborder">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_Seguridad-y-Estado-de-derecho.png">
														<p style="font-size: 14px;">Seguridad y estado de derecho</p>														
													</div>
												</div>
											</div>
										</div>
										<?=$flip_back;?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center">
										<div class="flip-card-front" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen;?>pueblosindigenas.jpg');">
											<div class="flip-card-inner">
												<div class="card nobg noborder">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_Pueblos-indígenas.png">
														<p>Pueblos indígenas</p>														
													</div>
												</div>
											</div>
										</div>
										<?=$flip_back;?>
									</div>
								</div>
							</div>
						</div>
						<!-- Sociales --->

						<!-- Culturales --->
						<div class="col-lg-3">
							<h2 class="text-center" style="color: #4d4d4d;"><b>CULTURALES</b></h2>

							<div class="row grid-container" data-layout="masonry" style="overflow: visible">
								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center">
										<div class="flip-card-front dark" style="background-image: url('<?=$rutaimagen;?>educacionuniversal.jpg')" data-height-xl="<?=$alto?>">
											<div class="flip-card-inner">
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_Educación_u.png">
														<p class="card-title">Educación universal</p>
													</div>
												</div>
											</div>
										</div>
										<?=$flip_back;?>
									</div>
								</div>
						

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center">
										<div class="flip-card-front dark" data-height-xl="<?=$alto2?>" style="background-image: url('<?=$rutaimagen;?>deportedealtorendimiento.jpg');">
											<div class="flip-card-inner">
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_Deporte_alto.png">
														<p class="card-title" style="font-size: 14px;">Deporte de alto rendimiento</p>
													</div>
												</div>
											</div>
										</div>
										<?=$flip_back;?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center">
										<div class="flip-card-front dark" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen;?>educaciondecalidad.jpg');">
											<div class="flip-card-inner">
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_Educación_c.png">
														<p class="card-title">Educación de calidad</p>
													</div>
												</div>
											</div>
										</div>
										<?=$flip_back;?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center">
										<div class="flip-card-front dark" style="background-image: url('<?=$rutaimagen;?>culturatradicional.jpg')" data-height-xl="<?=$alto?>">
											<div class="flip-card-inner">
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_cultura-tra.png">
														<p class="card-title">Cultura tradicional</p>
													</div>
												</div>
											</div>
										</div>
										<?=$flip_back;?>
									</div>
								</div>
						

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center">
										<div class="flip-card-front dark" data-height-xl="<?=$alto2?>" style="background-image: url('<?=$rutaimagen;?>deporteincluyente.jpg');">
											<div class="flip-card-inner">
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_deporte_inc.png">
														<p class="card-title" class="card-title">Deporte incluyente</p>
													</div>
												</div>
											</div>
										</div>
										<?=$flip_back;?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center">
										<div class="flip-card-front dark" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen;?>bellasartes.jpg');">
											<div class="flip-card-inner">
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_bellas_artes.png">
														<p class="card-title" class="card-title">Bellas artes</p>
													</div>
												</div>
											</div>
										</div>
										<?=$flip_back;?>
									</div>
								</div>

							</div>
							
						</div>
						<!-- Culturales --->

						<!-- Ambientales --->
						
						<div class="col-lg-3">
							<h2>AMBIENTALES</h2>
							<div class="row grid-container" data-layout="masonry" style="overflow: visible">
								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center">
										<div class="flip-card-front dark" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen;?>hidrica.jpg');">
											<div class="flip-card-inner">
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_hidirca.png">
														<p>Hídrica</p>
													</div>
												</div>
											</div>
										</div>
										<?=$flip_back;?>
									</div>
								</div>
						

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center">
										<div class="flip-card-front dark" data-height-xl="<?=$alto2?>" style="background-image: url('<?=$rutaimagen;?>movilidadsustentableyconectividadregional.jpg');">
											<div class="flip-card-inner">
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_movilidad.png">
														<p class="card-title" style="font-size: 13px;">Movilidad sustentable y conectividad regional</p>														
													</div>
												</div>
											</div>
										</div>
										<?=$flip_back;?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center">
										<div class="flip-card-front bg-info dark" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen;?>energetica.jpg');">
											<div class="flip-card-inner">
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_energetica.png">
														<p class="card-title">Energética</p>
													</div>
												</div>
											</div>
										</div>
										<?=$flip_back;?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center">
										<div class="flip-card-front dark" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen;?>cambioclimaticoysustentabilidad.jpg');">
											<div class="flip-card-inner">
												<div class="card nobg noborder">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_cambio_cli.png">
														<p class="card-title mb-0" style="font-size: 14px;">Cambio climático y sustentabilidad</p>														
													</div>
												</div>
											</div>
										</div>
										<?=$flip_back;?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center">
										<div class="flip-card-front bg-info dark" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen;?>manejointegralderesiduos.jpg');">
											<div class="flip-card-inner">
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_manejo.png">
														<p>Manejo integral de residuos</p>
													</div>
												</div>
											</div>
										</div>
										<?=$flip_back;?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center">
										<div class="flip-card-front dark" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen;?>ordenamientourbanoyterritorial.jpg');">
											<div class="flip-card-inner">
												<div class="card nobg noborder">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_ordenamiento.png">
														<p style="font-size: 14px;">Ordenamiento urbano y territorial</p>
													</div>
												</div>
											</div>
										</div>
										<?=$flip_back;?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center">
										<div class="flip-card-front dark" data-height-xl="<?=$alto?>" style="background-image: url('<?=$rutaimagen?>/consevacionderecursosnaturales.jpg');">
											<div class="flip-card-inner">
												<div class="card nobg noborder">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_conservacion.png">
														<p style="font-size: 12px;">Conservación de recursos naturales</p>														
													</div>
												</div>
											</div>
										</div>
										<?=$flip_back;?>
									</div>
								</div>
							</div>


						</div>

						<!-- Ambientales --->
						<!-- ambientales colores

						</div>
						-->
					</div>

					<div class="fancy-title title-center title-dotted-border topmargin-sm">
					<h3 style="color: #4d4d4d;"><b>EJE TRANSVERSAL</b></h3>
				</div>

				<div class="row grid-container" data-layout="masonry" style="overflow: visible">
					<div class="col-lg-4 mb-4">
						<div class="<?=$flip_efect;?> text-center">
							<div class="flip-card-front dark" style="background-image: url('<?=base_url();?>img/ejes/igualdad.jpg')" data-height-xl="<?=$alto;?>">
								<div class="flip-card-inner">
									<div class="card nobg noborder text-center">
										<div class="card-body nopadding">
											<!--<i class="icon-line2-camera h1"></i>-->
											<img src="<?=base_url();?>img/matriz/i_Igualdad-de-género.png">
											<p class="card-text t400">Equidad de género</p>
										</div>
									</div>
								</div>
							</div>
							<?=$flip_back;?>
						</div>
					</div>

					<div class="col-lg-4 mb-4">
						<div class="<?=$flip_efect;?> text-center">
							<div class="flip-card-front dark" style="background-image: url('<?=$rutaimagen?>/gobiernoaustero.jpg');" data-height-xl="<?=$alto;?>">
								<div class="flip-card-inner">
									<div class="card nobg noborder text-center">
										<div class="card-body nopadding">
											<img src="<?=base_url();?>img/matriz/i_gobierno.png">
											<p class="card-text t400">Gobierno austero, abierto, innovador y eficiente</p>
										</div>
									</div>
								</div>
							</div>
							<?=$flip_back;?>
						</div>
					</div>

					<div class="col-lg-4 mb-4">
						<div class="<?=$flip_efect;?> text-center">
							<div class="flip-card-front dark" data-height-xl="<?=$alto;?>" style="background-image: url('<?=$rutaimagen?>/infraestructura.jpg');">
								<div class="flip-card-inner">
									<div class="card nobg noborder text-center">
										<div class="card-body nopadding">
											<img src="<?=base_url();?>img/matriz/i_infraestructura.png">
											<p class="card-text t400">Infraestructura y proyectos estratégicos</p>
										</div>
									</div>
								</div>
							</div>
							<?=$flip_back;?>
						</div>
					</div>
				</div>