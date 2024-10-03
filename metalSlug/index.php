<?php
$link = "xml/metalSlug.xml";
$xml = simplexml_load_file($link)->metalSlug or die('Erro ao carregar XML.');
/*
* para verificação de erros
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="./CSS/style.css" />
  <title>Metal Slug</title>
</head>

<body>
  <header>
    <?php
    // Carregar título h1 e subtítulo h2
    foreach ($xml->header as $titulo) {
      echo "<h1>" . utf8_decode($titulo->h1) . "</h1>";
      echo "<h2>" . utf8_decode($titulo->h2) . "</h2>";
    }
    // Carregar Paginas do site
    foreach ($xml->paginasSite->conteudo as $conteudo) {
      echo '<button class="tablink" onclick="openPage(' . "'" . utf8_decode($conteudo->evento) . "', this, '" . utf8_decode($conteudo->cor) . "')" . '" id="' . utf8_decode($conteudo->default) . '"> ' . utf8_decode($conteudo->titulo) . ' </button>';
    }
    ?>
  </header>
  <main>
    <?php
    // Carregar Conteúdo de cada página
    foreach ($xml->conteudoPagina->conteudo as $conteudo) {
      foreach ($conteudo->divPagina as $divPagina) {
        echo '<div id="' . utf8_decode($divPagina->id) . '" class = "conteudoPagina">'; // conteudoPagina
        echo '<h2>' . utf8_decode($divPagina->h2) . '</h2>';
        foreach ($divPagina->p as $paragrafo) {
          echo '<p>' . utf8_decode($divPagina->paragrafo) . '</p>';
        }
        echo '<div class="tab">'; // tab
        // Carregar Botões de cada aba
        foreach ($divPagina->divBotoes->button as $button) {
          echo '<button class="tablinks" onmouseover="abrirMenu(event, ' . "'" . utf8_decode($button->evento) . "')" . '">' . utf8_decode($button->titulo) . '</button>';
        }
        echo '</div>'; // tab
        // Carregar Conteúdo de cada aba
        foreach ($divPagina->divConteudoAba as $divConteudoAba) {
          echo '<div id="' . utf8_decode($divConteudoAba->id) . '" class="conteudoAba">'; // conteudoAba
          foreach ($divConteudoAba->conteudo as $conteudo) {
            echo '<h3>' . utf8_decode($conteudo->titulo) . '</h3><ul>';
            foreach ($conteudo->p as $paragrafo) {
              echo '<p>' . utf8_decode($paragrafo) . '</p>';
            }
            if (isset($conteudo->midia) && count($conteudo->midia) > 0) {
              echo "</ul><ul>";
              foreach ($conteudo->midia as $midia) {
                if (isset($conteudo->midia->caminhoVideo) && count($conteudo->midia->caminhoVideo) > 0) {
                  foreach ($midia->caminhoVideo as $caminhoVideo) {
                    echo '<video width="480" controls> <source src="' . $caminhoVideo . '" type="video/mp4">O seu navegador não suporta a tag video</video>';
                  }
                }
                if (isset($conteudo->midia->iframe) && count($conteudo->midia->iframe) > 0) {
                  foreach ($midia->iframe as $iframe) {
                    echo '<iframe width="420" height="345" src="' . $iframe . 'title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';
                  }  
                }
                echo "<li><strong>" . utf8_decode($midia->titulo) . "</strong><br>";
                echo "<p>" . utf8_decode($midia->p) . "</p>";
                echo "<img src='" . $midia->caminho . "' alt='" . $midia->titulo . "'></li>";

              }
              echo "</ul>";
            }
          }
          echo '</ul></div>'; // divConteudoAba
        }
      }

      echo '<div class="clearfix"></div>';
      echo '</div>'; // conteudoPagina
    }
    ?>
  </main>

  <script type="text/javascript" src="./SCRIPT/script.js"></script>
</body>

</html>