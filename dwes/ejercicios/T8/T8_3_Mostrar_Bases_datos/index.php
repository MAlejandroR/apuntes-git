<?php
spl_autoload_register(function ($clase) {
    require_once("$clase.php");
});

session_start();
$error = $_GET['error']??null;

//Borramos los datos de sesión si lo hemos selecionado
if (isset ($_POST['submit'])) {
    session_destroy();
    unset ($_SESSION);
}


?>

<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./estilo_1.css" type="text/css">
    <title>Conexión a bd</title>
</head>
<body>
<h2>Conexión a una base de datos</h2>
<form action="base_datos.php" method="post">
    <fieldset>
        <legend>Datos de conexión</legend>
        <label for="host"></label>Host
        <input type="text" name="conexion[host]" id="host" value="172.17.0.2">
        <br/>
        <label for="user"></label>Usuario
        <input type="text" name="conexion[user]" id="user" value="root">
        <br/>
        <label for="user"></label>Password
        <input type="text" name="conexion[password]" id="bd" value="root">
        <br/>
    </fieldset>
    <input type="submit" value="Conectar" name="submit">

</form>
<hr />
<form action="index.php" method="POST">
    <input type="submit" value="Borrar sesiones" name="submit">
</form>
<h2>Estado de la base de datos</h2>

<h3><?= $inf_bd ?></h3>
<h3><?= $error ?></h3>


</body>
</html>
