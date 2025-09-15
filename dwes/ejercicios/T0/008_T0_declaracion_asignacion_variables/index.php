<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
//Declaro variables de diferente tipo y les asigno valores con diferente formato
//Asingación de variables de tipo enteriò
$numDecimal = 125;
$numOctal = 0774;
$numHex=0xAbC12;
$numbin = 0b1100;
$cadena = "Esto es una cadena de caracteres";
$cadena2 = 'Esto es otra cadena de caracteres';
$cadenaHeredoc=<<<FIN
                Esto es una cdena
                multilínea
                y termina aqui
FIN;
$cadenaNewdoc=<<<'FIN'
                Esto es una cdena
                multilínea
                y termina aqui
FIN;
$numReal=1.23432230003322014000002234101;
$numRealCientifico=1234E-2;
$valorNull = null;
$boleano1=true;
$boleano2 = false;

//Ahora visualizamos el valor de las variables
echo "<h2>Valores de tipo entero</h2>";
echo "\$numDecimal(125) = $numDecimal <br />";
echo "\$numOctal(0874)=$numOctal<br />";
echo "\$numHex=(0xAbC12)=$numHex<br />";
echo "\$numbin(0b1100)=$numbin<br />";
echo "<h2>Valores de tipo real</h2>";
echo "\$numReal(1.23432230003322014000002234101)=$numReal<br />";
echo "\$numRealCientifico(1234E-2)=$numRealCientifico<br />";
echo "<h2>Valores de tipo cadena o string</h2>";
echo "\$cadena =$cadena <br />";
echo "\$cadena2 = $cadena2 <br />";
echo "\$cadenaHeredoc=$cadenaHeredoc<br />";
echo "\$cadenaNewdoc=$cadenaNewdoc<br />";
echo "<h2>Valores de tipo null</h2>";
echo "\$valorNull (null)=$valorNull<br />";
echo "\$boleano1 (true) =$boleano1 <br />";
echo "\$boleano2 (false)= $boleano2<br />";
?>
</body>
</html>