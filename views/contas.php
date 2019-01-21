<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>/assets/css/contas.css">
</head>
 <body>
	<div class="tabArea">
		<h2>Minhas Contas</h2>
			<table class="tabConta">
				<tbody>
					<tr>
						<th>Nome</th>
						<th>Saldo Atual</th>
						<th>Ações</th>
					</tr>
					<?php foreach($contas as $conta): ?>
					<tr>
						<td><?php echo $conta['titulo']; ?></td>
						<td><?php echo 'R$ '.number_format($conta['valor'], 2, ',', '.'); ?></td>
						<td>
						<a href="<?php echo URL; ?>/contas/edit/<?php echo $conta['id']; ?>"><img width="20" src="<?php echo URL; ?>/assets/images/edit.png"></a>

						<a href="<?php echo URL; ?>/contas/delete/<?php echo $conta['id']; ?>" ><img width="20" src="<?php echo URL; ?>/assets/images/delete.png"></a>
						</td>
					</tr>				
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

		<div id="menu-conta">
			<ul>
				<li>
					<a class="btnConta" href="<?php echo URL; ?>/contas/add/abrirconta">Criar Conta</a>
				</li>
				<li>
					<a class="btnConta" href="<?php echo URL; ?>/contas/add/abrirconta">Cria Transferência</a>
				</li>
				<li></li>
			</ul>
		</div>
</body>
</html>
