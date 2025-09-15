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
                <h1>Has accedido a la página de acceso restrigido al usuario sara</h1>
                <h2>Si has accedido aquí es porque te has identificado como sara</h2>
                <h3>Te has identificado con las siguientes credenciales</h3>
                <h4>Usuario :<?php echo $_SERVER['PHP_AUTH_USER'] ?></h4>
                <h4>Password :<?php echo $_SERVER['PHP_AUTH_PW'] ?></h4>
                <a href="./../index.php" style="color:red; font-size:2em">Volver</a>

            </fieldset>
        </div>

    </body>
</html>
