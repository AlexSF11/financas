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
		<input type="text" name="descricao" value="<?php echo $despesas['descricao']; ?>" /><br/><br/>

		Saldo Inicial:<br/>
		<input type="text" name="despesas_valor" value="<?php echo number_format($despesas['despesas_valor'], 2, ',', '.'); ?>"  /><br/><br/>
		
		Categoria:<br/>
		<select id="categoria" name="categoria">
			
			<?php foreach($categorias as $cat): ?>
				<option value="<?php echo $cat['id']; ?>" <?php echo ($despesas['id_categoria']==$cat['id'])?'selected="selected"':''; ?> > <?php echo utf8_encode($cat['nome']); ?> </option>
			<?php endforeach; ?>
		</select><br/><br/>
		
		Contas:<br/>
		<select id="despesas_conta" name="despesas_conta">
			<?php foreach($dConta as $conta): ?>
				<option value="<?php echo $conta['id']; ?>" <?php echo ($despesas['id_conta']==$conta['id'])?'selected="selected"':''; ?> ><?php echo utf8_encode($conta['titulo']); ?> </option>
			<?php endforeach; ?>
		</select><br/><br/>

		<input type="submit" value="Salvar" />
	</form>
</body>
</html>
