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
    <link rel="styleseet" href="style.css" type="text/css">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script></head>
<body>

<div class="hero min-h-screen bg-base-200">
    <div class="hero-content text-center">
        <div class="max-w-md ">
            <h1 class="text-5xl font-bold">Empieza el juego</h1>
            <p class="py-6">Información y opciones del juego</p>
            <form action="jugar.php" method="POST">
                <div class ="bg-slate-300"	>
                    <h4>Jugada nº <?= $jugada ?></h4>
                    <br>
                <h2>¿ El n&uacutemero es <?= $num ?>?</h2>
                    <br>

                </div>



                <input type="hidden" value="<?= $intentos ?>" name="intentos">
                <input type="hidden" value="<?= $min ?>" name="min">
                <input type="hidden" value="<?= $max ?>" name="max">
                <input type="hidden" value="<?= $num ?>" name="num">
                <input type="hidden" value="<?= $jugada ?>" name="jugada">

                <fieldset id ="adivina">
                    <legend>El n&uacutemero a adivinar es</legend>

                    <input type="radio"  class="radio radio-primary" name="resultado" value=">">Mayor<br />
                    <input type="radio" class="radio radio-primary"  name="resultado" value="<">Menor<br />
                    <input type="radio"  class="radio radio-primary" name="resultado" value="=">Igual<br />
                </fieldset>
                <hr />
                <input type="submit" value="Jugar" name="submit">
                <input type="submit" value="Reiniciar" name="submit">
                <input type="submit" value="Volver" name="submit">
            </form>

        </div>
    </div>
</div>



</body>
</html>
