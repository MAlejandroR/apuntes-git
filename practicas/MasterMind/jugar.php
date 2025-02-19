<!--
RF1 Mostramos la pantalla según estilo (Opciones, Información, Jugada)
RF1.1 Mostrar opciones en Opciones
RF1.2 Mostrar menú de jugada
RF1.3 Mostrar información jugada
RF1 Generamos una clave y la guardamos en sesión  (usa un var_dump para verificar su funcionamiento )
RF2 Botón de reiniciar la clave (guardándola en sesión) (usa un var_dump para verificar su funcionamiento)
RF3 Leer jugada
RF4 evaluar jugada y obtener resultado (posiciones y colores=
RF6 Mostrar / ocular clave
RF7 Mostrar Jugadas
RF7.1 Mostrar Jugada actual
RF7.2 Mostrar Jugadas anteriores ordenadas


-->

<?php
require "funciones.php";
ini_set("display_errors", true);
error_reporting(E_ALL);
session_start();


const COLORES = ['Azul', 'Rojo', 'Naranja',
    'Verde', 'Violeta', 'Amarillo',
    'Marron', 'Rosa'];


if (isset($_SESSION['clave']))
    $clave = $_SESSION['clave'];
else {
    $clave = generar_clave();
    $_SESSION['clave'] = $clave;
}

$textoBotonMostrarOcultarClave = "Mostrar Clave";
$mensajeJugar = "Selecciona 4 colores para jugar";


//$msj = "<h3 class=titulo1>Sección de información varia</h3>";
$opcion = $_POST['submit'] ?? null;

switch ($opcion) {
    case "Resetear la Clave":
        $msj = "La Clave ha sido reiniciada";
        session_destroy();
        header("Location:jugar.php?msj=$msj");
        exit;
    case "Jugar":
        //Leo la jugada
        $jugada = $_POST['combinacion'] ?? null;

        //Valido la jugada
        $jugadaValida = valida_jugada($jugada);
        if ($jugadaValida !== true) {
            $mensajeJugar = $jugadaValida['mensajeJugar'];
            $msj = $jugadaValida['msj'];
            break;
        }


        //Realizo la comparación y obtengo mensajes de información
        $mensajeJugar = "Jugada realizada, vuelve a seleccionar para jugar";
        $resultado = comparaJugada($jugada, $clave);

        //Anoto la jugada en el array de sesión
        $_SESSION['jugadas'][]['jugada'] = $jugada;
        $posicionActual = array_key_last($_SESSION['jugadas']);

        $_SESSION['jugadas'][$posicionActual]['resultado'] = $resultado;

        //Obtengo información de jugadas anteriores
        $msj = obtener_jugadas();
        $pos = $resultado['posiciones'];
        if ((sizeof($_SESSION['jugadas']) >= 14) || ($pos === 4)) {
            header("Location:finJuego.php?pos=$pos");
            exit();
        }
        break;

    case "Mostrar Clave":
        $textoBotonMostrarOcultarClave = "Ocultar Clave";
        $msj = "<h1>Clave Actual</h1>";
        $msj .= mostrar_clave($clave);
        break;
    case "Ocultar Clave":
        $textoBotonMostrarOcultarClave = "Mostrar Clave";
        $msj = obtener_jugadas();
        break;
    default:
        $msj = $_GET['msj'] ?? "Sin datos que mostrar";

}


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilo.css" type="text/css">
    <script>
        function cambia_color(numero) {
            color = document.getElementById("combinacion" + numero).value;
            elemento = document.getElementById("combinacion" + numero);
            elemento.className = color;
        }
    </script>
</head>
<body>
<div class="contenedorJugar">
    <div class="opciones">
        <h2>OPCIONES</h2>
        <fieldset>
            <legend>Acciones posibles</legend>
            <form action="jugar.php" method="POST">
                <input type="submit" value="<?= $textoBotonMostrarOcultarClave ?>" name="submit">
                <input type="submit" value="Resetear la Clave" name="submit">
            </form>
        </fieldset>
        <fieldset>
            <legend>Menú jugar</legend>
            <form action="jugar.php" method="POST">
                <div class="grupo_select">
                    <h3> <?= "$mensajeJugar" ?></h3>
                    <?= mostrar_formulario_jugar() ?>
                </div>
                <input type="submit" value="Jugar" name="submit">
            </form>
        </fieldset>


    </div>

    <fieldset class="informacion">
        <h2>INFORMACIÓN</h2>
        <fieldset>
            <legend>Sección de información</legend>
            <h3><?= $msj ?></h3>
        </fieldset>
    </fieldset>
</div>
</body>

</body>
</html>



