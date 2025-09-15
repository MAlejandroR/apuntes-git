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
//Declaro variables enteras con diferente formato
$num_decimal = 52.25;
$num_octal = 07745;
$num_hex = 0xabcda12;
$num_bin = 0b111011101;

//Ahora visualizo los valores
echo "Valor del número entero asignado \$num_decimal = 52.25 es <span style='color:red'>$num_decimal</span><br />";
echo "Valor del número octal asignado \$num_octal = 07745  es <span style='color:red'>$num_octal</span><br />";
echo "Valor del número entero asignado \$num_hex = 0xabcda12 es <span style='color:red'>$num_hex</span><br />";
echo "Valor del número entero asignado \$num_bin = 0b111011101 es <span style='color:red'>$num_bin</span><br />";

echo "<h2>Observa como siempre se visualiza en decimal indistintamente del formato con el que se asignó el valor</h2>"




?>

</body>
</html>