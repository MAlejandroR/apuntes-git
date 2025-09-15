<?php
switch ($_POST['enviar']) {
    case 'jugar':
        $numero_adivinar = filter_input(INPUT_POST, 'numAdivinar');
        $intentos = filter_input(INPUT_POST, 'intentos');
        $numero = filter_input(INPUT_POST, 'numero');
        $intentos++;
        $msj = valida($numero_adivinar, $numero);
        if ($msj === "FIN")
            terminar(true);
        if ($intentos === 10)
            terminar(false);
        $msj.="<br />Llevas $intentos intentos restan " . (10 - $intentos);
        $reiniciar = "";
        break;
    case 'volver':
        header("Location:index.php_");
        exit();

    case 'reiniciar':
        $numero_adivinar = rand(0, 1024);
        $msj = "Volvemos a empezar el juego";
        $intentos = 0;
        $reiniciar = "disabled";
        break;

    default: //vengo del index
        $numero_adivinar = rand(0, 1024);
        $msj = "Vamos a empezar a jugar, inserta un número";
        $reiniciar = "disabled";
        $intentos = 0;
}

function valida($numero_adivinar, $numero) {
    switch (true) {
        case ($numero > $numero_adivinar):
            $msj = "El número $numero es MAYOR que el número buscado";

            break;
        case ($numero < $numero_adivinar):
            $msj = "El número $numero es MENOR que el número buscado";
            break;
        case ($numero === $numero_adivinar):
            $msj = "FIN";
            break;
    }
    return $msj;
}

function terminar($estado) {
    global $msj, $numero, $intentos, $numero_adivinar, $reiniciar;
    if ($estado === true) {
        $msj = "FELICIDADES, $numero ES EL NÚMERO BUSCADO<br />";
        $msj.="Lo has acertado en $intentos intentos";
        $reiniciar = disabled;
        $intentos = 0;
    } else {
        $msj = "HAS TERMINADO TUS INTENTOS<br />";
        $msj.="El número buscado es $numero_adivinar<br />";
        $msj.="Buena suerte para la próxima vez";

        $reiniciar = disabled;
        $intentos = 0;
    }
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta char3="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="width: 60%;float:left;margin-left: 20%; ">

<h3><?php echo $msj ?></h3>
<fieldset style="width:30%;background:bisque ">
    <legend>Empieza el juego</legend>
    <form action="jugar.php" method="POST" >
        Escribe un número <input type="text" name="numero" id="">
        <hr />
        <input type="submit" value="jugar" name="enviar" >
        <input type="submit" value="reiniciar" name="enviar" <?php echo $reiniciar ?> >
        <input type="submit" value="volver" name="enviar"  >
        <input type="hidden" value="<?php echo $intentos ?>" name="intentos">
        <input type="hidden" value="<?php echo $numero_adivinar ?>" name="numAdivinar">
    </form>
</fieldset>

</body>
</html>
