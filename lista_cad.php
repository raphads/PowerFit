<?php

include 'conexao.php';

$sql = $conecta_db->prepare("SELECT * FROM tb_login");
$sql->execute();
$result = $sql->get_result(); // Executa a consulta e obtém o resultado
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listagem de Usuários - PowerFit</title>
    <link rel="stylesheet" href="site_academia.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

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
    <header style="width :170%">
        <h1>PowerFit - Listagem de Usuários</h1>
        <p><a href = "area_adm.php">Voltar</a></p>
    </header>

    <section class="content" style="width :170%">
        <h2>Usuários Cadastrados</h2>
        <?php if (count($sql) > 0): ?>
            <div class = "table-responsive">
            <table class = "table table-striped">
                <thead>
                    <tr>
                        <th>CPF</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Senha</th>
                        <th>Data de Nascimento</th>
                        <th>Telefone</th>
                        <th>CEP</th>
                        <th>Rua</th>
                        <th>Número</th>
                        <th>Complemento</th>
                        <th>Bairro</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>Função</th>
                        <th>Plano</th>
                        <th>Tempo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $eq): ?>
                        <tr>
                            <td><?= htmlspecialchars($eq['cpf']) ?></td>
                            <td><?= htmlspecialchars($eq['nome']) ?></td>
                            <td><?= htmlspecialchars($eq['email']) ?></td>
                            <td><?= htmlspecialchars($eq['senha']) ?></td>
                            <td><?= htmlspecialchars($eq['data_nasc']) ?></td>
                            <td><?= htmlspecialchars($eq['tel']) ?></td>
                            <td><?= htmlspecialchars($eq['cep']) ?></td>
                            <td><?= htmlspecialchars($eq['rua']) ?></td>
                            <td><?= htmlspecialchars($eq['num']) ?></td>
                            <td><?= htmlspecialchars($eq['comp']) ?></td>
                            <td><?= htmlspecialchars($eq['bairro']) ?></td>
                            <td><?= htmlspecialchars($eq['cid']) ?></td>
                            <td><?= htmlspecialchars($eq['uf']) ?></td>
                            <td><?= htmlspecialchars($eq['func']) ?></td>
                            <td><?= htmlspecialchars($eq['plano']) ?></td>
                            <td><?= htmlspecialchars($eq['tempo']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
            <p>Nenhum equipamento cadastrado.</p>
        <?php endif; ?>
    </section>
</body>
</html>