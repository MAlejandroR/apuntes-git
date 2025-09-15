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
<h1>Mostrar títulos en diferente tamaño h1.. h6, y color</h1>
<h3>Recarga la página con F5, para volver a verla</h3>
<hr/>
<?php
//generamos valores aleatorios
$x = rand(1,6); //Para el título hx
$R=rand(0,255); //Color Rojo
$G=rand(0,255); //Color verde
$B=rand(0,255); //Color azul

//Cambiamos los valores a hexadecimal
$R=dechex($R);
$G=dechex($G);
$B=dechex($B);

//Mostramos el texto que pretendemos
// El tipo de título (h1, h2, .. h6 y el color del estilo
//Será en función de los valores de las variables
echo "<h$x style=color:#$R$G$B> Esto es el título en tamaño h$x y color $R$G$B</h$x>";
?>


</body>
</html>
