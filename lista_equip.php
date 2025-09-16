<?php

include 'conexao.php';

if(isset($_POST['busca_nome']) != ''){
    $sql = $conecta_db->prepare("SELECT * FROM tb_equip WHERE cod like '{$_POST['busca_nome']}%' order by marca asc");
 //   $sql = mysql_query("select * from tb_equip where marca like '{$_POST['busca_nome']}%' order by marca asc");
}else{
    $sql = mysql_query("select * from tb_equip order by cod asc");
}

?>

<html>
<body>
<form name="form1" method="POST" action="lista_equip.php">
    <label>Digite o código:</label>
    <input type = "text" name="busca_nome">
    <input type = "submit" value = "Pesquisar">
</FORM>

<table border="1" align="center">
    <tr> <!--tr é table row. th é table header, um adiciona linha o outro deixa centralizado e em negrito -->
        <th colspan="7" bgcolor="MediumAquamarine">
            Listagem de Equipamentos</th>
    </tr>
    <tr>
        <th bgcolor="LightGreen">Codigo</th>
        <th bgcolor="LightGreen">Tipo</th>
        <th bgcolor="LightGreen">Marca</th>
        <th bgcolor="LightGreen">Data de Compra</th>
        <th bgcolor="LightGreen">Data de Manutenção</th>
        <th bgcolor="LightGreen">Status</th>
        <th colspan = "3" bgcolor = "LightGreen">Alterar</th>
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

            <?php }
            echo "<br>";
            echo "<center>";
            echo "<br>";
            echo "<a href = \"login.php\">RETORNART AO LOGIN";
            echo "<br>";
            
            ?>
            
            
        
        
</table>
</body>    

</html>