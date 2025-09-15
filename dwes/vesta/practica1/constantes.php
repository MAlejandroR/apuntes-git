<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/estilo.css" type="text/css">
    <title>Document</title>
</head>
<body>
<?php
header("refresh:2;url=http://localhost/practica1/index.php_");
?>
<div class="solucion">
    <h1>Constantes en PHP</h1>

    <?php

    define("EDAD1", 21);
    const EDAD2 = 21;

    $max=100;
    $resta_define = $max-EDAD1;
    $resta_const = $max-EDAD2;


    echo "<div class='parrafo'><div class='bold'>Constante declarada con Define &nbsp&nbsp</div><div class='margin20'>
    Tengo ".EDAD1." años (Constante declarada con <span class='variable'>define</span>)</div></div>";

    echo "<div class='parrafo'><div class='bold'>Constante declarada con const&nbsp&nbsp</div><div class='margin20'>
    Tengo ".EDAD2." años (Constante declarada con <span class='variable'>const</span>)</div></div>";

    echo "<div class='parrafo'><div class='bold'>Operación con define&nbsp&nbsp</div><div class='margin20'>
    Para los ".$max.", me faltan ".$resta_define." años (Operación de constante con <span class='variable'>define</span>)</div></div>";

    echo "<div class='parrafo'><div class='bold'>Operación con const&nbsp&nbsp</div><div class='margin20'>
    Para los ".$max.", me faltan ".$resta_const." años (Operación de constante con <span class='variable'>const</span>)</div></div>";

    ?>
</div>
</body>
</html>