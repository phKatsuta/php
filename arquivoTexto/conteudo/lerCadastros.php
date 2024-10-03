    <h1>Cadastros</h1>
    <table border="1">
    <tr>
        <th>Login</th>
        <th>e-mail</th>
        <th>Senha</th>
        <th>Data de criação</th>
    </tr>
    <?php
    // Exibe o conteúdo do arquivo
    if (file_exists('conteudo/logs/cadastros.txt')) {
        $arquivo = fopen('conteudo/logs/cadastros.txt', 'r');
        while(!feof($arquivo)) {
            $linha = fgets($arquivo);
            $campos = explode(";",$linha);
            if (trim($linha) !== "") {
                echo "<tr>";
                echo "<td>".htmlspecialchars($campos[0])."</td>";
                echo "<td>".htmlspecialchars($campos[1])."</td>";
                echo "<td>".htmlspecialchars($campos[2])."</td>";
                echo "<td>".htmlspecialchars($campos[3])."</td>";
                echo "</tr>";
            }
        }
    } else {
        echo "Nenhum dado salvo ainda.";
    }
    ?>
    </table>