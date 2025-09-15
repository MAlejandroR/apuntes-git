<?php
session_start();

//Leemos los accesos
$acceso = $_SESSION['accesos'];

//Leemos el nombre con el que se ha accedido
$nombre = $_SESSION['nombre'];


if (!isset($nombre)) {
   // echo "<a href='index.php_'>Debes de registrarte para acceder aquí</a>";

} else {
    //reiniciamos los accesos si no se quedaría en sesión.
    $_SESSION['accesos'] = 0;

    switch ($_POST['enviar']) {
        case "Borrar sesión":
            session_destroy();
            header("Location: http://manuel.infenlaces.com/dwes/acceso_usuario_pass/index.php");
            exit();
            break;
        case "Navegar en el sitio":
            header("Location: http://manuel.infenlaces.com/dwes/acceso_usuario_pass/navegando.php_?nombre=$nombre");
            exit();
    }
//OJO no el terminado el else. todo el html que viene ahora estaría en el else
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilo.css" type="text/css">
    <title>Document</title>
</head>
<body>
<h1>Wellcome this webside <?php echo $nombre ?>. Has realizado <?php echo $_GET['acceso'] ?> intentos para
    acceder </h1>
<fieldset style="margin-top:90px">
    <form action="sitio.php" method="POST">
        <legend>Salir</legend>
        <input type="submit" value="Borrar sesión" name="enviar">
        <input type="submit" value="Navegar en el sitio" name="enviar">
    </form>
</fieldset>

</body>
</html>
<?php }//End del else ?>