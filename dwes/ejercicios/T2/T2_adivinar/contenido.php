<?php
$index = file_get_contents("./index.php_");
$jugar = file_get_contents("./jugar.php_");
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              <link rel="stylesheet" href="./estilo.css" type="text/css">
        <title>Document</title>
        <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
    </head>
    <body>
        <?php
//index
        echo "<div class='fichero'>";
        echo "<h2>Fichero index.php_ </h2>";
        echo "<pre class=\"prettyprint\">" . htmlspecialchars($index) . "</pre>";
        echo "<hr />";
        echo "</div> ";
        echo "<div class='fichero'>";
        echo "<h2>Fichero jugar.php_ </h2>";
        echo "<pre class=\"prettyprint\">" . htmlspecialchars($jugar) . "</pre>";
        echo "<hr />";
        echo "</div> ";
        ?>

    </body>
</html>
