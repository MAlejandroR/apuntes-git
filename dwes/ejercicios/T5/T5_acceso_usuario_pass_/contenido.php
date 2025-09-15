<?php
include "./../DB.php_";

//DB::inserta_acceso_ip("Contendio T4_acceso_usuario_pass");

$index = file_get_contents("./index.php_");
$bloqueo = file_get_contents("./bloqueo.php_");
$sitio= file_get_contents("./sitio.php_");
$navegando= file_get_contents("./navegando.php_");

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
echo "<h2>Fichero index.php_ principal</h2>";
echo "<pre class=\"prettyprint\">".htmlspecialchars($index)."</pre>";
echo "<hr />";
echo "</div> ";
//bloqueo
echo "<div class='fichero'>";
echo "<h2>Fichero bloqueo.php_ </h2>";
echo "<pre class=\"prettyprint\">".htmlspecialchars($bloqueo)."</pre>";
echo "<hr />";
echo "</div> ";
//sitio.php_
echo "<div class='fichero'>";
echo "<h2>Fichero  sito.php_</h2>";
echo "<pre class=\"prettyprint\">".htmlspecialchars($sitio)."</pre>";
echo "<hr />";
echo "</div> ";
//navegando
echo "<div class='fichero'>";
echo "<h2>Fichero navegando.php_</h2>";
echo "<pre class=\"prettyprint\">".htmlspecialchars($navegando)."</pre>";
echo "<hr />";
echo "</div> ";
?>

    </body>
</html>
