<?php

$directorio = $_POST['dir']?? "./";
$ficheros = scandir($directorio);
var_dump($directorio);

$fichero=null;
if (isset($_POST['fichero'])) {

    $fichero = $_POST['fichero'];
    $f = fopen("$dir/$fichero", "r");
    fseek($f,0);
    while (!feof($f)) {
        $linea =fgets($f);
        $texto .=$linea;
    }
}
var_dump($fichero);

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
    <legend>Leer fichero</legend>
    <form action="index.php" method="post">
        <select name="dir" >
            <option value="./../T3_Ficheros_escribir/ficheros">Ficheros ejercicio escribir</option>;
            <option selected value="./">Directorio actual</option>;
        </select>

        <label for="fichero">Nombre del fichero
        </label>
        <select name="fichero" id="fichero">
            <?php if (isset($ficheros))
                foreach ($ficheros as $valor_fichero)
                    echo "<option value='$valor_fichero'>$valor_fichero </option>";
            ?>
        </select>
        <?php if (isset ($texto)): ?>
            <label for="contendio">
                Contenido del fichero <span style="color:red; font-size:1.4em"><?php echo "$dir/$fichero" ?></label><br/>
            <textarea name="contenido" id="contenido" cols="30" rows="10">
        <?php echo htmlspecialchars($texto); ?>

    </textarea>
            <hr/>
        <?php endif; ?>

        <input type="submit" value="leer" name="submit">
    </form>
</fieldset>
</body>
</html>