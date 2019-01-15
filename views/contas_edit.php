<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>/assets/css/style.css">
</head>
<body>
	<?php if(!empty($erro)): ?>
	<div class="alert alert-danger"><?php echo $erro; ?></div>
	<?php endif; ?>

	<form method="POST" class="form-conta">
		Título:<br/>
		<input type="text" name="titulo" value="<?php echo $contas['titulo']; ?>" /><br/><br/>

		Saldo Inicial:<br/>
		<input type="text" name="valor" value="<?php echo number_format($contas['valor'], 2, ',', '.'); ?>"  /><br/><br/>
		
		Tipo de Conta:<br/>
		<input type="text" name="tipo" value="<?php echo $contas['tipo']; ?>" /><br/><br/>

		<input type="submit" value="Salvar" />
	</form>
</body>
</html>

