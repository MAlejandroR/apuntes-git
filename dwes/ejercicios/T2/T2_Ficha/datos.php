<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//Primero leemos las variables



$nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
$apellidos = filter_input(INPUT_POST, 'apellido', FILTER_SANITIZE_STRING);
$edad = filter_input(INPUT_POST, 'edad', FILTER_VALIDATE_INT);
$direccion = filter_input(INPUT_POST, 'direccion', FILTER_SANITIZE_STRING);
$fNac = filter_input(INPUT_POST, 'fNac', FILTER_SANITIZE_STRING);
$idiomas = filter_input(INPUT_POST, "idiomas", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
$genero = filter_input(INPUT_POST, 'genero');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$estudios = filter_input(INPUT_POST, 'estudios');
//visualizo un array en un string para verlo
//Trabajaremos más adelanto los string
$mis_idiomas = print_r($idiomas, true);



//Mostramos los valores como una ficha

$texto = <<<FIN
<pre>
        Nombre   <strong>$nombre</strong>
        Apellido <strong>$apellidos</strong>
        Edad  <strong>$edad</strong> años de edad
        Dirección <strong>$direccion </strong>
        Fecha de nacimiento <strong>$fNac</strong>
        Sexo <strong>$genero</strong>
        Correo electrónico <strong>$email</strong>
        Estudios <strong>$estudios</strong>
        Idiomas <strong>$mis_idiomas</strong>

</pre>

FIN;
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
        <h1>Datos personales leídos</h1>
        <hr />
        <fieldset style="width: 40%">
            <legend>Datos personales</legend>
            <?php echo $texto ?>
        </fieldset>
    </body>
</html>