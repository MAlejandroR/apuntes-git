<?php

$jugada = filter_input(INPUT_GET, jugada);
$jugadas_restantes = filter_input(INPUT_GET, jugadas_restantes);
$intentos = filter_input(INPUT_GET, intentos);
$resultado = filter_input(INPUT_GET, resultado);

if($resultado == "=") {
    $msj = "<h2>He adivinado el número en $jugada jugadas<br>Me han sobrado $jugadas_restantes intentos</h2>";
}
if($jugada > $intentos) {

    $msj = "<h2>No he adivinado el número en $intentos intentos<br>¿No habrás hecho trampa?</h2>";
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Práctica 3 JUEGO DE ADIVINAR UN NÚMERO fin</title>
    <link rel="stylesheet" href="estilo.css" type="text/css">
</head>
<body>
<fieldset>
    <legend>FIN DEL JUEGO</legend>
    <form action="index.php" method="POST">
       <?php echo "<h2>$msj</h2>"; ?>
       <input type="submit" value="Volver al inicio" name=""submit">
    </form>
</fieldset>
</body>
</html>
