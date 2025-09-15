<?php
//Lo primero iniciamos sesión
session_start();

//Leemos valores de variable de sesión si existe
//En cualquier caso la actualizamos
if (!isset ($_SESSION['accesos'])) {
    $msj = "<h2> Primer acceso a la página</h2>";
    $_SESSION['accesos'] = 1;
} else {
    $_SESSION['accesos']++;
    $msj = "<h2> Has accedido a la página " . $_SESSION['accesos'] . "  veces </h2>";
}

//Si hemos presionado borrar sesión la destruimos
if (isset($_POST['borrar_sesion'])) {
    session_destroy();
    $msj = "<h2>Sesión eliminada </h2>";
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="estilo.css" type="text/css">
</head>
<body>
<div id="msj"><?php echo $msj ?> </div>
<div id="login">
    <fieldset>
        <legend>
            Acceso a la página
        </legend>
        <form action="index.php" method="post">
            <input type="submit" value="acceder" name="acceder">
            <input type="submit" value="Eliminar sesión" name="borrar_sesion">

        </form>
    </fieldset>
</div>
</body>
</html>
