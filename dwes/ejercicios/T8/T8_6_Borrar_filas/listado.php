<?php

$borrar = false;
session_start();
spl_autoload_register(function ($clase) {
    require "$clase.php";
});
error_reporting(E_ALL);
ini_set('display_errors', '1');
//Obtenemos el nombre de la tabla
$tabla = $_POST['tabla'] ?? $_GET['tabla'];

$info = $_GET['info'] ?? null;
$conexion = $_SESSION['conexion'];

//Obtenemos la base de datos
$base_datos = $_POST['submit'] ?? $_SESSION['conexion']['bd'];

$bd = new BD($conexion);


//Obtenemos la conexión   de la sesión
if (isset($_POST['submit'])) {
    switch ($_POST['submit']) {
        case 'Volver':
            header("Location:tablas.php_");
            break;
        case 'Insertar':
            header("Location:insertar.php_?tabla=$tabla");
            break;
        case 'Borrar':
            $campos = $_POST['campos'];
            if (isset ($campos['submit']))
                unset ($campos['submit']);
//            var_dump ($campos);

            $bd->sentencia($tabla, $campos,"delete");
            break;
    }
}
//Si ha habido error en la conexión, vamos al index, informando de él
if ($bd->get_error() != null) {
    $error = $bd->get_error();
    header("Location:index.php_?error=$error");
}

$contenido = $bd->consultar_tabla($tabla);
//var_dump ($contenido);
$campos = $bd->obtener_campos($tabla);

$html_contenido = new Tabla($campos, $contenido, $tabla);



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilo_1.css">
    <title>Document</title>
</head>
<body>
<h3><?= $info ?></h3>
<fieldset>

    <legend>Contenido de la tabla <?= $tabla ?></legend>
    <?= $html_contenido ?>
    <hr/>
    <form action="listado.php" method="POST">
        <input type="hidden" value="<?= $tabla ?>" name="tabla">
        <input type="submit" value="Volver" name="submit">
        <input type="submit" value="Insertar" name="submit">
    </form>


</fieldset>

</body>
</html>

