<?php

//Para trabajar con sesiones
spl_autoload_register(function ($class) {
    require_once "$class.php";
});
session_start();

switch ($_POST['submit']) {
    case "Agregar":
        $menu = isset($_SESSION['menu']) ? unserialize($_SESSION['menu']) : new Menu();
        $url = filter_input(INPUT_POST, 'url');
        $titulo = filter_input(INPUT_POST, 'titulo');
        $menu->cargarOpcion($url, $titulo);
        $_SESSION['menu'] = serialize($menu);
        break;
    case "Mostrar Vertical":
        header("Location:sitio.php_?modo=V");
        exit();

    case "Mostrar Horizontal":
        header("Location:sitio.php_?modo=H");
        exit();
    case "Empezar":
        session_destroy();
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo.css" type="text/css">
    <title>Crea Menu</title>

</head>
<fieldset>
    <legend>Configuración de página</legend>
    <form action="index.php" method="POST">
        <label for="titulo">
            Titulo
        </label>
        <input type="text" name="titulo" id="titulo">
        <br />
        <label for="url">

            Url de referencia
        </label>
        <input type="text" name="url" id="url">
        <BR/>
        <input type="submit" value="Empezar" name="submit">
        <input type="submit" value="Agregar" name="submit">
        <input type="submit" value="Mostrar Vertical" name="submit">
        <input type="submit" value="Mostrar Horizontal" name="submit">


    </form>
</fieldset>
<body>
