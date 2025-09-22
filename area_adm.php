<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit">
    <title>PowerFit</title>
    <link rel="icon" href="images/logo_semnome.png">
    <link rel="stylesheet" href="site_academia.css">
    <script src="site_academia.js"></script>
    <script>
        function relatorio(){
            window.location('relatorios.html');
            //window.location('pagamentos.html');
        }

    </script>
</head>
<body>
    <header>
        <h1>PowerFit - Área do Administrador</h1>
        <p class="link" text="white" ><a href="login.php">Log out</a></p>
    </header>
        <section class="content" name="content">
        <h2>Listas</h2>
        <button>Lista de Usuários</button><br>
        <button>Lista de Equipamentos</button><br>
        <button>Lista de Aulas</button><br>
        <button onClick="relatorio()">Relatórios</button><br>

</body>
</html>