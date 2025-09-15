<?php
$intentos = $_GET['intentos'] ?? 10;

$seleccion_10 = null;
$seleccion_15 = null;
$seleccion_20 = null;

switch ($intentos) {
    case 10:
        $seleccion_10 = "checked";
        break;
    case 15:
        $seleccion_15 = "checked";
        break;
    case 20:
        $seleccion_20 = "checked";
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
    <title>Práctica 3 JUEGO DE ADIVINAR UN NÚMERO index</title>
    <link rel="styleseet" href="style.css" type="text/css">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="hero min-h-screen bg-base-200">
    <div class="hero-content text-center">
        <div class="max-w-md ">
            <h1 class="text-5xl font-bold">Juego de Adivinar un número</h1>
            <p class="py-6">Selecciona un intervalo del menú:</p>
            <form action="jugar.php" method="POST">
                <fieldset class="border-2 border-red-800 m-5 p-5 rounded">
                    <input type="radio" name="intentos" value="10" <?= $seleccion_10 ?> checked>1-1.024(2<sup>10</sup>) - 10
                    intentos<br>
                    <input type="radio" name="intentos" value="15" <?= $seleccion_15 ?> >1-65.536(2<sup>15</sup>) - 15
                    intentos<br>
                    <input type="radio" name="intentos" value="20" <?= $seleccion_20 ?> >1-1.048.576(2<sup>20</sup>) - 20
                    intentos<br>
                    <input type="submit" value="Empezar" class="btn btn-primary" name="submit">

                </fieldset>
            </form>
        </div>
    </div>
</div>
</body>
</html>
