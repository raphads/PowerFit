<?php
session_start();
include 'conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    die("Usuário não está logado.");
}

$usuario_id = $_SESSION['usuario_id'];

$sql = $conecta_db->prepare("
    SELECT 
    a.modalidade,
    a.instrutor,
    a.data_aula,
    a.hora,
    a.duracao
FROM tb_agenda ag
JOIN tb_aulas a ON ag.cod_agenda = a.cod_aula
WHERE ag.aluno = ?
ORDER BY a.data_aula, a.hora;

");
$sql->bind_param("i", $usuario_id);
$sql->execute();
$result = $sql->get_result();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aulas Agendadas - PowerFit</title>
    <link rel="icon" href="images/logo_semnome.png">
    <link rel="stylesheet" href="site_academia.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="site_academia.js" defer></script>  
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
<header style="width :100%">
        <div class="menu-icon" onclick="toggleMenu()">&#9776;</div>
        <img src="images/logo_semnome.png" height="10%" width="10%" style="position: static; right: auto;">
        <h1>PowerFit</h1>
       <!-- <p><a href = "aulas.php">Voltar</a></p> -->
    </header>
    <hr>
    <nav class="sidebar" id="sidebar">
        <ul>
            <li><a href="index.html">Início</a></li>
            <li><a href="agendamento.php">Agendamento</a></li>
            <li><a href="planos.html">Planos</a></li>
            <li><a href="pagamentos.html">Pagamentos</a></li>
        </ul>
    </nav>
    <section class="content" name="content">

<h2>Minhas Aulas</h2>
<table>
    <thead>
        <tr>
            <th>Modalidade</th>
            <th>Instrutor</th>
            <th>Data</th>
            <th>Hora</th>
            <th>Duração</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['modalidade']) ?></td>
            <td><?= htmlspecialchars($row['instrutor']) ?></td>
            <td><?= htmlspecialchars($row['data_aula']) ?></td>
            <td><?= htmlspecialchars($row['hora']) ?></td>
            <td><?= htmlspecialchars($row['duracao']) ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
        </body>
</html>