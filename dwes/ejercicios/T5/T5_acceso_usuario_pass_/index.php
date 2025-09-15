<?php
session_start();
if ($_POST['submit']=='Borrar sesión'){
    session_destroy();
    session_start();
}

if ($_SESSION['acceso']>3){
    header("Location:bloqueo.php_");
    exit();
}

if ($_POST['enviar']) {
    $nombre = $_POST['nombre'];
    $pass = $_POST['pass'];
    $acceso = $_SESSION['acceso'];
    $acceso++;
    $_SESSION['acceso']=$acceso;
    if (($nombre == $pass)and ($nombre!="")) {
        $_SESSION['nombre']=$nombre;
        header("Location:sitio.php_");
        exit();
    } else {
        if ($acceso < 3) {
            $msj = "Este es tu $acceso acceso, te quedan " . (3 - $acceso) . " accesos";
        } else {
            header("Location:bloqueo.php_?nombre=$nombre&pass=$pass");
            exit();
        }

    }
}//eND IF ENVIAR
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
<div id="msj"><?php echo $msj ?> </div>
<div id="login">
    <fieldset>
        <div class="msj"><? echo $msj ?> </div>
        <legend>
            Acceso a la página
        </legend>
        <form action="index.php" method="post">
            Nombre<input type="text" name="nombre"><br/>
            Password <input type="text" name="pass"><br/>
            <input type="submit" value="acceder" name="enviar">
            <input type="submit" value="Borrar sesión" name="enviar">
        </form>
    </fieldset>
</div>

</body>
</html>
