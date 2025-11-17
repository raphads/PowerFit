<?php
include 'conexao.php';

// Lê os dados enviados em JSON
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['id'], $data['campo'], $data['valor'])) {
    $id = intval($data['id']);
    $campo = $data['campo'];
    $valor = $data['valor'];

    // Lista de campos permitidos para evitar SQL Injection
    $camposPermitidos = [
        'nome', 'email', 'senha', 'data_nasc', 'tel', 'cep',
        'rua', 'num', 'comp', 'bairro', 'cid', 'uf', 'func',
        'plano', 'tempo'
    ];

    if (in_array($campo, $camposPermitidos)) {
        // Monta a query dinamicamente
        $sql = $conecta_db->prepare("UPDATE tb_login SET $campo = ? WHERE id = ?");
        $sql->bind_param("si", $valor, $id);

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
