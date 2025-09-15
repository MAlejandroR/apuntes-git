<?php
//Leo el directorio, por defecto asigno el actual
//He creado un directorio llamado ficheros que contiene
//Observa esta estructura, solo la puedes usar a partir de php_ 7.0
$dir = $_POST['dir'] ?? "./ficheros";
$check1 = ($dir == "./../T3_Ficheros_escribir") ? "selected" : null;
$check2 = $dir == "./ficheros" ? "selected" : null;

//Siempre leo ficheros, ya que $dir tiene un valor por defecto
$ficheros = scandir($dir);


/*
 * Si quieres ver los valores gernerados ,descomenta estas líneas
echo "<h1>Directorio</h1>";
var_dump($dir);
echo "<h1>check1 (t3_ficheros...</h1>";
var_dump($check1);
echo "<h1>check2 ./ficheros</h1>";
var_dump($check2);
echo "<h1>ficheros -./ficheros</h1>";
var_dump($ficheros);
*/


//Si hemos dado a leer, lo intentamos
if (($_POST['submit'] == 'leer')) {
    //Leemos el nombre del fichero
    $fichero = $_POST['fichero'];
    //Verificamos que existe, por si acaso hemos seleccionado la primera opición
    if (file_exists("$dir/$fichero")) {
        $msj = "Contenido de <span style='color:darkblue'>$dir/$fichero</span>";
        //Leemos el fichero, lo abrimos en modo lectura y leemos línea a línea
        $f = fopen("$dir/$fichero", "r");

        //Leemos con gets según especifica en el enunciado
        while ($linea = fgets($f)) {
            $texto .= $linea;
        }
        /*Alternarivamente podríamos haber hecho
                  while (!feof($f)) {
                         $linea = fgets($f);
                         $texto .= $linea;
                  }
        */
    } else
        $msj = "No existe el fichero <span style='color:red'>$dir/$fichero</span> selecciona otro";
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
<h2 style="text-align:center"><?php echo $msj ?></h2>
</h2>
<fieldset>
    <legend>Leer fichero</legend>

    <form action="index.php" method="post">
        <select name="dir">
            <option <?php echo $check1 ?> value="./../T3_Ficheros_escribir/ficheros">Ficheros ejercicio escribir
            </option>
            <option <?php echo $check2 ?> value="./ficheros">Directorio actual</option>
        </select>

        <label for="fichero">Nombre del fichero
        </label>
        <select name="fichero" id="fichero">
            <option value=null>Selecciona un fichero</option>
            <?php
            echo "visualizando ficheros <br />";
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
        <?php if (isset ($texto)): ?>
            <label for="contendio">
                Contenido del fichero <span style="color:red; font-size:1.4em"><?php echo "$dir/$fichero" ?></span></label>
            <br/>
            <textarea name="contenido" id="contenido" cols="30" rows="10">
        <?php echo htmlspecialchars($texto); ?>

    </textarea>
        <?php endif; ?>
        <hr/>
        <input type="submit" value="leer" name="submit">
        <input type="submit" value="Actualizar directorio" name="submit">
    </form>
</fieldset>
</body>
</html>