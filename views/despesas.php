<!DOCTYPE html>
<html>
<head>

</head>
 <body>
	<div class="tabArea">
		<h2>Despesas</h2>
			<table class="table">
				<tbody>
					<tr>
						<th>Descrição</th>
						<th>Conta</th>
						<th>Data</th>
						<th>Valor</th>
						<th>Ações</th>
					</tr>
					<?php foreach($despesas as $despesa): ?>
					<tr>
						<td><?php echo $despesa['descricao']; ?></td>
						<td><?php echo $despesa['titulo']; ?></td>
						<td><?php echo date('d/m/Y', strtotime($despesa['data'])); ?></td>
						<td><?php echo 'R$ '.number_format($despesa['despesas_valor'], 2, ',', '.'); ?></td>
						<td>
						<a href="<?php echo URL; ?>/despesas/edit/<?php echo $despesa['id']; ?>"><img width="20" src="<?php echo URL; ?>/assets/images/edit.png"></a>

						<a href="<?php echo URL; ?>/despesas/delete/<?php echo $despesa['id']; ?>" ><img width="20" src="<?php echo URL; ?>/assets/images/delete.png"></a>
						</td>
					</tr>	
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<a class="btnConta" href="<?php echo URL; ?>/despesas/add/despesas_add"><img width="40" src="<?php echo URL; ?>/assets/images/add.png"></a>
</body>
</html>




