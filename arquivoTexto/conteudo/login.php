<h1>Identifique-se</h1>
    <form method="post" action="">
        <p>
            <label for="login">Login:</label>
            <input type="text" id="login" name="login" required>
        </p>
        <p>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
        </p>
        <br>
        <br>
            <input type="submit" value="Entrar">
    </form>
<br>
<p>Não tem uma conta? <a href="./inicio.php?content=cadastro">Cadastre-se aqui</a></p>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Coleta e sanitização dos dados do formulário
    $login = htmlspecialchars($_POST['login']);
    $senha = htmlspecialchars($_POST['senha']);
    $data = date('d-m-Y H:i:s');

    if (strlen($senha) >= 6){

        // Monta a string que será gravada no arquivo
        $linha = "$login;$senha;$data\n";

        // Caminho do arquivo onde os dados serão salvos
        $arquivo = './conteudo/logs/acessos.txt';
        
        // Abre o arquivo para adicionar dados no final
        $file = fopen($arquivo, 'a');
        if ($file) {
            fwrite($file, $linha);
            fclose($file);
            echo "<script>alert('Dados salvos com sucesso!');</script>";

            // Redireciona para a página após gravar os dados
            header("Location: ./conteudo/Acessou.php");
            exit();
        } else {
            echo "<p>Erro ao abrir o arquivo para escrita.</p>";
        }
    } else {
        echo '<script>alert("Senha deve ter pelo menos 6 caracteres!");</script>';
    }
}
?>