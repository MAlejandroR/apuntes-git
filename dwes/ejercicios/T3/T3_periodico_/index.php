<?php
//Leemos cookie en caso de que exista
$seccion = $_COOKIE['seccion'];
//seccion puede tomar los siguientes valores
//Intencionadamente están sin acento
/*
 * economia
 * politica
 * deporte
 * todas //en este caso queremos borrar la cookie
 * null
 */

/* Si hemos presionado el submit
 * es que queremos crear la cookie
 */

if (isset($_POST['submit'])) {
    // valor que queremos escribir en la cookie
    $seccion = filter_input(INPUT_POST, "seccion");

    //Si selecciono todo es que  queremos borrar la cookie
    $tiempo = ($seccion == 'todas') ? -3600 : 3600;
    $seccion = ($seccion == 'todas') ? null : $seccion;

    //Escribo o borro la cookie
    setcookie("seccion", $seccion, time() + $tiempo);
}
?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="estilo.css"/>
    </head>
    <body>
        <fieldset class="privado">
            <legend>Selecciona noticia</legend>
            <form action="index.php" method="POST">
                <input type="radio" name="seccion" value="politica">Política
                <br>
                <input type="radio" name="seccion" value="deporte">Deporte
                <br>
                <input type="radio" name="seccion" value="economia">Economía
                <br>
                <input type="radio" name="seccion" value="todas">Todas y borrar preferencia
                <br>
                <input type="submit" value="preferencia" name="submit">
            </form>
        </fieldset>
        <br>
        <?php
        /* Si solo tengo esta sección o no tengo ninguna
         * en caso de no tener ninguna es como si tuviera todas
         * Esto lo repetiremos para todos los casos
         */

        if (($seccion == "deporte") || is_null($seccion)):
            ?>
            <div id="secciones">
                <h1>Noticias de Deportes</h1>
                <pre>
                Victoria cómoda, sin forzar,
                de los Thunder en Cleveland.
                El equipo de Álex Abrines,
                que terminó con 9 puntos en 26 minutos,
                jugó sin Westbrook, lesionado en un tobillo,
                pero poco importó. Su sustituto natural,
                Dennis Schröder, lo hizo de lujo: 28 puntos,
                con 11/19 en tiros de campo.
                </pre>
            </div>
            <br />
            <?php
        endif;
        if (($seccion == "politica") || is_null($seccion)):
            ?>


            <div id="secciones">
                <h1>Noticias de Política</h1>
                <pre>
                La ex secretaria general de los populares
                se marcha asegurando que “nunca” ha mentido
                dos días después de dejar su lugar en la Ejecutiva
                tras las filtraciones de sus audios con el excomisario
                Villarejo.
                </pre>
            </div>
            <br />


            <?php
        endif;
        if (($seccion == "economia") || is_null($seccion)):
            ?>

            <div id="secciones">
                <h1>Noticias de Economía</h1>
                <pre>
                La producción industrial se ha reducid un 2,8%
                en septiembre en tasa interanual,
                frente al incremento del 1,1% marcado el mes anterior.
                Así lo ha hecho público hoy el Instituto Nacional de Estadística.
                La caída de la producción industrial deriva del retroceso anual
                registrado en todos los destinos económicos.
                </pre>
            </div>

        <?php endif; ?>
    </body>
</html>
