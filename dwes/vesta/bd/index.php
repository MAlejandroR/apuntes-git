<?php


if (isset($_POST['submit'])) {
    //Cargo los ficheros que vaya a utilizar
    require "incializa.php";
    //Me conecto a la base de datos
    $bd = new DB();

    $usuario = htmlspecialchars($_POST['usuario']);
    $password = htmlspecialchars($_POST['password']);

    if ($bd->valida_usuario($usuario, $password)) {
        $_SESSION['usuario'] = $usuario;
        header("Location:sitio.php_");
        exit();
    } else {
        $msj = "Datos de contexión incorrectos";
    }

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
<fieldset>
    <legend>Datos de conexión</legend>
    <h4 class="error"><?= $msj ?? null ?></h4>
    <form action="index.php" method="POST">
        <div class="fila">
            <label  for="usuario"> Usuario </label><input type="text" name="usuario" id="usuario">
        </div>
        <div class="fila">
            <label for="password"> Password</label> <input type="text" name="password" id="password">
        </div>
        <hr>
        <input class=submit type="submit" value="Acceder" name="submit">
    </form>
</fieldset>

</body>
</html>


