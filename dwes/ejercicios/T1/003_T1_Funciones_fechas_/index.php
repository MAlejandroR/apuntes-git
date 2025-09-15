
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


<?php
echo "<h3>Valor del instante actual <strong>".time()."</strong></h3>";
echo "<h4>Son segundos transcurridos desde el 1/1/1970 (Instante cero unix)";
$fecha = date("d-m-Y H:i:s", time());
echo "<h3>Fecha actual $fecha</h3>";
$dia =date("d");
$mes =date("m");
$year =date("Y");
$hora =date("h");
$min =date("i");
$seg =date("s");
echo "<ul>";
echo "<li>Valor de día <strong>$dia</strong></li>";
echo "<li>Valor de mes <strong>$mes</strong></li>";
echo "<li>Valor de año <strong>$year</strong></li>";
echo "<li>Valor de hora <strong>$hora</strong></li>";
echo "<li>Valor de minuto <strong>$min</strong></li>";
echo "<li>Valor de segundo <strong>$seg</strong></li>";
echo "</ul>";
echo "<hr />";
setlocale(LC_ALL, "es_ES.utf8");
$fecha = strftime("%A, %d de %B de %Y %r");
echo "<h3>Fecha en idioma español:  <strong>$fecha</strong></h3>";
setlocale(LC_ALL, "en_US.utf8");
$fecha = strftime("%A, %d of %B de %Y %r");
echo "<h3>Date in english language: <strong>$fecha</strong></h3>";



?>

</body>
</html>
