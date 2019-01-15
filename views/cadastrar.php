<?php if(!empty($erro)): ?>
<div class="alert alert-danger"><?php echo $erro; ?></div>
<?php endif; ?>

<form method="POST">
	<div class="form-group">
		<label for="nome">Nome:</label>
		<input type="nome" name="nome" id="nome" class="form-control" />
	</div>
	<div class="form-group">
		<label for="email">E-mail</label>
		<input type="email" name="email" id="email" class="form-control" />
	</div>
	<div class="form-group">
		<label for="senha">Senha</label>
		<input type="password" name="senha" name="senha" id="senha" class="form-control" />
	</div>
	

	<input type="submit" class="btn btn-default" Value="Cadastrar">

</form>