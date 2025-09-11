<?php

//Comentario
$servidor="127.0.0.1";
$usuario="root";
$senha="usbw";
$banco="cadastro";
$conecta_db= new mysqli($servidor, $usuario, $senha,$banco) ;
if ($conecta_db->connect_error) {
    die("Erro ao conectar ao banco de dados: " . $conecta_db->connect_error);
}


?>