<?php

include 'conexao.php';

$sql = $conecta_db->prepare("SELECT * FROM tb_aulas");
$sql->execute();
$result = $sql->get_result(); 

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listagem de Aulas - PowerFit</title>
    <link rel="icon" href="images/logo_semnome.png">
    <link rel="stylesheet" href="site_academia.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background: #f4f4f4;
        }
    </style>
</head>
<body>
    <header style="width :150%">
        <h1>PowerFit - Listagem de Aulas</h1>
        <p><a href = "area_adm.php">Voltar</a></p>
    </header>

    <section class="content" style="width :150%">
        <h2>Aulas Cadastradas</h2>
        <?php if (count($sql) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Modalidade</th>
                        <th>Instrutor</th>
                        <th>Quantidade Máxima de Alunos</th>
                        <th>Data</th>
                        <th>Horário</th>
                        <th>Duração</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $eq): ?>
                        <tr>
                            <td><?= htmlspecialchars($eq['cod_aula']) ?></td>
                            <td contenteditable="true" 
                                 onblur="atualizarCampo(this, 'modalidade', <?= $eq['cod_aula'] ?>)"><?= htmlspecialchars($eq['modalidade']) ?></td>
                            <td contenteditable="true" 
                                onblur="atualizarCampo(this, 'instrutor', <?= $eq['cod_aula'] ?>)"><?= htmlspecialchars($eq['instrutor']) ?></td>
                            <td contenteditable="true" 
                onblur="atualizarCampo(this, 'qtde_alunos', <?= $eq['cod_aula'] ?>)"><?= htmlspecialchars($eq['qtde_alunos']) ?></td>
                            <td contenteditable="true" 
                onblur="atualizarCampo(this, 'data_aula', <?= $eq['cod_aula'] ?>)"><?= htmlspecialchars($eq['data_aula']) ?></td>
                            <td contenteditable="true" 
                onblur="atualizarCampo(this, 'hora', <?= $eq['cod_aula'] ?>)"><?= htmlspecialchars($eq['hora']) ?></td>
                            <td contenteditable="true" 
                onblur="atualizarCampo(this, 'duracao', <?= $eq['cod_aula'] ?>)"><?= htmlspecialchars($eq['duracao']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhuma aula cadastrada.</p>
        <?php endif; ?>
    </section>

    <script>
function atualizarCampo(elemento, campo, cod_aula) {
    const novoValor = elemento.innerText;

    fetch('atualizar_aula.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ cod_aula, campo, valor: novoValor })
    })
    .then(response => response.text())
    .then(data => {
        console.log('Atualização:', data);
    })
    .catch(error => {
        console.error('Erro:', error);
        alert('Erro ao atualizar campo.');
    });
}
</script>

</body>
</html>