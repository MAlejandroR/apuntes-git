<?php
session_start ();
spl_autoload_register (function ($clase) {
    require "$clase.php";
});

//Obtenemos la talba
//aquí podríamos hacer un $_REQUEST ..
//puede que venga de listado.php_ (GET) o insertar.php_ (POST)
$tabla=$_GET['tabla'] ?? $_POST['tabla'];

//Si cancelar, vuelvo a listado.php_
if (isset($_POST['submit']))
    if ($_POST['submit'] == 'Cancelar') {
        header ("Location:listado.php_?tabla=$tabla");
        exit();
    }

//Conecto con GD
$conexion=$_SESSION['conexion'];
$bd=new BD($conexion);
//Si ha habido error en la conexión, vamos al index, informando de él
if ($bd->get_error () != null) {
    $error=$bd->get_error ();
    header ("Location:index.php_?error=$error");
}

//Si he presionado guardar inserto los valores y voy a listado.php_
if (isset($_POST['submit'])) {
    //Los inputs disabled no viajan con $_POST, por lo que lo tenemos todo preparado
    $campos=$_POST['campos'];
    $sentencia=$bd->insertar ($campos, $tabla);
    //Obtengo información de la última acción
    $accion=$bd->get_info();
    header ("Location:listado.php_?tabla=$tabla&info=$accion");
    exit();
}

//Leo los campos deshabilitando los autoincrement
$campos=$bd->obtener_campos_disable_autoincrement ($tabla);


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="estilo_1.css" type="text/css">
</head>
<body>
<fieldset>
    <legend>Insertar en la tabla <?= $tabla ?></legend>
    <form action="insertar.php" method="POST">
        <?php
        foreach($campos as $campo=>$enable){
            $disabled=null;
            $value="";
            if ($enable == 0) {
                $disabled="disabled";
                //Obtener el valor del siguiente autoincrement
                //Ojo es informativo....
                $value=$bd->selec_max ($campo, $tabla);
            }
            echo "$campo <input type=text name=campos[$campo] $disabled value=$value><br />";
        }
        ?>
        <input type="submit" value="Guardar" name="submit">
        <input type="submit" value="Cancelar" name="submit">
        <input type="hidden" name="tabla" value="<?= $tabla ?>">
    </form>
</fieldset>
</body>
</html>
