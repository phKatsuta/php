<h2>Dados Salvos:</h2>
<form method="GET" action="">
    <button type="submit" name="content" value="lerAcessos">Acessos</button>
    <button type="submit" name="content" value="lerCadastros">Cadastros</button>
</form>
<?php
    if (isset($_GET['content'])) {
        $content = $_GET['content'];
        if ($content === 'logs'){
            if (isset($_GET['log'])) {
                $log = $_GET['log'];
            $file = './conteudo/' . $log. '.php';
                if (file_exists($file)){
                    include $file;
                } else {
                    echo '
                        <h1>Oops...</h1>
                        <p>
                            Conteúdo não encontrado! Favor entrar em contato com o administrador da página...
                        </p>
                        ';
                }
            } else {
                echo "Escolha um registro para acessar.";
            }
        }
    }
?>