<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
                <?php foreach($receitas as $receita): ?>
                <tr>
                    <td><?php echo $receita['descricao']; ?></td>
                    <td><?php echo $receita['titulo']; ?></td>
                    <td><?php echo date('d/m/Y', strtotime($receita['data'])); ?></td>
                    <td><?php echo 'R$ '.number_format($receita['valor'], 2, ',', '.'); ?></td>
                    <td>
                    <a href="<?php echo URL; ?>/receitas/edit/<?php echo $receita['id']; ?>"><img width="20" src="<?php echo URL; ?>/assets/images/edit.png"></a>

                    <a href="<?php echo URL; ?>/receitas/delete/<?php echo $receita['id']; ?>" ><img width="20" src="<?php echo URL; ?>/assets/images/delete.png"></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <a class="btnConta" href="<?php echo URL; ?>/receitas/add/receitas_add"><img width="40" src="<?php echo URL; ?>/assets/images/add.png"></a>
</body>
</html>