<?php
$msj=null;
if (isset($_POST['submit'])){
    $origen = "./ficheros/".filter_input(INPUT_POST, 'origen');
    $destino = "./ficheros/".filter_input(INPUT_POST, 'destino');
    if (rename($origen, $destino))
        $msj="Se ha movido <span class=resaltado>$origen</span> a <span class=resaltado>$destino</span>";
    else
        $msj="No se ha podido mover<span class=resaltado>$origen</span> a <span class=resaltado>$destino</span>";
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
    <legend>mover o renombrar ficheros</legend>
    <form action="index.php" method="post">
        <label for="fichero">Nombre del fichero original
        </label>
        <select name="origen" id="fichero">
            <option value=null>Selecciona un fichero para mover</option>
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

        <label for="fichero">Nombre del fichero destino
        </label>

        <input type="text" name="destino" id=""><br />
        <input type="submit" value="copiar" name="submit">
            <fieldset class="in"><legend>Listado de ficheros Actuales</legend>
            <?php
            echo "<ol>";
            foreach ($ficheros as $fichero) {
                echo "<li>$fichero</li>";
            }
            echo "</ol>"
            ?>
            </fieldset>

    </form>
</fieldset>
</body>
</html>
