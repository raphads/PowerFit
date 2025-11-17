<?php
include 'conexao.php';

$sql = $conecta_db->prepare("
    SELECT l.nome AS aluno, a.modalidade, a.instrutor, a.data_aula, a.hora, a.duracao
    FROM tb_agenda ag
    JOIN tb_login l ON ag.aluno = l.id
    JOIN tb_aulas a ON ag.cod_aula = a.cod_aula
    ORDER BY a.data_aula, a.hora
");
if (!$sql) {
    die("Erro no prepare: " . $conecta_db->error);
}
$sql->execute();
$result = $sql->get_result();
?>
<h2>Todos os Agendamentos</h2>
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
