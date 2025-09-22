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
$tipo = $_POST["tipo"];
$marca = $_POST["marca"];
$data_compra = $_POST["data_compra"];
$data_manut = $_POST["data_manut"];
$status = $_POST["modalidade"];


$sql = $conecta_db->prepare("SELECT * FROM tb_equip WHERE cod = ?");
$sql->bind_param("s", $codigo); // "s" indica que estamos passando um string (CPF)
$sql->execute();
$result = $sql->get_result(); // Executa a consulta e obtém o resultado


/*
if ($result->num_rows > 0) {
    echo "<center>";
    echo "<hr>";
    echo "Conta já existente";
    echo "<hr>";
	echo "<br>";*/
/*} else {

    if($senha != $confirma){
    echo "<center>";
    echo "<hr>";
    echo "Senhas não conferem. Tente novamente.";
    echo "<hr>";
	echo "<br>";  cod,'$codigo',
    //return;*/
/*}else{*/
      $sql = $conecta_db->prepare ("INSERT INTO tb_equip ( tipo, marca, data_comp, data_man, status_equip)
	                     VALUES ('$tipo','$marca','$data_compra','$data_manut','$status')") ;
    $sql->execute();

	     /*   if ($sql->affected_rows > 0) {
            echo "<center>";
            echo "<hr>";
            echo "Conta criada com Sucesso";
            echo "<hr>";
            echo "<br>";
      /*  } else {
            echo "<center>";
            echo "<hr>";
            echo "Houve um erro ao criar a conta. Tente novamente.";
            echo "<hr>";
            echo "<br>";
        }*/
    }
/*}*/
//}
header('location:area_adm.php');
?>
     	
  