<?php
/**
 * Created by PhpStorm.
 * User: manuel
 * Date: 22/11/18
 * Time: 19:14
 */


//funcion para borrar todos los ficheros del día anterior
//Importante para que no se acumulen muchos en el directorio
//Esto no se pide en el enuniciado de este ejercicio
function limpia_directorio(){
    //Borra todos los ficheros del día anterior
    $ficheros = scandir("./ficheros");
    foreach ($ficheros as $fichero){
        $t= filemtime($fichero);
        if ((time()-$t)<3600*24)
            unlink($fichero);
    }
}
limpia_directorio();


$msj = null;
if (isset($_POST['submit'])) {
    //Leemos los datos del formulario
    $nombre_file = $_POST['fichero'];
    $modo = $_POST['modo'];
    //Abrimos el fichero en un directorio concreto
    $file = fopen("./ficheros/".$nombre_file, $modo);
    $contenido = $_POST['contenido'];
    $rtdo = fwrite($file, $contenido);
    if ($rtdo)
        $msj = "Se han escrito $rtdo bytes en $nombre_file";
    else
        $msj = "No se ha podido escribir en $nombre_file, quizás permisos ????";
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo.css" type="text/css">
    <title>Document</title>
</head>
<body>
<fieldset>
    <legend>Escribir en fichero</legend>
    <form action="index.php" method="post">
<!-- Mostramos el mensaje -->
        <h2><?php echo($msj ?? "Escritura de ficheros"); ?></h2>
        <input style="float:right" type="submit" value="guardar" name="submit">
        <label for="fichero">Nombre del fichero
        </label>
        <br />
        
        <input type="text" name="fichero" id="fichero"><br>
                <label for="contendio">
            Contenido del fichero</label><br/>
        <textarea name="contenido" id="contenido" cols="30" rows="10">
       </textarea>
            <div style="float:right">
                <label for="modo">Especifica el modo</label>
                <br>
                <input type="radio" name="modo" value="w" id="modo"> Escritura<br/>
                <input type="radio" name="modo" value="a" id="modo"> Añadir<br/>
            </div>
    </form>
</fieldset>
</body>
</html>