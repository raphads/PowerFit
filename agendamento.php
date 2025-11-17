<?php
session_start();
include 'conexao.php';

$sql = $conecta_db->prepare("SELECT * FROM tb_aulas");
$sql->execute();
$result = $sql->get_result(); 

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PowerFit</title>
    <link rel="icon" href="images/logo_semnome.png">
    <link rel="stylesheet" href="site_academia.css">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <script src="site_academia.js" defer></script>
    <script>
        function Redirecionar(){
         //   alert("Aula Agendada com Sucesso!");
         //print(usuario_login);
        }
    </script>
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
    <header>
        <div class="menu-icon" onclick="toggleMenu()">&#9776;</div>
        <img src="images/logo_semnome.png" height="10%" width="10%" style="position: static; right: auto;">
        <h1>PowerFit</h1>
    </header>
    <hr>
    <nav class="sidebar" id="sidebar">
        <ul>
            <li><a href="index.html">Início</a></li>
           <!-- <li><a href="cadastro.php">Cadastro</a></li> -->
            <li><a href="agendamento.html">Agendamento</a></li>
         <!--   <li><a href="equipamentos.php">Equipamentos</a></li>-->
            <li><a href="planos.html">Planos</a></li>
            <li><a href="pagamentos.html">Pagamentos</a></li>
            <li><a href="aulas.html">Aulas</a></li>
          <!--  <li><a href="relatorios.html">Relatórios</a></li>-->
        </ul>
    </nav>
    
        
       

        <section class="content" style="width :150%">
            <h2>Agendamento de Aulas</h2>

        <?php if (count($sql) > 0): ?>
            <form method="POST" action="salvar_agendamento.php">
            <table>
                <thead>
                    <tr>
                        <th>Agendar</th>
                        <th>Modalidade</th>
                        <th>Instrutor</th>
                        <th>Quantidade Máxima de Alunos</th>
                        <th>Data</th>
                        <th>Horário</th>
                        <th>Duração</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $eq): ?>
                        <tr>
                            <td><input type="checkbox" name="aulas[]" value="<?= $eq['cod_aula'] ?>"></td>
                            <td><?= htmlspecialchars($eq['modalidade']) ?></td>
                            <td><?= htmlspecialchars($eq['instrutor']) ?></td>
                            <td><?= htmlspecialchars($eq['qtde_alunos']) ?></td>
                            <td><?= htmlspecialchars($eq['data_aula']) ?></td>
                            <td><?= htmlspecialchars($eq['hora']) ?></td>
                            <td><?= htmlspecialchars($eq['duracao']) ?></td>
                            <td><></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table> 
            <button type="submit">Agendar</button>
        <?php else: ?>
            <p>Nenhuma aula cadastrada.</p>
        <?php endif; ?>
               
                </form>
    </section>

    
    <footer>
        <p>  <a href="https://facebook.com/"><img class="facebook" src="images/facebook.png" alt="" height="20px" width="20px"></a>&nbsp;  &nbsp;  <a href="https://instagram.com/"> <img class="facebook" src="images/instagram - Copia.png" alt="" height="20px" width="20px"></a>  &nbsp;  &nbsp;    <a href="https://twitter.com/"><img class="facebook" src="images/twitter.png" height="20px" width="20px"></a> &nbsp;  &nbsp;  <a href="https://tiktok.com/"><img class="facebook" src="images/tik-tok.png" alt="" height="20px" width="20px"></a> &nbsp;  &nbsp;  <a href="https://youtube.com/"><img class="facebook" src="images/youtube.png" alt="" height="20px" width="20px"></a> </p>
        <p>Telefone: (99) 99999-9999</p>
    </footer>
</body>
</html>
 
