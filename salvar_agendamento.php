<?php
session_start();
include 'conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    die("Usuário não está logado.");
}

$usuario_id = $_SESSION['usuario_id'];

if (!empty($_POST['aulas'])) {
    foreach ($_POST['aulas'] as $cod_aula) {
        $sql = $conecta_db->prepare("INSERT INTO tb_agenda (aluno, cod_agenda) VALUES (?, ?)");
        if (!$sql) {
            die("Erro no prepare: " . $conecta_db->error);
        }

        $sql->bind_param("ii", $usuario_id, $cod_aula);

        if (!$sql->execute()) {
            die("Erro no execute: " . $sql->error);
        }
    }
    header('location:Lista_alumo_aula.php');
    //echo "Agendamento realizado com sucesso!";
} else {
    echo "Nenhuma aula selecionada.";
}
?>
