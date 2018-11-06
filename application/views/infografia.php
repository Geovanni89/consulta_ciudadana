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
		<div class="row">
			<div class="col-lg-12">
				<img src="<?=base_url();?>img/infografiademo.jpg">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-lg-10">
			</div>
			<div class="col-lg-2">
			<?php if(isset($_SESSION[PREFIJO.'_idusuario'])) {?>
				<a href="<?=base_url();?>Sitio/form_propuesta?idtema=1" class="btn btn-success">Crear una propuesta</a>
			<?php } ?>
			</div>
		</div>
	</div>	
</body>
</html>