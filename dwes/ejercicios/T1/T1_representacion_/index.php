<!--
En este caso he mezclado el código php con el html
Para que veais la manera de poderlo hacer
No obstante no suele ser una práctica habitual
Recomendándose siempre separar el controlador (php) con la
  vista (html con algo de php para contruir la vista (visualizar valores,...)  )
-->
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
<h1>Mostrar números en diferentes sistemas numéricos</h1>

<hr/>
<?php
//Asignamos valores a variables
//Usamos diferentes sistemas de numeración
$dec = 125;
$bin = 0b1100111;
$oct = 0447;
$hex = 0xFFA1;


//Mostramos los valores de las variables
echo "<h2>Mostramos los valores asignados</h2>";
echo "<h4>Valor \$dec en la asignación \$dec=125 es $dec</h4>";
echo "<h4>Valor \$bin en la asignación \$bin =0b1100111 es $dec</h4>";
echo "<h4>Valor \$oct en la asignación \$oct=0447 es $dec</h4>";
echo "<h4>Valor \$hex en la asignación \$hex=0xFFA1 es $dec</h4>";


//Mostramos cada valor en diferentes sitemas de numeraicón
//usamos las funcines de conversión
//decxxx, siendo xxx oct, bin, o hex
echo "<h2>Mostramos el valor de \$dec= 125 en los diferentes sistemas numéricos</h2>";
echo "<h4>Valor \$dec=125 en decimal es  $dec</h4>";
echo "<h4>Valor \$dec=125 en binario  es " . decbin($dec) . "</h4>";
echo "<h4>Valor \$dec=125 en octal  es " . decoct($dec) . "</h4>";
echo "<h4>Valor \$dec=125 en hexadecimal  es " . dechex($dec) . "</h4>";
echo "<h2>Mostramos el valor de \$bin= 0b1100111 en los diferentes sistemas numéricos</h2>";
echo "<h4>Valor \$bin= 0b1100111 en decimal es  $bin</h4>";
echo "<h4>Valor \$bin= 0b1100111 en binario  es " . decbin($bin) . "</h4>";
echo "<h4>Valor \$bin= 0b1100111 en octal  es " . decoct($bin) . "</h4>";
echo "<h4>Valor \$bin= 0b1100111 en hexadecimal  es " . dechex($bin) . "</h4>";
echo "<h2>Mostramos el valor de \$hex = 0447 en los diferentes sistemas numéricos</h2>";
echo "<h4>Valor \$oct = 0447 en decimal es  $oct</h4>";
echo "<h4>Valor \$oct = 0447; en binario  es " . decbin($oct) . "</h4>";
echo "<h4>Valor \$oct = 0447; en octal  es " . decoct($oct) . "</h4>";
echo "<h4>Valor \$oct = 0447; en hexadecimal  es " . dechex($oct) . "</h4>";

echo "<h2>Mostramos el valor de \$hex = 0xFFA1 en los diferentes sistemas numéricos</h2>";
echo "<h4>Valor \$hex = 0xFFA1 en decimal es  $hex</h4>";
echo "<h4>Valor \$hex = 0xFFA1 en binario  es " . decbin($hex) . "</h4>";
echo "<h4>Valor \$hex = 0xFFA1 en octal  es " . decoct($hex) . "</h4>";
echo "<h4>Valor \$hex = 0xFFA1 en hexadecimal  es " . dechex($hex) . "</h4>";

?>


</body>
</html>
