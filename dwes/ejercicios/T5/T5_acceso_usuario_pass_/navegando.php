<?php
session_start();


if ($_POST['enviar']) {
    session_destroy();
    header("Location:index.php_");
    exit();
}

//Leemos el nombre con el que se ha accedido
$nombre = $_SESSION['nombre'];

if (!isset($nombre)) {
echo "<a href='index.php_'>Debes de registrarte para acceder aquí</a>";

} else {
//reiniciamos los accesos si no se quedaría en sesión.

//OJO no el terminado el else. todo el html que viene ahora estaría en el else

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h1>Wellcome this webside <?php $nombre ?> </h1>
<h2>Ahora estás navegando dentro del sitio y registrado</h2>
<fieldset>
    <form action="navegando.php">
        <legend>Salir</legend>
        <input type="submit" value="Borrar sesión" name="enviar"></form>
</fieldset>

</body>
</html>
<?php }//End del else ?>