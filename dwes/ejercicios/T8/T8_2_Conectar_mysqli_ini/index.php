<?php
spl_autoload_register (function ($clase) {
    require_once ("$clase.php");
});
if (isset ($_POST['submit'])) {
    switch ($_POST['submit']){
        case "Conectar":
            $datos = $_POST['datos'];
            break;
        case "Conectar con parámetros de ini":
            $datos = parse_ini_file ("conexion.ini");
    }
//Obtengo los datos de conexión

//Nos conectamos a la base de datos

    $con = new BD($datos);
//Obtenemos los datos de conexión

    $datos = $con->estado_conexion();
    $inf_bd = (string)$con;
    $con->cerrar();
}else {
    $datos = "<h2>Inserte datos de conexión para conectar</h2>";
    $inf_bd ="Actualmente no está conectado a la bd";
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
<form action="index.php" method="post">
    <fieldset>
        <legend>Datos de conexión</legend>
        <label for="host"></label>Host
        <input type="text" name="datos[host]" id="host">
        <br/>
        <label for="user"></label>Usuario
        <input type="text" name="datos[user]" id="user">
        <br/>
        <label for="user"></label>Password
        <input type="text" name="datos[password]" id="bd">
        <br/>
        <label for="bd"></label>Base de datos
        <input type="text" name="datos[bd]" id="bd">
        <br/>
    </fieldset>
    <input type="submit" value="Conectar" name="submit">
    <input type="submit" value="Conectar con parámetros de ini" name="submit">
</form>
<?=$datos?>
<h2>Estado de la base de datos</h2>
<h3><?=$inf_bd?></h3>


</body>
</html>
