<!DOCTYPE html>
<html>
<head>
	<title>Abrir Conta</title>
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>/assets/css/style.css">
</head>
<body>
	<?php if(!empty($erro)): ?>
	<div class="alert alert-danger"><?php echo $erro; ?></div>
	<?php endif; ?>

	<form method="POST" class="form-conta">
		<span>Nome da Conta</span><br/><br/>
		<input type="text" name="titulo" /><br/><br/>

		<span>Saldo Inicial</span><br/><br/>
		<input type="text" name="valor"  /><br/><br/>
		
		<span>Tipo de Conta</span><br/><br/>
		<input type="text" name="tipo" /><br/><br/>

		<input type="submit" value="Adicionar" />
	</form>
</body>
</html>

