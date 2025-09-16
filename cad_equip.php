<?php
 include 'conexao.php';
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
$codigo = $_POST["codigo"];
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
	echo "<br>";
    //return;*/
/*}else{*/
      $sql = $conecta_db->prepare ("INSERT INTO tb_equip (cod, tipo, marca, data_comp, data_man, status_equip)
	                     VALUES ('$codigo','$tipo','$marca','$data_compra','$data_manut','$status')") ;
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

?>
     	
				  