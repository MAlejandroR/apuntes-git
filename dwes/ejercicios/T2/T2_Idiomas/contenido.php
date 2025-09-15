<?php

$index = file_get_contents("./index.php_");
$sitio = file_get_contents("./sitio.php_");


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
echo "<pre class=\"prettyprint\">".htmlspecialchars($index)."</pre>";
echo "<hr />";
echo "</div> ";
echo "<div class='fichero'>";
echo "<h2>Fichero sitio.php_ </h2>";
echo "<pre class=\"prettyprint\">".htmlspecialchars($sitio)."</pre>";
echo "<hr />";
echo "</div> ";

?>

    </body>
</html>
