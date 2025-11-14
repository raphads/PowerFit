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
    <title>Listagem de Equipamentos - PowerFit</title>
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
                            <td><?= htmlspecialchars($eq['modalidade']) ?></td>
                            <td><?= htmlspecialchars($eq['instrutor']) ?></td>
                            <td><?= htmlspecialchars($eq['qtde_alunos']) ?></td>
                            <td><?= htmlspecialchars($eq['data_aula']) ?></td>
                            <td><?= htmlspecialchars($eq['hora']) ?></td>
                            <td><?= htmlspecialchars($eq['duracao']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhuma aula cadastrada.</p>
        <?php endif; ?>
    </section>
</body>
</html>