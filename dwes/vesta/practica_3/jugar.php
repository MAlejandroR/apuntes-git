<?php
// leer el número de intentos
// del index ó del hidden
$intentos = filter_input(INPUT_POST, 'intentos');
// leer el número de jugada
$jugada = $_POST['jugada'] ?? 0;
// leer la opción seleccionada
$opcion = $_POST['submit'] ?? null;

// routeo
switch($opcion) {
    case "Empezar": // inicializar los valores
        $min = 0;
        $max = pow(2, $intentos);
        $jugada = 1;
        break;
    case "Jugar": // recoger los valores
        $num = filter_input(INPUT_POST, 'num');// valor medio del máximo y el mínimo
        $min = filter_input(INPUT_POST, 'min');// valor mínimo del intervalo
        $max = filter_input(INPUT_POST, 'max');// valor máximo del intervalo
        $resultado = filter_input(INPUT_POST, 'resultado');
        $jugadas_restantes = $intentos - $jugada;

            switch ($resultado) {
                case '>':
                    $min = $num;
                    break;
                case '<':
                    $max = $num;
                    break;
                case '=':
                    header("Location:fin.php_?jugada=$jugada&jugadas_restantes=$jugadas_restantes&resultado=$resultado&intentos=$intentos");
                    exit();
            }
            // nuevo número a evaluar
            $jugada++;
        break;

    case "Reiniciar":
        $min = 1;
        $max = pow(2, $intentos);
        $num = ($min+$max)/2;
        $jugada = 0;
        break;

    case "Volver":// volver al index
         header("Location:index.php_?intentos=$intentos");
         exit();

    default:
        header("Location:index.php_");
        exit();
}
$num = ($min+$max)/2;
// si se sobrepasa el número de intentos, va al fin
if($jugada > $intentos) {
    header("Location:fin.php_?jugada=$jugada&jugadas_restantes=$jugadas_restantes&resultado=$resultado&intentos=$intentos");
    exit();
}

?>

<!doctype html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Práctica 3 JUEGO DE ADIVINAR UN NÚMERO jugar</title>
<link rel="stylesheet" href="estilo.css" type="text/css">
</head>
<body>
<fieldset class = "fondo">
    <legend>Empieza el juego</legend>
    <form action="jugar.php" method="POST">
       <h2>El n&uacutemero es <?= $num ?></h2>
       <h4>Jugada nº <?= $jugada ?></h4>

       <input type="hidden" value="<?= $intentos ?>" name="intentos">
       <input type="hidden" value="<?= $min ?>" name="min">
       <input type="hidden" value="<?= $max ?>" name="max">
       <input type="hidden" value="<?= $num ?>" name="num">
       <input type="hidden" value="<?= $jugada ?>" name="jugada">

    <fieldset id ="adivina">
        <legend>El n&uacutemero a adivinar es</legend>

        <input type="radio" name="resultado" value=">">Mayor<br />
        <input type="radio" name="resultado" value="<">Menor<br />
        <input type="radio" name="resultado" value="=">Igual<br />
    </fieldset>
    <hr />
    <input type="submit" value="Jugar" name="submit">
    <input type="submit" value="Reiniciar" name="submit">
    <input type="submit" value="Volver" name="submit">
    </form>
</fieldset>
</body>
</html>
