<?php

$plantilla = file_get_contents("./vistas/template/index.tpl");
$index = file_get_contents("./index.php_");
$bd = file_get_contents("./DB.php_");
$producto = file_get_contents("./Producto.php_");
$estilo = file_get_contents("./estilo.css");


?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="./../estilo.css" type="text/css">
        <title>Document</title>
        <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
    </head>
    <body>
<?php
//index
echo "<div class='fichero'>";
echo "<h2>plantilla index.tpl</h2>";
echo "<pre class=\"prettyprint\">".htmlspecialchars($plantilla)."</pre>";
echo "<hr />";
echo "</div> ";
echo "<div class='fichero'>";
echo "<h2>Fichero index.php_ </h2>";
echo "<pre class=\"prettyprint\">".htmlspecialchars($index)."</pre>";
echo "<hr />";
echo "</div> ";
echo "<div class='fichero'>";
echo "<h2>Clasee DB.php_ sería el controlador del modelo</h2>";
echo "<pre class=\"prettyprint\">".htmlspecialchars($bd)."</pre>";
echo "<hr />";
echo "</div> ";
echo "<div class='fichero'>";
echo "<h2>Clase Producto.php_  sería un claro modelo de la lógica</h2>";
echo "<pre class=\"prettyprint\">".htmlspecialchars($producto)."</pre>";
echo "<hr />";
echo "</div> ";
echo "<div class='fichero'>";
echo "<h2>Fichero estilo.css (Observa como el fichero estilo se aporta a la vista tpl) </h2>";
echo "<pre class=\"prettyprint\">".htmlspecialchars($estilo)."</pre>";
echo "<hr />";
echo "</div> ";

?>

    </body>
</html>
