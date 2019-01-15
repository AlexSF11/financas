<!DOCTYPE html>
<html>
<head>
	<title>Login - Personal Management System</title>
	<link rel="icon" href="<?php echo URL; ?>/assets/images/logo-header.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>/assets/css/login.css">
</head>
<body>
	<img src="<?php echo URL; ?>/assets/images/logo.png" id="logo" />

	<button>Cadastre-se</button>

	<form method="POST" class="login">
		
		<input type="email" name="email" placeholder="Digite seu e-mail" /><br/><br/>

		<input type="password" name="senha" placeholder="Digite sua senha" /><br/><br/>

		<input type="submit" Value="Entrar">

		<?php if(!empty($erro)): ?>
		<div ><?php echo $erro; ?></div>
		<?php endif; ?>
	</form>
</body>
</html>
