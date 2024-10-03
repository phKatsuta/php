<h1>Cadastre-se</h1>
<form method="post" action="">
    <p>
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" required>
    </p>
    <p>
        <label for="email">e-mail:</label>
        <input type="email" id="email" name="email" required>
    </p>
    <p>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>
    </p>
    <p>
        <label for="senha">Confirme a senha:</label>
        <input type="password" id="senha2" name="senha2" required>
    </p>
    <br>
    <br>
        <input type="submit" value="Salvar">
</form>
<p>Já possui acesso? <a href="./inicio.php?content=login">Acesse aqui</a></p>

<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Coleta e sanitização dos dados do formulário
    $login = htmlspecialchars($_POST['login']);
    $email = htmlspecialchars($_POST['email']);
    $senha = htmlspecialchars($_POST['senha']);
    $senha2 = htmlspecialchars($_POST['senha2']);
    // Verificação de senhas na criação do login
    if ($senha !== $senha2){
        $_SESSION['msg'] = "Senhas diferentes! Tente novamente!";
        echo '<script> alert("' . $_SESSION['msg'] . '")</script>'; 
        exit();
    } else if (strlen($senha) < 6){
        $_SESSION['msg'] = "Senha deve conter pelo menos 6 caracteres!";
        echo '<script> alert("' . $_SESSION['msg'] .'")</script>'; 
        exit();
    } else{
        $data = date('d-m-Y H:i:s');

        // Monta a string que será gravada no arquivo
        $linha = "$login;$email;$senha;$data\n";

        // Caminho do arquivo onde os dados serão salvos
        $arquivo = './conteudo/logs/cadastros.txt';
        
        // Abre o arquivo para adicionar dados no final
        $file = fopen($arquivo, 'a');
        if ($file) {
            fwrite($file, $linha);
            fclose($file);

            $_SESSION['msg'] = "Dados salvos com sucesso!";
            echo '<script> alert("' . $_SESSION['msg'] . '")</script>'; 
            header('Location: inicio.php?content=login');
            exit();
        } else {
            $_SESSION['msg'] = "Erro ao abrir o arquivo para escrita!";
            header('Location: inicio.php?content=cadastro');
            exit();
        }
    }
}
?>