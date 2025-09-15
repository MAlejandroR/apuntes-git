<?php

$index= file_get_contents("./index.php_");
$ajax= file_get_contents("./RespuestaAjax.php_");


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
echo "<h2>Fichero index.php_ </h2>";
echo "<pre class=\"prettyprint\">".htmlspecialchars($index)."</pre>";
echo "<hr />";
echo "</div> ";
echo "<div class='fichero'>";
echo "<h2>Clase con los métodos de solicitud ajax</h2>";
echo "<pre class=\"prettyprint\">".htmlspecialchars($ajax)."</pre>";
echo "<hr />";
echo "</div> ";

?>

    </body>
</html>
