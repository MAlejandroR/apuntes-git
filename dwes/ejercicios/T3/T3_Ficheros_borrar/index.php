<?php
function borra_todos_ficheros(){
    $ficheros = scandir("./ficheros/");
    $n=0;
    foreach ($ficheros as $fichero) {
        if (!unlink("./ficheros/$fichero"))
            echo "No se ha podido borrar $fichero<br />";
        $n++;
    }
    return "Se han borrado <span class=resaltado>$n</span> ficheros";
}
function borra_fichero($fichero){
    if (unlink("./ficheros/$fichero"))
        $msj="El fichero <span class=resaltado>./ficheros/$fichero </span>se ha borrado";
    else
        $msj="No se ha podido borrar<span class=resaltado>./ficheros/$fichero </span>";
    return $msj;
}
function crea_ficheros(){
    for ($n=0; $n<20; $n++){
        $f= tempnam("./ficheros/","daws_$n"."_");
    }
    $c = count(scandir("./ficheros"));
    return "Se han creado 20 ficheros. En total hay <span class=resaltado>$c</span> ficheros en la carpeta ";
}
$msj=null;
switch ($_POST['submit']){

    case "borrar ficheros":
        $msj = borra_todos_ficheros();
        break;
    case "crear 20 ficheros":
        $msj = crea_ficheros();
        $ficheros = scandir ("./ficheros");
        break;
    case "elimina fichero seleccionado":
        $msj=borra_fichero($_POST['fichero']);
        break;
}
$ficheros = scandir("./ficheros/");

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo.css" type="text/css">
    <title>Document</title>
</head>
<body>
<h2 style="text-align:center"><?php echo $msj ?></h2>
</h2>
<fieldset>
    <legend>Borrar y crear ficheros</legend>
    <form action="index.php" method="post">
        <label for="fichero">Nombre del fichero
        </label>
        <select name="fichero" id="fichero">
            <option value=null>Selecciona un fichero para borrar</option>
            <?php
            if (isset($ficheros)) {
                foreach ($ficheros as $valor_fichero) {
                    //quitamos los ficheros que empiecen por .
                    //serían los ficheros ocultos y el . y ..
                    if (strpos($valor_fichero, ".") !== 0) {
                        //Esta variable $check es para que se quede seleccionado
                        //el último fichero que seleccionamos
                        $check = null;
                        if ($valor_fichero == $fichero)
                            $check = "selected";
                        echo "<option $check value='$valor_fichero'>$valor_fichero </option>\n";
                    }

                }
            }
            ?>
        </select>
        <br />
        <ol>
            <li><span class="resaltado">crear 20 ficheros</span> <ul><li>Creará 20 ficheros vacíos con nombres aleatorios en una subcarpeta del proyecto llamada ficheros</li></ul>
            <li><span class="resaltado">Borrar ficheros</span> <ul><li>borrará todos los ficheros del directorio ficheros</li></ul>
            <li><span class="resaltado">elimnia fichero seleccionado</span><ul><li> borrará el fichero de la lista que se haya seleccionado.</li></ul>
        </ol>
        <input type="submit" value="borrar ficheros" name="submit">
        <input type="submit" value="crear 20 ficheros" name="submit">
        <input type="submit" value="elimina fichero seleccionado" name="submit">
    </form>
</fieldset>
</body>
</html>
