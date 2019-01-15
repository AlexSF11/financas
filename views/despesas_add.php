<!DOCTYPE html>
<html>
<head>
	<title>Despesas</title>
</head>
<body>

	<form method="POST" class="form-conta">
		<input type="text" name="descricao" placeholder="Descrição" /><br/><br/>

		<input type="text" name="despesas_valor" placeholder="0,00"><br/><br/>

		<input type="date" name="data"> 

		<!-- <input type="checkbox" name="estapago" />Está pago <br/><br/> -->

		<select id="categoria" name="categoria">
			<option></option>
			<?php foreach($categorias as $cat): ?>
				<option value="<?php echo $cat['id']; ?>"><?php echo utf8_encode($cat['nome']); ?></option>
			<?php endforeach; ?>
		</select>

		<select id="despesas_conta" name="despesas_conta">
			<option></option>
			<?php foreach($dConta as $conta): ?>
				<option value="<?php echo $conta['id']; ?>"><?php echo utf8_encode($conta['titulo']); ?></option>
			<?php endforeach; ?>
		</select><br/><br/>


		<input type="submit" value="Salvar" />

	</form>
</body>
</html>
