<?php

session_start();
spl_autoload_register(function ($clase){
    require "$clase.php";
});


//Obtenemos la base de datos
$base_datos = $_POST['submit'] ?? $_SESSION['conexion']['bd'];
$_SESSION['conexion']['bd']=$base_datos;
//Obtenemos la conexión   de la sesión
$conexion  = $_SESSION['conexion'];

$bd = new BD($conexion);

//Si ha habido error en la conexión, vamos al index, informando de él
if ($bd->get_error()!=null)
    header ("Location:index.php_?error=$bd->get_error()");

//Seleccionamos la base de datos que hemos especificado
$bd->seleccionar_bd($base_datos);




//Establecemos la consulta
$consulta = "show tables";
$listado_tablas= $bd->consultar($consulta);
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
    <form action="listado.php" method="POST">
        <legend>Listado de tablas de la base de datos <?=$base_datos?></legend>
        <?php foreach ($listado_tablas as $num=>$tabla) {
            echo "<input type=submit value='$tabla'' name=tabla  />";
            //Para que no se acumulen muchos inputs en la
            //misma línea (como  mucho 5)
            if ($num % 5 == 0 && $num>0)
                echo "<br />";
        }
        ?>
        <hr />

    </form>
    
<form action="base_datos.php">
    <input type="submit" value="Volver">
</form>
</fieldset>




</body>
</html>
