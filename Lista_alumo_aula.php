<?php
session_start();
include 'conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    die("Usuário não está logado.");
}

$usuario_id = $_SESSION['usuario_id'];

$sql = $conecta_db->prepare("
    SELECT a.modalidade, a.instrutor, a.data_aula, a.hora, a.duracao
    FROM tb_agenda ag
    JOIN tb_aulas a ON ag.cod_aula = a.cod_aula
    WHERE ag.aluno = ?
    ORDER BY a.data_aula, a.hora
");
$sql->bind_param("i", $usuario_id);
$sql->execute();
$result = $sql->get_result();
?>
<h2>Meus Agendamentos</h2>
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
