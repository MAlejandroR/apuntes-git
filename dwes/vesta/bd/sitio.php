<?php


require "incializa.php";

$html_header = Interfaz::html_header();

$opcion = $_POST['submit'] ?? null;
switch ($opcion) {
    case "Ver familias":
        $_SESSION['tabla'] = "familia";
        $db = new DB(); //Conecto a la base de datos
        $familias = $db->obtener_familias();
        break;
}


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
    <legend>Listado de tablas disponibles</legend>
    <form action="tablas.php" method="POST">
        <div class="fila">
            <input type="submit" name="submit" value="Familias">
            <input type="submit" name="submit" value="Productos">
            <input type="submit" name="submit" value="Tiendas">
        </div>
    </form>
</fieldset>


</body>
</html>