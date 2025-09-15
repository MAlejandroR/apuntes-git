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
//Declaro un número entero
$num = 5445.23;

//Lo convierto a una cadena string que contiene la representación binaria del número
$num_bin = decbin($num);

echo "Valor de <span style='color: darkred'>$num</span> convertida a binario <span style='color:blue'>$num_bin</span><br />";
echo "El tipo de <span style='color: darkred'>$num</span> es <span style='color:blue'>" . gettype($num) . "</span><br />";
echo "El tipo de <span style='color: darkred'>$num_bin</span> es <span style='color:blue'>" . gettype($num_bin) . "</span><br />";

//Conversión a hexadecimal
$num_hex = dechex($num);
//Conversión a octal
$num_oct = decoct($num);

//Visualizo la información
echo "<hr />";
echo "Valor de <span style='color: darkred'>$num</span> convertida a hexadecimal  <span style='color:blue'>$num_hex</span><br />";
echo "Valor de <span style='color: darkred'>$num</span> convertida a octal  <span style='color:blue'>$num_oct</span><br />";
?>
</body>
</html>