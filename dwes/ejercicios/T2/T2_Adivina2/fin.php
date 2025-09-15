<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$intentos = filter_input(INPUT_GET, 'intentos');
$jugada = filter_input(INPUT_GET, 'jugada');
$num = filter_input(INPUT_GET, 'num');
if ($jugada == 0)
    $msj = "Felicidades lo has acertado en $intentos";
else
    $msj = "Has fallado y deberías de haberlo adividado ";

$msj .= " El número era $num"
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
        <h2><?= $msj ?></h2>

    </body>
</html>