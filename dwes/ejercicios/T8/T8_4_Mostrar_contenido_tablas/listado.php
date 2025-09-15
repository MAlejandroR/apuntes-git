<?php

session_start();
spl_autoload_register(function ($clase){
    require "$clase.php";
});
//Obtenemos la conexión   de la sesión
$conexion  = $_SESSION['conexion'];

//Obtenemos la base de datos
$base_datos = $_POST['submit'] ?? $_SESSION['conexion']['bd'];


$bd = new BD($conexion);
//Si ha habido error en la conexión, vamos al index, informando de él
if ($bd->get_error()!=null) {
    $error=$bd->get_error();
    header("Location:index.php_?error=$error");
}

//Obtenemos la tabla y su contenido
$tabla = $_POST['tabla'];

$contenido = $bd->consultar_tabla($tabla);
$campos = $bd->obtener_campos($tabla);

$html_contenido=new Tabla($campos, $contenido);

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
<fieldset>
    <form action="tablas.php" method="POST">
        <legend>Contenido de la tabla <?=$tabla?></legend>
       <?=$html_contenido?>
        <hr />
        <input type="hidden" value="<?=$tabla?>" name="tabla">
        <input type="submit" value="Volver">

    </form>
</fieldset>

</body>
</html>

