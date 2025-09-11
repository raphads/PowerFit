<?php
 include 'conexao.php';
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
$user = $_POST["txt_email"];
$senha = $_POST["txt_senha"];
$sql = $conecta_db->prepare("SELECT * FROM tb_login WHERE (email = '$user') and senha = '$senha'");
$sql->execute();
$result = $sql->get_result(); // Executa a consulta e obtém o resultado

if($user == "admin" && $senha == "admin"){
    echo "<center>";
    echo "<br>";
    echo "<a href=\"area_adm.php\">Area do Administrador</a>";
}else if ($result->num_rows > 0) {
    echo "<center>";
    echo "<hr>";
    echo "Login realizado com sucesso!";
    echo "<hr>";
	echo "<br>";
    //echo "<a href=\"login.php\">RETORNAR AO LOGIN </a>";
    echo "<a href=\"listagem.php\">Lista de Usuários</a>";
    //header('location:listagem.php'); J Elimina a parte de cima, sem aparecer a mensagem
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