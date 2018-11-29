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
//==============================================================================================

	switch ($active) {
		case 1:
			$flip_efect = '';			
			$cursor = '';
			$titulo = '<div class=""><div class="feature-box fbox-center fbox-light fbox-plain"><h3 style="font-size: 24px;color: #1a4a60; font-weight: 1200;"><strong>MATRIZ DE EJES<br>PED 2018-2024</strong></h3></div></div>';
			break;
		case 6:
			$flip_efect = 'flip-card';			
			$cursor = '';
			$titulo = '<div class="heading-block center"><h1>¿Quieres enviar una propuesta?</h1><span>¡Participa! Da clic en el eje al que creas que pertenece y sé parte de Tu Plan Estatal de Desarrollo.</span></div>';
			break;
		
		case 7:
			$flip_efect = '';			
			$cursor = 'style="cursor: pointer;"';
			$titulo = '<div class="heading-block center"><h2></h2><span>Selecciona los tres temas que consideras deberían tener mayor presupuesto en los próximos años. </span></div>';
			break;
	}
?>
					
					<!--<div class="">
						<div class="feature-box fbox-center fbox-light fbox-plain">
							<h3 style="font-size: 24px;color: #1a4a60; font-weight: 1200;"><strong>MATRIZ DE EJES<br>PED 2018-2024</strong></h3>
						</div>
					</div>-->
					<?php 
					echo $titulo;
					/*
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
									<div class="<?=$flip_efect;?> text-center"  <?php echo ($active==7) ? 'onclick="selecciona_temas(1);"':''; echo $cursor;?> >										
											<div class="flip-card-front bg-secondary dark" id="tema_1" data-height-xl="<?=$alto2?>">
											<div class="flip-card-inner">
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_des_comercial.png" class="h1">
														<p style="font-size: 14px">Desarrollo comercial y fortalecimiento de la demanda interna</p>
													</div>
												</div>
											</div>
										</div>
										<?php if($active==6) echo '<div class="flip-card-back bg-info no-after" data-height-xl="'.$alto2.'">
											<div class="flip-card-inner">
												<button type="button" class="btn btn-outline-light mt-2" onclick="MostrarInfografía(0);"><i class="icon icon-search"></i></button>
											</div>
										</div>'; ?>
									</div>
								</div>
						

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center"  <?php echo ($active==7) ? 'onclick="selecciona_temas(2);"':''; echo $cursor;?> >										
											<div class="flip-card-front bg-secondary dark" id="tema_2" data-height-xl="<?=$alto2?>">
											<div class="flip-card-inner">													
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_competitividad.png">
														<p style="font-size: 14px">Competitividad e Inversión Extranjeta</p>
													</div>
												</div>
											</div>
										</div>
										<?php if($active==6) echo '<div class="flip-card-back bg-info no-after" data-height-xl="'.$alto2.'">
											<div class="flip-card-inner">
												<button type="button" class="btn btn-outline-light mt-2" onclick="MostrarInfografía(0);"><i class="icon icon-search"></i></button>
											</div>
										</div>'; ?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center"  <?php echo ($active==7) ? 'onclick="selecciona_temas(3);"':''; echo $cursor;?> >										
											<div class="flip-card-front bg-secondary dark" id="tema_3" data-height-xl="<?=$alto2?>">
											<div class="flip-card-inner">
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_capital_hum.png">
														<p style="font-size: 14px;">Capital humano generador de desarrollo y trabajo decente</p>
													</div>
												</div>
											</div>
										</div>
										<?php if($active==6) echo '<div class="flip-card-back bg-info no-after" data-height-xl="'.$alto2.'">
											<div class="flip-card-inner">
												<button type="button" class="btn btn-outline-light mt-2" onclick="MostrarInfografía(0);"><i class="icon icon-search"></i></button>
											</div>
										</div>'; ?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center"  <?php echo ($active==7) ? 'onclick="selecciona_temas(4);"':''; echo $cursor;?> >										
											<div class="flip-card-front bg-secondary dark" id="tema_4" data-height-xl="<?=$alto?>">
											<div class="flip-card-inner">
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_desarrollo-agri.png">
														<p style="font-size: 14px;">Desarrollo agrícola</p>
													</div>
												</div>
											</div>
										</div>
										<?php if($active==6) echo '<div class="flip-card-back bg-info no-after" data-height-xl="'.$alto.'">
											<div class="flip-card-inner">
												<button type="button" class="btn btn-outline-light mt-2" onclick="MostrarInfografía(0);"><i class="icon icon-search"></i></button>
											</div>
										</div>'; ?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center"  <?php echo ($active==7) ? 'onclick="selecciona_temas(5);"':''; echo $cursor;?> >										
											<div class="flip-card-front bg-secondary dark" id="tema_5" data-height-xl="<?=$alto?>">
											<div class="flip-card-inner">
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">												
														<img src="<?=base_url();?>img/matriz/i_desarrollo-pesquero.png">
														<p style="font-size: 14px;">Desarrollo pesquero</p>
													</div>
												</div>
											</div>
										</div>
										<?php if($active==6) echo '<div class="flip-card-back bg-info no-after" data-height-xl="'.$alto.'">
											<div class="flip-card-inner">
												<button type="button" class="btn btn-outline-light mt-2" onclick="MostrarInfografía(0);"><i class="icon icon-search"></i></button>
											</div>
										</div>'; ?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center"  <?php echo ($active==7) ? 'onclick="selecciona_temas(6);"':''; echo $cursor;?> >										
											<div class="flip-card-front bg-secondary dark" id="tema_6" data-height-xl="<?=$alto2?>">
											<div class="flip-card-inner">												
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_fomento_emp.png">
														<p style="font-size: 14px;">Fomento empresarial y al emprendedurismo</p>
													</div>
												</div>
											</div>
										</div>
										<?php if($active==6) echo '<div class="flip-card-back bg-info no-after" data-height-xl="'.$alto2.'">
											<div class="flip-card-inner">
												<button type="button" class="btn btn-outline-light mt-2" onclick="MostrarInfografía(0);"><i class="icon icon-search"></i></button>
											</div>
										</div>'; ?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center"  <?php echo ($active==7) ? 'onclick="selecciona_temas(7);"':''; echo $cursor;?> >										
											<div class="flip-card-front bg-secondary dark" id="tema_7" data-height-xl="<?=$alto?>">
											<div class="flip-card-inner">
												<div class="flip-card-inner">
													<div class="card nobg noborder text-center">
														<div class="card-body nopadding">
															<img src="<?=base_url();?>img/matriz/i_imp_turistica.png">
															<p style="font-size: 14px;">Impulso al turismo</p>
														</div>
													</div>
												</div>
											</div>
										</div>
										<?php if($active==6) echo '<div class="flip-card-back bg-info no-after" data-height-xl="'.$alto.'">
											<div class="flip-card-inner">
												<button type="button" class="btn btn-outline-light mt-2" onclick="MostrarInfografía(0);"><i class="icon icon-search"></i></button>
											</div>
										</div>'; ?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center"  <?php echo ($active==7) ? 'onclick="selecciona_temas(8);"':''; echo $cursor;?> >										
											<div class="flip-card-front bg-secondary dark" id="tema_8" data-height-xl="<?=$alto?>">
											<div class="flip-card-inner">
												<div class="flip-card-inner">
													<div class="card nobg noborder text-center">
														<div class="card-body nopadding">
															<img src="<?=base_url();?>img/matriz/i_industrial.png">
															<p style="font-size: 14px;">Industrial</p>
														</div>
													</div>
												</div>
											</div>
										</div>
										<?php if($active==6) echo '<div class="flip-card-back bg-info no-after" data-height-xl="'.$alto.'">
											<div class="flip-card-inner">
												<button type="button" class="btn btn-outline-light mt-2" onclick="MostrarInfografía(0);"><i class="icon icon-search"></i></button>
											</div>
										</div>'; ?>
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
									<div class="<?=$flip_efect;?> text-center"  <?php echo ($active==7) ? 'onclick="selecciona_temas(9);"':''; echo $cursor;?> >										
											<div class="flip-card-front bg-secondary dark" id="tema_9" data-height-xl="<?=$alto2?>">
											<div class="flip-card-inner">
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_Educación_int.png">
														<p style="font-size: 14px;">Educación integral de calidad</p>
													</div>
												</div>
											</div>
										</div>
										<?php if($active==6) echo '<div class="flip-card-back bg-info no-after" data-height-xl="'.$alto2.'">
											<div class="flip-card-inner">
												<button type="button" class="btn btn-outline-light mt-2" onclick="MostrarInfografía(0);"><i class="icon icon-search"></i></button>
											</div>
										</div>'; ?>
									</div>
								</div>
						

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center"  <?php echo ($active==7) ? 'onclick="selecciona_temas(10);"':''; echo $cursor;?> >										
											<div class="flip-card-front bg-secondary dark" id="tema_10" data-height-xl="<?=$alto2?>">
											<div class="flip-card-inner">
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_Salud.png">
														<p class="card-title">Salud y bienestar</p>
													</div>
												</div>
											</div>
										</div>
										<?php if($active==6) echo '<div class="flip-card-back bg-info no-after" data-height-xl="'.$alto2.'">
											<div class="flip-card-inner">
												<button type="button" class="btn btn-outline-light mt-2" onclick="MostrarInfografía(0);"><i class="icon icon-search"></i></button>
											</div>
										</div>'; ?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center"  <?php echo ($active==7) ? 'onclick="selecciona_temas(11);"':''; echo $cursor;?> >										
											<div class="flip-card-front bg-secondary dark" id="tema_11" data-height-xl="<?=$alto2?>">
											<div class="flip-card-inner">
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_Inclusión-social.png">
														<p class="card-title">Inclusión social y atención a grupos vulnerables</p>
													</div>
												</div>
											</div>
										</div>
										<?php if($active==6) echo '<div class="flip-card-back bg-info no-after" data-height-xl="'.$alto2.'">
											<div class="flip-card-inner">
												<button type="button" class="btn btn-outline-light mt-2" onclick="MostrarInfografía(0);"><i class="icon icon-search"></i></button>
											</div>
										</div>'; ?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center"  <?php echo ($active==7) ? 'onclick="selecciona_temas(12);"':''; echo $cursor;?> >										
											<div class="flip-card-front bg-secondary dark" id="tema_12" data-height-xl="<?=$alto?>">
											<div class="flip-card-inner">
												<div class="card nobg noborder">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_hambre_alimentaria.png">
														<p class="card-title mb-0">Hambre cero</p>
													</div>
												</div>
											</div>
										</div>
										<?php if($active==6) echo '<div class="flip-card-back bg-info no-after" data-height-xl="'.$alto.'">
											<div class="flip-card-inner">
												<button type="button" class="btn btn-outline-light mt-2" onclick="MostrarInfografía(0);"><i class="icon icon-search"></i></button>
											</div>
										</div>'; ?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center"  <?php echo ($active==7) ? 'onclick="selecciona_temas(13);"':''; echo $cursor;?> >										
											<div class="flip-card-front bg-secondary dark" id="tema_13" data-height-xl="<?=$alto?>">
											<div class="flip-card-inner">
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_Seguridad-social.png">
														<p>Seguridad social</p>
													</div>
												</div>
											</div>
										</div>
										<?php if($active==6) echo '<div class="flip-card-back bg-info no-after" data-height-xl="'.$alto.'">
											<div class="flip-card-inner">
												<button type="button" class="btn btn-outline-light mt-2" onclick="MostrarInfografía(0);"><i class="icon icon-search"></i></button>
											</div>
										</div>'; ?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center"  <?php echo ($active==7) ? 'onclick="selecciona_temas(14);"':''; echo $cursor;?> >										
											<div class="flip-card-front bg-secondary dark" id="tema_14" data-height-xl="<?=$alto?>">
											<div class="flip-card-inner">
												<div class="card nobg noborder">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_pueblos_indigenas.png">
														<p>Pueblos indígenas</p>
													</div>
												</div>
											</div>
										</div>
										<?php if($active==6) echo '<div class="flip-card-back bg-info no-after" data-height-xl="'.$alto.'">
											<div class="flip-card-inner">
												<button type="button" class="btn btn-outline-light mt-2" onclick="MostrarInfografía(0);"><i class="icon icon-search"></i></button>
											</div>
										</div>'; ?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center"  <?php echo ($active==7) ? 'onclick="selecciona_temas(15);"':''; echo $cursor;?> >										
											<div class="flip-card-front bg-secondary dark" id="tema_15" data-height-xl="<?=$alto?>">
											<div class="flip-card-inner">
												<div class="card nobg noborder">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_acceso_Vivienda.png">
														<p style="font-size: 14px;">Accesso a la vivienda</p>														
													</div>
												</div>
											</div>
										</div>
										<?php if($active==6) echo '<div class="flip-card-back bg-info no-after" data-height-xl="'.$alto.'">
											<div class="flip-card-inner">
												<button type="button" class="btn btn-outline-light mt-2" onclick="MostrarInfografía(0);"><i class="icon icon-search"></i></button>
											</div>
										</div>'; ?>
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
									<div class="<?=$flip_efect;?> text-center"  <?php echo ($active==7) ? 'onclick="selecciona_temas(16);"':''; echo $cursor;?> >										
											<div class="flip-card-front bg-secondary dark" id="tema_16" data-height-xl="<?=$alto2?>">
											<div class="flip-card-inner">
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_acceso_universal.png">
														<p class="card-title">Acceso universal a la cultura</p>
													</div>
												</div>
											</div>
										</div>
										<?php if($active==6) echo '<div class="flip-card-back bg-info no-after" data-height-xl="'.$alto2.'">
											<div class="flip-card-inner">
												<button type="button" class="btn btn-outline-light mt-2" onclick="MostrarInfografía(0);"><i class="icon icon-search"></i></button>
											</div>
										</div>'; ?>
									</div>
								</div>
						

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center"  <?php echo ($active==7) ? 'onclick="selecciona_temas(17);"':''; echo $cursor;?> >										
											<div class="flip-card-front bg-secondary dark" id="tema_17" data-height-xl="<?=$alto2?>">
											<div class="flip-card-inner">
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_fomento_dep.png">
														<p class="card-title" style="font-size: 14px;">Fomento al deporte</p>
													</div>
												</div>
											</div>
										</div>
										<?php if($active==6) echo '<div class="flip-card-back bg-info no-after" data-height-xl="'.$alto2.'">
											<div class="flip-card-inner">
												<button type="button" class="btn btn-outline-light mt-2" onclick="MostrarInfografía(0);"><i class="icon icon-search"></i></button>
											</div>
										</div>'; ?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center"  <?php echo ($active==7) ? 'onclick="selecciona_temas(18);"':''; echo $cursor;?> >										
											<div class="flip-card-front bg-secondary dark" id="tema_18" data-height-xl="<?=$alto2?>">
											<div class="flip-card-inner">
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_educacion_art.png">
														<p class="card-title">Educación artística y cultural</p>
													</div>
												</div>
											</div>
										</div>
										<?php if($active==6) echo '<div class="flip-card-back bg-info no-after" data-height-xl="'.$alto2.'">
											<div class="flip-card-inner">
												<button type="button" class="btn btn-outline-light mt-2" onclick="MostrarInfografía(0);"><i class="icon icon-search"></i></button>
											</div>
										</div>'; ?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center"  <?php echo ($active==7) ? 'onclick="selecciona_temas(19);"':''; echo $cursor;?> >										
											<div class="flip-card-front bg-secondary dark" id="tema_19" data-height-xl="<?=$alto2?>">
											<div class="flip-card-inner">
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_cultura-tra.png">
														<p class="card-title">Cultura tradicional</p>
													</div>
												</div>
											</div>
										</div>
										<?php if($active==6) echo '<div class="flip-card-back bg-info no-after" data-height-xl="'.$alto2.'">
											<div class="flip-card-inner">
												<button type="button" class="btn btn-outline-light mt-2" onclick="MostrarInfografía(0);"><i class="icon icon-search"></i></button>
											</div>
										</div>'; ?>
									</div>
								</div>
						

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center"  <?php echo ($active==7) ? 'onclick="selecciona_temas(20);"':''; echo $cursor;?> >										
											<div class="flip-card-front bg-secondary dark" id="tema_20" data-height-xl="<?=$alto?>">
											<div class="flip-card-inner">
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_bellas_artes.png">
														<p class="card-title" class="card-title">Bellas artes</p>
													</div>
												</div>
											</div>
										</div>
										<?php if($active==6) echo '<div class="flip-card-back bg-info no-after" data-height-xl="'.$alto.'">
											<div class="flip-card-inner">
												<button type="button" class="btn btn-outline-light mt-2" onclick="MostrarInfografía(0);"><i class="icon icon-search"></i></button>
											</div>
										</div>'; ?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center"  <?php echo ($active==7) ? 'onclick="selecciona_temas(21);"':''; echo $cursor;?> >										
											<div class="flip-card-front bg-secondary dark" id="tema_21" data-height-xl="<?=$alto?>">
											<div class="flip-card-inner">
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_Patrimonio_historico.png">
														<p class="card-title" class="card-title">Patrimonio histórico</p>
													</div>
												</div>
											</div>
										</div>
										<?php if($active==6) echo '<div class="flip-card-back bg-info no-after" data-height-xl="'.$alto.'">
											<div class="flip-card-inner">
												<button type="button" class="btn btn-outline-light mt-2" onclick="MostrarInfografía(0);"><i class="icon icon-search"></i></button>
											</div>
										</div>'; ?>
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
									<div class="<?=$flip_efect;?> text-center"  <?php echo ($active==7) ? 'onclick="selecciona_temas(22);"':''; echo $cursor;?> >										
											<div class="flip-card-front bg-secondary dark" id="tema_22" data-height-xl="<?=$alto2?>">
											<div class="flip-card-inner">
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_agua.png">
														<p>Agua limpia y saneamiento</p>
													</div>
												</div>
											</div>
										</div>
										<?php if($active==6) echo '<div class="flip-card-back bg-info no-after" data-height-xl="'.$alto2.'">
											<div class="flip-card-inner">
												<button type="button" class="btn btn-outline-light mt-2" onclick="MostrarInfografía(0);"><i class="icon icon-search"></i></button>
											</div>
										</div>'; ?>
									</div>
								</div>
						

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center"  <?php echo ($active==7) ? 'onclick="selecciona_temas(23);"':''; echo $cursor;?> >										
											<div class="flip-card-front bg-secondary dark" id="tema_23" data-height-xl="<?=$alto2?>">
											<div class="flip-card-inner">
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_energia.png">
														<p class="card-title" style="font-size: 13px;">Energía asequible y no contaminante</p>														
													</div>
												</div>
											</div>
										</div>
										<?php if($active==6) echo '<div class="flip-card-back bg-info no-after" data-height-xl="'.$alto2.'">
											<div class="flip-card-inner">
												<button type="button" class="btn btn-outline-light mt-2" onclick="MostrarInfografía(0);"><i class="icon icon-search"></i></button>
											</div>
										</div>'; ?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center"  <?php echo ($active==7) ? 'onclick="selecciona_temas(24);"':''; echo $cursor;?> >										
											<div class="flip-card-front bg-secondary dark" id="tema_24" data-height-xl="<?=$alto2?>">
											<div class="flip-card-inner">
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_vida_sub.png">
														<p class="card-title">Vida submarina y ecosistemas terrestres</p>
													</div>
												</div>
											</div>
										</div>
										<?php if($active==6) echo '<div class="flip-card-back bg-info no-after" data-height-xl="'.$alto2.'">
											<div class="flip-card-inner">
												<button type="button" class="btn btn-outline-light mt-2" onclick="MostrarInfografía(0);"><i class="icon icon-search"></i></button>
											</div>
										</div>'; ?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center"  <?php echo ($active==7) ? 'onclick="selecciona_temas(25);"':''; echo $cursor;?> >										
											<div class="flip-card-front bg-secondary dark" id="tema_25" data-height-xl="<?=$alto?>">
											<div class="flip-card-inner">
												<div class="card nobg noborder">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_accion_clima.png">
														<p class="card-title mb-0" style="font-size: 14px;">Acción por el clima</p>														
													</div>
												</div>
											</div>
										</div>
										<?php if($active==6) echo '<div class="flip-card-back bg-info no-after" data-height-xl="'.$alto.'">
											<div class="flip-card-inner">
												<button type="button" class="btn btn-outline-light mt-2" onclick="MostrarInfografía(0);"><i class="icon icon-search"></i></button>
											</div>
										</div>'; ?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center"  <?php echo ($active==7) ? 'onclick="selecciona_temas(26);"':''; echo $cursor;?> >										
											<div class="flip-card-front bg-secondary dark" id="tema_26" data-height-xl="<?=$alto?>">
											<div class="flip-card-inner">
												<div class="card nobg noborder text-center">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_derecho_ciu.png">
														<p>Derecho a la ciudad</p>
													</div>
												</div>
											</div>
										</div>
										<?php if($active==6) echo '<div class="flip-card-back bg-info no-after" data-height-xl="'.$alto.'">
											<div class="flip-card-inner">
												<button type="button" class="btn btn-outline-light mt-2" onclick="MostrarInfografía(0);"><i class="icon icon-search"></i></button>
											</div>
										</div>'; ?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center"  <?php echo ($active==7) ? 'onclick="selecciona_temas(27);"':''; echo $cursor;?> >										
											<div class="flip-card-front bg-secondary dark" id="tema_27" data-height-xl="<?=$alto?>">
											<div class="flip-card-inner">
												<div class="card nobg noborder">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_ciudades_com.png">
														<p style="font-size: 14px;">Ciudades y comunidades sostenibles</p>
													</div>
												</div>
											</div>
										</div>
										<?php if($active==6) echo '<div class="flip-card-back bg-info no-after" data-height-xl="'.$alto.'">
											<div class="flip-card-inner">
												<button type="button" class="btn btn-outline-light mt-2" onclick="MostrarInfografía(0);"><i class="icon icon-search"></i></button>
											</div>
										</div>'; ?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center"  <?php echo ($active==7) ? 'onclick="selecciona_temas(28);"':''; echo $cursor;?> >										
											<div class="flip-card-front bg-secondary dark" id="tema_28" data-height-xl="<?=$alto?>">
											<div class="flip-card-inner">
												<div class="card nobg noborder">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_conservacion.png">
														<p style="font-size: 12px;">Conservación de recursos naturales</p>														
													</div>
												</div>
											</div>
										</div>
										<?php if($active==6) echo '<div class="flip-card-back bg-info no-after" data-height-xl="'.$alto.'">
											<div class="flip-card-inner">
												<button type="button" class="btn btn-outline-light mt-2" onclick="MostrarInfografía(0);"><i class="icon icon-search"></i></button>
											</div>
										</div>'; ?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center"  <?php echo ($active==7) ? 'onclick="selecciona_temas(29);"':''; echo $cursor;?> >										
											<div class="flip-card-front bg-secondary dark" id="tema_29" data-height-xl="<?=$alto?>">
											<div class="flip-card-inner">
												<div class="card nobg noborder">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_movilidad.png">
														<p style="font-size: 12px;">Movilidad sustentable</p>														
													</div>
												</div>
											</div>
										</div>
										<?php if($active==6) echo '<div class="flip-card-back bg-info no-after" data-height-xl="'.$alto.'">
											<div class="flip-card-inner">
												<button type="button" class="btn btn-outline-light mt-2" onclick="MostrarInfografía(0);"><i class="icon icon-search"></i></button>
											</div>
										</div>'; ?>
									</div>
								</div>

								<div class="col-lg-6 mb-4">
									<div class="<?=$flip_efect;?> text-center"  <?php echo ($active==7) ? 'onclick="selecciona_temas(30);"':''; echo $cursor;?> >										
											<div class="flip-card-front bg-secondary dark" id="tema_30" data-height-xl="<?=$alto?>">
											<div class="flip-card-inner">
												<div class="card nobg noborder">
													<div class="card-body nopadding">
														<img src="<?=base_url();?>img/matriz/i_manejo.png">
														<p style="font-size: 12px;">Manejo integral de residuos</p>														
													</div>
												</div>
											</div>
										</div>
										<?php if($active==6) echo '<div class="flip-card-back bg-info no-after" data-height-xl="'.$alto.'">
											<div class="flip-card-inner">
												<button type="button" class="btn btn-outline-light mt-2" onclick="MostrarInfografía(0);"><i class="icon icon-search"></i></button>
											</div>
										</div>'; ?>
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
					<div class="col-lg-1 mb-4">						
					</div>

					<div class="col-lg-2 mb-4">
						<div class="<?=$flip_efect;?> text-center"  <?php echo ($active==7) ? 'onclick="selecciona_temas(31);"':''; echo $cursor;?> >							
								<div class="flip-card-front bg-secondary dark" id="tema_31" data-height-xl="<?=$alto;?>">
								<div class="flip-card-inner">
									<div class="card nobg noborder text-center">
										<div class="card-body nopadding">
											<!--<i class="icon-line2-camera h1"></i>-->
											<img src="<?=base_url();?>img/matriz/i_Igualdad-de-genero.png">
											<p class="card-text t400">Igualdad de género</p>
										</div>
									</div>
								</div>
							</div>
							<?php if($active==6) echo '<div class="flip-card-back bg-info no-after" data-height-xl="'.$alto.'">
											<div class="flip-card-inner">
												<button type="button" class="btn btn-outline-light mt-2" onclick="MostrarInfografía(0);"><i class="icon icon-search"></i></button>
											</div>
										</div>'; ?>
						</div>
					</div>

					<div class="col-lg-2 mb-4">
						<div class="<?=$flip_efect;?> text-center"  <?php echo ($active==7) ? 'onclick="selecciona_temas(32);"':''; echo $cursor;?> >							
								<div class="flip-card-front bg-secondary dark" id="tema_32" data-height-xl="<?=$alto;?>">
								<div class="flip-card-inner">
									<div class="card nobg noborder text-center">
										<div class="card-body nopadding">
											<img src="<?=base_url();?>img/matriz/i_innovacion-Ciencia.png">
											<p class="card-text t400">Innovación, ciencia y tecnología</p>
										</div>
									</div>
								</div>
							</div>
							<?php if($active==6) echo '<div class="flip-card-back bg-info no-after" data-height-xl="'.$alto.'">
											<div class="flip-card-inner">
												<button type="button" class="btn btn-outline-light mt-2" onclick="MostrarInfografía(0);"><i class="icon icon-search"></i></button>
											</div>
										</div>'; ?>
						</div>
					</div>

					<div class="col-lg-2 mb-4">
						<div class="<?=$flip_efect;?> text-center"  <?php echo ($active==7) ? 'onclick="selecciona_temas(33);"':''; echo $cursor;?> >							
								<div class="flip-card-front bg-secondary dark" id="tema_33" data-height-xl="<?=$alto;?>">
								<div class="flip-card-inner">
									<div class="card nobg noborder text-center">
										<div class="card-body nopadding">
											<img src="<?=base_url();?>img/matriz/i_paz_just.png">
											<p class="card-text t400">Paz, justicia e instituciones sólidas</p>
										</div>
									</div>
								</div>
							</div>
							<?php if($active==6) echo '<div class="flip-card-back bg-info no-after" data-height-xl="'.$alto.'">
											<div class="flip-card-inner">
												<button type="button" class="btn btn-outline-light mt-2" onclick="MostrarInfografía(0);"><i class="icon icon-search"></i></button>
											</div>
										</div>'; ?>
						</div>
					</div>

					<div class="col-lg-2 mb-4">
						<div class="<?=$flip_efect;?> text-center"  <?php echo ($active==7) ? 'onclick="selecciona_temas(34);"':''; echo $cursor;?> >							
								<div class="flip-card-front bg-secondary dark" id="tema_34" data-height-xl="<?=$alto;?>">
								<div class="flip-card-inner">
									<div class="card nobg noborder text-center">
										<div class="card-body nopadding">
											<img src="<?=base_url();?>img/matriz/i_gobierno.png">
											<p class="card-text t400">Gobierno austero, abierto, innovador y eficiente</p>
										</div>
									</div>
								</div>
							</div>
							<?php if($active==6) echo '<div class="flip-card-back bg-info no-after" data-height-xl="'.$alto.'">
											<div class="flip-card-inner">
												<button type="button" class="btn btn-outline-light mt-2" onclick="MostrarInfografía(0);"><i class="icon icon-search"></i></button>
											</div>
										</div>'; ?>
						</div>
					</div>

					<div class="col-lg-2 mb-4">
						<div class="<?=$flip_efect;?> text-center"  <?php echo ($active==7) ? 'onclick="selecciona_temas(35);"':''; echo $cursor;?> >							
								<div class="flip-card-front bg-secondary dark" id="tema_35" data-height-xl="<?=$alto;?>">
								<div class="flip-card-inner">
									<div class="card nobg noborder text-center">
										<div class="card-body nopadding">
											<img src="<?=base_url();?>img/matriz/i_infraestructura.png">
											<p class="card-text t400">Infraestructura y proyectos estratégicos</p>
										</div>
									</div>
								</div>
							</div>
							<?php if($active==6) echo '<div class="flip-card-back bg-info no-after" data-height-xl="'.$alto.'">
											<div class="flip-card-inner">
												<button type="button" class="btn btn-outline-light mt-2" onclick="MostrarInfografía(0);"><i class="icon icon-search"></i></button>
											</div>
										</div>'; ?>
						</div>
					</div>
				</div>

<script>
	var imagenes = ['desarrollo_comercial.jpg','competividad.jpg','capital_humano.jpg','desarrrollo_agri.jpg','desarrollo_pesq.jpg','fomento_emp.jpg','impulso_turismo.jpg','industrial.jpg','educacion_integral.jpg','salud.jpg','inclusion-social.jpg','hambre_cero.jpg','seguridad_social.jpg','pueblos_indigenas.jpg','acceso_vivienda.jpg','acceso_universal.jpg','fomento_deporte.jpg','Educacion_artistica.jpg','cultura_tradicion.jpg','bellas_artes.jpg','patrimonio.jpg','agua.jpg','energia.jpg','vida_sub.jpg','accion_clima.jpg','derecho_ciu.jpg','ciudades_comu.jpg','Conservacion.jpg','movilidad_sustentable.jpg','manejo_integral.jpg','igualdad_genero.jpg','innovacion_ciencia.jpg','paz_justicia.jpg','gobierno.jpg','infraestructura.jpg'];		
		
</script>