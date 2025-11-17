<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit">
    <title>PowerFit</title>
    <link rel="icon" href="images/logo_semnome.png">
    <link rel="stylesheet" href="site_academia.css">
    <script src="site_academia.js"></script>
    <script type="text/javascript" src="jquery-3.5.1.min.js"></script>

        </head>
        </html>
<?php
session_start();
 include 'conexao.php';
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
$user = $_POST["txt_email"];
$senha = $_POST["txt_senha"];
$sql = $conecta_db->prepare("SELECT * FROM tb_login WHERE email = ? AND senha = ?");
$sql->bind_param("ss", $user, $senha); // "ss" = duas strings
$sql->execute();
$result = $sql->get_result(); // Executa a consulta e obtém o resultado

if($user == "admin@powerfit.com" && $senha == "admin"){
    echo "<center>";
    echo "<br>";
    //echo "<a href=\"area_adm.php\">Area do Administrador</a>";
    header('location:area_adm.php');
}else if ($result->num_rows > 0) {
    echo "<center>";
    echo "<hr>";
    echo "Login realizado com sucesso!";
    echo "<hr>";
	echo "<br>";
    $row = $result->fetch_assoc();
    $_SESSION['usuario_id'] = $row['id'];
    //echo "<a href=\"login.php\">RETORNAR AO LOGIN </a>";
    //echo "<a href=\"cadastro.php\">Lista de Usuários</a>";
    //header('location:listagem.php'); J Elimina a parte de cima, sem aparecer a mensagem
    header('location:agendamento.php');
} else {
    echo "<center>";
    echo "<hr>";
    echo "Usuario ou Senha não conferem. Tente novamente.";
    echo "<hr>";
	echo "<br>";
    echo "<a href=\"login.php\">Voltar </a>";
    }
}

?>


