<?php
date_default_timezone_set('America/Sao_Paulo');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso</title>
    <link rel="stylesheet" type="text/css" href="./CSS/style.css">
</head>
<body>
    <div id="header">
        <h1>Formulário | PHP</h1>

            <form method="get" action="">
                <button type="submit" name="content" value="conteudo">Home</button>
                <button type="submit" name="content" value="login">Login</button>
                <button type="submit" name="content" value="cadastro">Cadastro</button>
                <button type="submit" name="content" value="logs">Logs</button>
                <button type="submit" name="content" value="integrantes">Integrantes</button>
            </form>
    </div>

    <div id="main">
        <div id="cadastro">
            <?php
                if (isset($_GET['content'])) {
                    $content = $_GET['content'];
                    $file = './conteudo/' . $content. '.php';
                    if (file_exists($file)){
                        include $file;
                    } else {
                        echo '
                            <h1>Oops...</h1>
                            <p>
                                Conteúdo não encontrado! Favor entrar em contato com o administrador da página...
                            </p>
                            <p>
                                Mas... Não fique triste! Aqui está uma receita deliciosa:
                            </p>
                        ';
                        include "./receita.php";
                    }
                } else {
                    include "./conteudo/conteudo.php";
                }
            ?>
        </div>
    </div>

    <div id="footer">
        <p>
            Análise e Desenvolvimento de Sistemas - 3o semestre de 2024
        </p>
        <p>
            ILP540 - Linguagem de Programação IV - INTERNET
        </p>
        <p>
            Atividade Avaliativa II - Formulários
        </p>
    </div>
</body>
</html>