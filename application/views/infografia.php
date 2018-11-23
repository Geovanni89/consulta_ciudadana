<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
</head>

<body>
	<div class="container">
		<!--<div class="row">
			<div class="col-lg-12">
				<img src="<?=base_url();?>img/ficha.jpg">
			</div>
		</div>
		<br>-->

		<div class="row">
			<div class="col-lg-12">
				<div id="example1"></div>
			</div>
		</div>

		
		<div class="row">
			<div class="col-lg-12 text-right">
			<?php 
				if(isset($_SESSION[PREFIJO.'_idusuario'])) {
					echo '<a href="'.base_url().'Sitio/form_propuesta?iIdSector=1&iIdTema=1" class="btn btn-success">Crear una propuesta</a>';
				}
				else
				{
                    echo '<div class="style-msg errormsg"><div class="sb-msg"><i class="icon-remove"></i><a href="'.base_url().'Sitio/login?r=1">Inicie sesión</a> o <a href="'.base_url().'Sitio/registrarse">Regístrese</a> para crear una propuesta sobre este tema</div></div>';
				
				}
			?>
			</div>
		</div>
	</div>	
</body>}
<script src="<?=base_url();?>js/pdfobject.js"></script>
<script>
	var options = {
    	height: "600px",
    	pdfOpenParams: { view: 'FitV' }
	};
	
	PDFObject.embed("<?=base_url();?>img/ficha.pdf", "#example1",options);
</script>
</html>