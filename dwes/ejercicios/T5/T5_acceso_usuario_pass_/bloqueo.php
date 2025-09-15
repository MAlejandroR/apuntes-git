<?php


if (isset($_POST['enviar'])) {
    echo "hola";
    session_start();
    var_dump($_SESSIONQ);
    session_destroy();
    header("Location:http://manuel.infenlaces.com/dwes/acceso_usuario_pass/index.php_");
    exit();
}
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
<h1>Está bloqueado en esta sesión. <BR/>Deberás de cerrar el navegador y volver a inciar la sesión </h1>

<?php if ($_GET['nombre'] || $_GET['pass']): ?>
    <h2>TE has bloqueado con usuario <?php echo $_GET['nombre'] ?> y password <?php echo $_GET['pass'] ?> </h2>
<?php endif; ?>

<fieldset style="width: 400px; margin-top:150px">
    <form action="bloqueo.php" method="POST">
        <legend>También puedes cerrar la sesión aquí</legend>
        <input type="submit" value="Borrar sesion" name="enviar"/ >
    </form>
</fieldset>

</body>
</html>