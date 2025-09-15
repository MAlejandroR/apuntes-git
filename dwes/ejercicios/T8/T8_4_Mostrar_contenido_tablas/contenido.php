<?php

$index = file_get_contents("./index.php_");
$bd = file_get_contents("./BD.php_");
$base_datos = file_get_contents("./base_datos.php_");
$tablas = file_get_contents("./tablas.php_");
$listado = file_get_contents("./listado.php_");
$tabla = file_get_contents("./Tabla.php_");
$estilo = file_get_contents("./estilo_1.css");



?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="./estilo.css" type="text/css">
        <title>Document</title>
        <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
    </head>
    <body>
<?php
//index
echo "<div class='fichero'>";
echo "<h2>Fichero index.php_ </h2>";
echo "<pre class=\"prettyprint\">".htmlspecialchars($index)."</pre>";
echo "<hr />";
echo "</div> ";
echo "<div class='fichero'>";
echo "<h2>Fichero BD.php_ </h2>";
echo "<pre class=\"prettyprint\">".htmlspecialchars($bd)."</pre>";
echo "<hr />";
echo "</div> ";
echo "<div class='fichero'>";
echo "<h2>Fichero base_datos.php_ </h2>";
echo "<pre class=\"prettyprint\">".htmlspecialchars($base_datos)."</pre>";
echo "<hr />";
echo "</div> ";
echo "<div class='fichero'>";
echo "<h2>Fichero tablas.php_ </h2>";
echo "<pre class=\"prettyprint\">".htmlspecialchars($tablas)."</pre>";
echo "<hr />";
echo "</div> ";
echo "<div class='fichero'>";
echo "<h2>Fichero listado.php_ </h2>";
echo "<pre class=\"prettyprint\">".htmlspecialchars($listado)."</pre>";
echo "<hr />";
echo "</div> ";
echo "<div class='fichero'>";
echo "<h2>Fichero Tabla.php_ </h2>";
echo "<pre class=\"prettyprint\">".htmlspecialchars($tabla)."</pre>";
echo "<hr />";
echo "</div> ";
echo "<div class='fichero'>";
echo "<h2>Fichero estilo.css </h2>";
echo "<pre class=\"prettyprint\">".htmlspecialchars($estilo)."</pre>";
echo "<hr />";
echo "</div> ";

?>

    </body>
</html>
