<?php
include 'conexao.php';

$sql = $conecta_db->prepare("
    SELECT 
    l.nome AS aluno,
    a.modalidade,
    a.instrutor,
    a.data_aula,
    a.hora,
    a.duracao
FROM tb_agenda ag
JOIN tb_login l ON ag.aluno = l.id
JOIN tb_aulas a ON ag.cod_agenda = a.cod_aula
ORDER BY a.data_aula, a.hora;

");
if (!$sql) {
    die("Erro no prepare: " . $conecta_db->error);
}
$sql->execute();
$result = $sql->get_result();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Aulas Agendadas - PowerFit</title>
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
<header style="width :170%">
        <h1>PowerFit - Aulas Agendadas</h1>
        <p><a href = "area_adm.php">Voltar</a></p>
    </header>
    <section>
<h2>Aulas Agendadas</h2>
<table>
    <thead>
        <tr>
            <th>Aluno</th>
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
            <td><?= htmlspecialchars($row['aluno']) ?></td>
            <td><?= htmlspecialchars($row['modalidade']) ?></td>
            <td><?= htmlspecialchars($row['instrutor']) ?></td>
            <td><?= htmlspecialchars($row['data_aula']) ?></td>
            <td><?= htmlspecialchars($row['hora']) ?></td>
            <td><?= htmlspecialchars($row['duracao']) ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
        </section>