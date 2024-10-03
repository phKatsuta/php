<?php
$arquivo = './logs/contador.txt';

if (!file_exists($arquivo)) {
    // Abre o arquivo para escrita (cria se não existir)
    $file = fopen($arquivo, 'w');
    // Verifica se o arquivo foi aberto com sucesso
    if ($file) {
        // Escreve o número 0 no arquivo
        fwrite($file, '0');

        // Fecha o arquivo
        fclose($file);
    }
}

// Lê o valor atual do contador
$contador = (int)file_get_contents($arquivo);

// Incrementa o contador
$contador++;

// Salva o novo valor do contador de volta no arquivo
file_put_contents($arquivo, $contador);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página PHP</title>
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <style>
        div{
            width:800px;
            height: 650px;
            border: 5px solid;
            padding: 5px;
        }
    </style>
</head>
<body>
    <div>

        <h1>Acesso concedido!</h1>
        <p>
            Parabéns! Você é o visitante nº <b style="font-size:30px"><?php echo $contador; ?></b>!
        </p>
        <canvas id="arabescoCanvas" width="800" height="500"></canvas>
    <script src="arabesco.js"></script>
    </div>

</body>
</html>