<!DOCTYPE html>
<html>
<head>
	<title>Finanças Pessoais</title>
	<link rel="icon" href="<?php echo URL; ?>/assets/images/logo-header.ico" type="image/x-icon" />
	
	<meta charset="utf-8" />

	<!-- Diz para navegador as formas como ele tem que renderizar o conteúdo na tela -->
	<meta name="viewport" content="width=device=width,initial-scale=1,shrink-to-fit=no" />

	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>/assets/css/template.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>/assets/css/bootstrap.min.css" />

</head>
<body>
	<div class="leftMenu">
		<a href="<?php echo URL; ?>"><img src="<?php echo URL; ?>/assets/images/logo.png" width="150" /></a>
		
		<div class="menuArea">
			<ul>
				<li><a href="<?php echo URL; ?>/contas">Contas</a></li>
				<!-- <li><a href="<?php echo URL; ?>/renda">Renda</a></li> -->
				<li><a href="<?php echo URL; ?>/despesas">Despesas</a></li>
				<li><a href="<?php echo URL; ?>/transferencias">Tranferências</a></li>
			</ul>
		</div>
	</div>
	<div class="caixa">
		<div class="top">
			<div class="topRight"><a href="<?php echo URL; ?>/login/sair"><img src="<?php echo URL; ?>/assets/images/logout.png" width="30" /></a></div>
		</div>
		<div class="area">
		<?php $this->loadViewInTemplate($viewName, $viewData); ?>
		</div>
	</div>
	
	<script type="text/javascript" src="<?php echo URL; ?>/assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo URL; ?>/assets/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="<?php echo URL; ?>/assets/js/script.js"></script>
</body>
</html>