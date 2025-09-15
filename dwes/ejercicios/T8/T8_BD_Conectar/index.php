<?php
spl_autoload_register(function ($clase) {
    require_once("$clase.php");
});

//Establecemos los valores de conexión
$user = "root";
$pass = "root";
$host = "172.17.0.2";


//Nos conectamos a la base de datos
$conexion = new mysqli($host, $user, $pass);
if ($conexion->connect_errno !== 0)
    die("No se ha podido conectar. error: <h2> " . $conexion->connect_error . "</h2>");
//Mostramos información

$msj .= "<h3>Información de la conexión </h3>";
$msj .= "<ol>\n"; //Preparamos un listado
    $msj .= "<li>Información de cliente : $conexion->client_info</li>\n";
    $msj .= "<li>Información de versión de cliente : $conexion->client_version</li>\n";
    $msj .= "<li>Información de host : $conexion->host_info</li>\n";
    $msj .= "<li>Información de conexión: $conexion->info</li>\n";
    $msj .= "<li>Información de versión del protocolo: $conexion->protocol_version</li>\n";
    $msj .= "<li>Información de del servidor : $conexion->server_info</li>\n";
    $msj .= "<li>Información de versión del servidor : $conexion->server_version</li>\n";

$msj .= "</ol>\n"; //Preparamos un listado
$msj .= "<hr />\n"; //Preparamos un listado

//Establecemos la sentencia, observa que también adminte sentencias del gestor, no propias de sql

$sentencia = "show databases";


$rtdo = $conexion->query($sentencia);
if ($rtdo->num_rows > 1) { //Si ha devuelto alguna fila las muestro
    //Realizo un while

    $msj .= "<h3>Listado de bases de datos disponibles</h3>\n"; //Preparamos un listado
    $msj .= "<ol>\n"; //Preparamos un listado
    while ($f = $rtdo->fetch_row()) {
        $msj .= "<li>{$f[0]}</li>\n";
    }
    $msj .= "</ol>\n";
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Conexión a bd</title>
</head>
<body>
<h2>Se ha conectado al servidor de bases de datos <?= $host ?>  </h2>
<?= $msj ?>

</body>
</html>