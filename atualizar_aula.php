<?php
include 'conexao.php';

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['cod_aula'], $data['campo'], $data['valor'])) {
    $cod_aula = intval($data['cod_aula']);
    $campo    = $data['campo'];
    $valor    = $data['valor'];

    // Campos permitidos (não inclui 'cod_aula')
    $permitidos = ['modalidade','instrutor','qtde_alunos','data_aula','hora','duracao'];

    if (in_array($campo, $permitidos)) {
        $sql = $conecta_db->prepare("UPDATE tb_aulas SET $campo = ? WHERE cod_aula = ?");
        $sql->bind_param("si", $valor, $cod_aula);

        if ($sql->execute()) {
            echo "Campo atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar: " . $sql->error;
        }
    } else {
        echo "Campo inválido.";
    }
} else {
    echo "Dados incompletos.";
}
?>
