<?php
include 'conexao.php';

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['cod'], $data['campo'], $data['valor'])) {
    $cod   = intval($data['cod']);
    $campo = $data['campo'];
    $valor = $data['valor'];

    // Campos permitidos (não inclui 'cod')
    $permitidos = ['tipo','marca','data_comp','data_man','status_equip'];

    if (in_array($campo, $permitidos)) {
        $sql = $conecta_db->prepare("UPDATE tb_equip SET $campo = ? WHERE cod = ?");
        $sql->bind_param("si", $valor, $cod);

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
