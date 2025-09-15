<?php
//Arrancamos
session_start();
spl_autoload_register(function ($clase){
    require "$clase.php";
});

//Leemos los datos de conexión y la base de datos (si existe) de la variable de sesión
$conexion  = $_POST['conexion']??$_SESSION['conexion'];
$_SESSION['conexion']=$conexion;


$bd = new BD($conexion);
//Si ha habido error en la conexión, vamos al index, informando de él
if ($bd->get_error()!=null) {
    $error=$bd->get_error();
    header("Location:index.php_?error=$error");
}

$consulta = "show databases";
$listado_bd= $bd->consultar($consulta);
$bd->cerrar();



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
    <legend>Listado de bases de datos</legend>
    <?php foreach ($listado_bd as $bd)
        echo "<input type=submit value=$bd name=submit />";
?>
</form>
    </fieldset>
</form>
<form action="index.php">
    <input type="submit" value="Volver">
</form>
</body>
</html>
