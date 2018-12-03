<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/style.css?v=1" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/swiper.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/dark.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url();?>public/css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="<?=base_url();?>public/css/responsive.css" type="text/css" />

	<link rel="stylesheet" href="<?=base_url();?>public/chosen/chosen.min.css?v=1" type="text/css" />
	<!--Modal Loading -->
	<link type="text/css" rel="stylesheet" href="<?=base_url();?>admin/plugins/modal-loading/css/modal-loading.css" />
	<link type="text/css" rel="stylesheet" href="<?=base_url();?>admin/plugins/modal-loading/css/modal-loading-animate.css" />
	<!--Modal Loading -->
	<style type="text/css">
		.error_chosen{
			border: 1px solid #EE0000;
		}
		
	</style>

	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>Participación Ciudadana</title>

</head>

<body class="stretched" data-loader="2" data-animation-in="fadeIn" data-speed-in="1500" data-animation-out="fadeOut" data-speed-out="800">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<div id="home" class="page-section" style="position:absolute;top:0;left:0;width:100%;height:200px;z-index:-2;"></div>

		
		<!-- Header
		============================================= -->
		<?php include('header.php'); ?>

		<div class="clear"></div>

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				
				<div class="heading-block center">
					<h1>Usuario registrado</h1>
					<span>Se le ha enviado un mensaje de confirmación al correo proporcionado. Por favor revise su bandeja de correo.</span>
				</div>		

			</div>			
			<br>
			<br>
		</section>
		<!-- Footer
		============================================= -->
		<?php include('footer.php'); ?>
		<!-- #footer end -->

	</div><!-- #wrapper end -->

	<div class="modal1 mfp-hide" id="myModal1">
		<div class="block divcenter" style="background-color: #FFF; max-width: 500px;">
			<div class="feature-box fbox-center fbox-effect nobottomborder nobottommargin" style="padding: 40px;">
				<div class="fbox-icon">
					<a href="#"><i class="icon-screen i-alt"></i></a>
				</div>
				<h3>Responsive Layout<span class="subtitle">Adapts well on Devices</span></h3>
			</div>
			<div class="section center nomargin" style="padding: 30px;">
				<a href="#" class="button" onClick="$.magnificPopup.close();return false;">Don't Show me Again</a>
			</div>
		</div>
	</div>

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
	
	<!-- Footer Scripts
	============================================= -->

</body>
</html>