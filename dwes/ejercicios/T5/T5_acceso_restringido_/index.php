<?php

//limpiamos completamente el array superglobal
?>
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
        <link rel="stylesheet" href="estilo.css" type="text/css">
    </head>
    <body>

        <div id="login">
            <fieldset>
                <legend>
                   Acceso restringido</legend>
                <ol>
                    <li><a href="./general/index.php">Acceso general sin restrincción</a></li>
                    <li><a href="./grupo/index.php">Acceso a los usuario pertenecientes al grupo familia</a></li>
                    <li><a href="./restringido/index.php">Acceso restringido a los usuarios registrados</a></li>
                    <li><a href="./sara/index.php">Acceso solo permitido al usuario sara</a></li>
                    <li><a href="./nobody/index.php">Eliminar credenciales</a></li>
                    <li><a href="./contenido.php" target="_blank">Ver contenido</a></li>
                </ol>
            </fieldset>
        </div>

    </body>
</html>
