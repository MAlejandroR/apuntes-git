<?php


require "incializa.php";

$html_header = Interfaz::html_header();

$opcion = $_POST['submit'] ?? null;
$db = new DB(); //Conecto a la base de datos

switch ($opcion) {
    case "Familias":
        $_SESSION['tabla'] = "familia";
        $listado = $db->obtener_familias();
        break;
    case "Productos":
        $_SESSION['tabla'] = "producto";
        $listado = $db->obtener_productos();

    case "Tiendas":
        $_SESSION['tabla'] = "tienda";
        $listado = $db->obtener_tiendas();

    default:
        header("Location:sitio.php_");
        exit;
}

$tabla = Interfaz::genera_tabla($listado, $_SESSION['tabla']);


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
<header>
    <?= $html_header ?>
</header>
<fieldset>
    <legend>Contenido de <?=$_SESSION['tabla']?></legend>

    <form action="tablas.php" method="POST">
        <input type="submit" value="Añadir fila" name="submit">

        <div class="fila">
            <?= $tabla ?>
        </div>

</fieldset>
</form>

</body>
</html>