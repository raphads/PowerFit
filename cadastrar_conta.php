<?php
 include 'conexao.php';
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
$cpf = $_POST["cpf"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$data_nasc = $_POST["data_nasc"];
$telefone = $_POST["telefone"];
$cep = $_POST["cep"];
$rua = $_POST["rua"];
$numero = $_POST["numero"];
$compl = $_POST["compl"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$funcao = $_POST["funcao"];
$plano = $_POST["plano"];
$tempo = $_POST["tempo"];

$sql = $conecta_db->prepare("SELECT * FROM tb_login WHERE cpf = ?");
$sql->bind_param("s", $cpf); // "s" indica que estamos passando um string (CPF)
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
      $sql = $conecta_db->prepare ("INSERT INTO tb_login (cpf, nome, email, senha, data_nasc, tel, cep, rua, num, comp, bairro, cid, uf, func, plano, tempo)
	                     VALUES ('$cpf','$nome','$email','$senha','$data_nasc','$telefone','$cep','$rua','$numero','$compl', '$bairro', '$cidade', '$estado','$funcao', '$plano', '$tempo')") ;
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
     	
				  