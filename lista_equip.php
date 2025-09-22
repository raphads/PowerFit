<?php

include 'conexao.php';
/*
if(isset($_POST['busca_nome']) != ''){
    $sql = $conecta_db->prepare("SELECT * FROM tb_equip WHERE cod like '{$_POST['busca_nome']}%' order by marca asc");
 //   $sql = mysql_query("select * from tb_equip where marca like '{$_POST['busca_nome']}%' order by marca asc");
}else{*/
    //$sql = mysql_query("select * from tb_equip order by cod asc");
    $sql = $conecta_db->prepare("SELECT * FROM tb_equip");
//$sql->bind_param("s", $codigo); // "s" indica que estamos passando um string (CPF)
$sql->execute();
$result = $sql->get_result(); // Executa a consulta e obtém o resultado
/*}

?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit">
    <title>PowerFit</title>
    <link rel="icon" href="images/logo_semnome.png">
    <link rel="stylesheet" href="site_academia.css">
    <script src="site_academia.js"></script>
</head>
<body>
<form name="form1" method="POST" action="lista_equip.php">
    <label>Digite o código:</label>
    <input type = "text" name="busca_nome">
    <input type = "submit" value = "Pesquisar">
</FORM>

<table border="1" align="center">
    <tr> <!--tr é table row. th é table header, um adiciona linha o outro deixa centralizado e em negrito -->
        <th colspan="7">
            Listagem de Equipamentos</th>
    </tr>
    <tr>
        <th>Codigo</th>
        <th>Tipo</th>
        <th>Marca</th>
        <th>Data de Compra</th>
        <th>Data de Manutenção</th>
        <th>Status</th>
        <th colspan = "3">Alterar</th>
    </tr>
    <?php
        while($linha = $result->fetch_assoc($sql)){
            ?>
            <td><?php echo $linha ['cod']; ?></td>
            <td><?php echo $linha ['tipo']; ?></td>
            <td><?php echo $linha ['marca']; ?></td>
            <td><img src = 'images/del.png'></td>
            <td><img src = 'images/edit.png'></td>
            <tr>
}
            <?php 
            echo "<br>";
            echo "<center>";
            echo "<br>";
            echo "<a href = \"login.php\">RETORNART AO LOGIN";
            echo "<br>";
            
            ?>
            
            
        
        
</table>
</body>    

</html>

<?php
// list_equip.php
// Conexão com o banco
$host = "localhost";
$db   = "powerfit";
$user = "root";   // ajuste seu usuário
$pass = "";       // ajuste sua senha

//try {
    $pdo = new PDO("mysql:host=$servidor;dbname=$banco;charset=utf8", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Busca todos os equipamentos
    $stmt = $pdo->query("SELECT * FROM equipamentos ORDER BY id DESC");
    $equipamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);

//} catch (PDOException $e) {
  //  die("Erro na conexão: " . $e->getMessage());
//}*/
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listagem de Equipamentos - PowerFit</title>
    <link rel="stylesheet" href="site_academia.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background: #f4f4f4;
        }
    </style>
</head>
<body>
    <header style="width :150%">
        <h1>PowerFit - Listagem de Equipamentos</h1>
        <p><a href = "area_adm.php">Voltar</a></p>
    </header>

    <section class="content" style="width :150%">
        <h2>Equipamentos Cadastrados</h2>
        <?php if (count($sql) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Tipo</th>
                        <th>Marca</th>
                        <th>Data Compra</th>
                        <th>Data Manutenção</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $eq): ?>
                        <tr>
                            <td><?= htmlspecialchars($eq['cod']) ?></td>
                            <td><?= htmlspecialchars($eq['tipo']) ?></td>
                            <td><?= htmlspecialchars($eq['marca']) ?></td>
                            <td><?= htmlspecialchars($eq['data_comp']) ?></td>
                            <td><?= htmlspecialchars($eq['data_man']) ?></td>
                            <td><?= htmlspecialchars($eq['status_equip']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhum equipamento cadastrado.</p>
        <?php endif; ?>
    </section>
</body>
</html>
