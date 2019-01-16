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
                <tr>
                    <td>Viagem</td>
                    <td>Nunbank</td>
                    <td>13/01/2019</td>
                    <td>R$ 200,00</td>
                    <td>
                    <a href="<?php echo URL; ?>/despesas/edit/<?php //echo $despesa['id']; ?>"><img width="20" src="<?php echo URL; ?>/assets/images/edit.png"></a>

                    <a href="<?php echo URL; ?>/despesas/delete/<?php //echo $despesa['id']; ?>" ><img width="20" src="<?php echo URL; ?>/assets/images/delete.png"></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>