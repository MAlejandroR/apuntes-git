<?php

$index = file_get_contents("./index.php_");
$conserje = file_get_contents("./Conserje.php_");
$enferemera = file_get_contents("./Enfermera.php_");
$medico = file_get_contents("./Medica.php_");
$personal = file_get_contents("./PersonalAmbulatorio.php_");


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
//Medico
echo "<div class='fichero'>";
echo "<h2>Fichero PersonalAmbulatorio.php_ </h2>";
echo "<pre class=\"prettyprint\">".htmlspecialchars($personal)."</pre>";
echo "<hr />";
echo "</div> ";
//Conserje
echo "<div class='fichero'>";
echo "<h2>Fichero Conserje.php_ </h2>";
echo "<pre class=\"prettyprint\">".htmlspecialchars($conserje)."</pre>";
echo "<hr />";
echo "</div> ";
//Enfermera
echo "<div class='fichero'>";
echo "<h2>Fichero Enfermera.php_ </h2>";
echo "<pre class=\"prettyprint\">".htmlspecialchars($enferemera)."</pre>";
echo "<hr />";
echo "</div> ";
//Medico
echo "<div class='fichero'>";
echo "<h2>Fichero Medico.php_ </h2>";
echo "<pre class=\"prettyprint\">".htmlspecialchars($medico)."</pre>";
echo "<hr />";
echo "</div> ";

?>

    </body>
</html>
