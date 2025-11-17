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
    <link rel="icon" href="images/logo_semnome.png">
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
                            <td contenteditable="true" 
                                onblur="atualizarCampo(this, 'nome', <?= $eq['id'] ?>)">
                                <?= htmlspecialchars($eq['nome']) ?>
                            </td>

                            <td contenteditable="true" 
                                onblur="atualizarCampo(this, 'email', <?= $eq['id'] ?>)">
                                <?= htmlspecialchars($eq['email']) ?>
                            </td>
                            <td><?= htmlspecialchars($eq['senha']) ?></td>

                            <td contenteditable="true" 
                                onblur="atualizarCampo(this, 'data_nasc', <?= $eq['id'] ?>)">
                                <?= htmlspecialchars($eq['data_nasc']) ?>
                            </td>

                            <td contenteditable="true" 
                                onblur="atualizarCampo(this, 'tel', <?= $eq['id'] ?>)">
                                <?= htmlspecialchars($eq['tel']) ?>
                            </td>

                            
                            <td contenteditable="true" 
                                onblur="atualizarCampo(this, 'cep', <?= $eq['id'] ?>)"><?= htmlspecialchars($eq['cep']) ?></td>
                            <td contenteditable="true" 
                                onblur="atualizarCampo(this, 'rua', <?= $eq['id'] ?>)"><?= htmlspecialchars($eq['rua']) ?></td>
                            <td contenteditable="true" 
                                onblur="atualizarCampo(this, 'num', <?= $eq['id'] ?>)"><?= htmlspecialchars($eq['num']) ?></td>
                            <td contenteditable="true" 
                                onblur="atualizarCampo(this, 'comp', <?= $eq['id'] ?>)"><?= htmlspecialchars($eq['comp']) ?></td>
                            <td contenteditable="true" 
                                onblur="atualizarCampo(this, 'bairro', <?= $eq['id'] ?>)"><?= htmlspecialchars($eq['bairro']) ?></td>
                            <td contenteditable="true" 
                                onblur="atualizarCampo(this, 'cid', <?= $eq['id'] ?>)"><?= htmlspecialchars($eq['cid']) ?></td>
                            <td contenteditable="true" 
                                onblur="atualizarCampo(this, 'uf', <?= $eq['id'] ?>)"><?= htmlspecialchars($eq['uf']) ?></td>
                            <td contenteditable="true" 
                                onblur="atualizarCampo(this, 'func', <?= $eq['id'] ?>)"><?= htmlspecialchars($eq['func']) ?></td>
                            <td contenteditable="true" 
                                onblur="atualizarCampo(this, 'plano', <?= $eq['id'] ?>)"><?= htmlspecialchars($eq['plano']) ?></td>
                            <td contenteditable="true" 
                                onblur="atualizarCampo(this, 'tempo', <?= $eq['id'] ?>)"><?= htmlspecialchars($eq['tempo']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
            <p>Nenhum equipamento cadastrado.</p>
        <?php endif; ?>
    </section>

    <script>
function atualizarCampo(elemento, campo, id) {
    const novoValor = elemento.innerText;

    fetch('atualizar_inline.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ id, campo, valor: novoValor })
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