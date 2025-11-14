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
 include 'conexao.php';
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
//$codigo = $_POST["codigo"];
$modalidade = $_POST["modalidade"];
$instrutor = $_POST["instrutor"];
$qtde_alunos = $_POST["qtde"];
$data_aula = $_POST["data_aula"];
$horario = $_POST["horario"];
$tempo = $_POST["tempo"];


$sql = $conecta_db->prepare("SELECT * FROM tb_aulas WHERE cod_aula = ?");
$sql->bind_param("s", $codigo); // "s" indica que estamos passando um string (CPF)
$sql->execute();
$result = $sql->get_result(); // Executa a consulta e obtém o resultado

    $sql = $conecta_db->prepare ("INSERT INTO tb_aulas (modalidade, instrutor, data_aula, qtde_alunos, hora, duracao)
	                     VALUES ('$modalidade','$instrutor','$data_aula','$qtde_alunos','$horario','$tempo')") ;
    $sql->execute();

    }
header('location:area_adm.php');
?>