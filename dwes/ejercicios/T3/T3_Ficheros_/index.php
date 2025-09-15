<?php


//Leo todo el contenido con la función file_get_contents
//No necesito puntero del fichero solo su nombre
$contenido_get_file_content = file_get_contents("nombres.txt");

//Leo todo el contenido con la función file
//No necesito puntero del fichero solo su nombre
//Me retorna un array con todas las líenas
$contenido_file = file_get_contents("nombres.txt");

//Obtenemos una referencia al fichero en modo de lectura
$file = fopen("nombres.txt", "r");

//Mientras pueda extraer un carácter del fichero ,
//Es decir hasta que no llege al final
$cont = 0;
while ($caracter = fgetc($file)) {
    //Concateno en la variable una línea por caracter
    $contenido_fgetc .= "Carácter $cont = $caracter <br />";
    $cont++;
}

//Podríamos reubicar la cabeza lectora con fseek, pero lo volvemos a cerrar y abrir

fclose($file);
$file = fopen("nombres.txt", "r");

//Extreamos línea a línea
//Obtenemos una referencia al fichero en modo de lectura

//En este caso en lugar de cerrar y abrir reubicamos la cabeza lectora al principio del fichero
fseek($file,0);

$cont = 0;
while ($linea= fgetss($file)) {
    //Concateno en la variable una línea por caracter
    $cont=$cont+1;
    $contenido_fgetss .= "Línea $cont = $linea<br />";

}
//En este caso en lugar de cerrar y abrir reubicamos la cabeza lectora al principio del fichero
fseek($file,0);

//Extreamos línea a línea
$cont = 0;
while ($linea = fgets($file)) {
    //Concateno en la variable una línea por caracter
    $contenido_fgets .= "Línea $cont = $linea<br />";
    $cont++;
}

//Extraemos los primeros 100 caracteres con freads

fclose($file);
$file = fopen("nombres.txt", "r");
$contenido_fread_100 = fread($file, 100);

//En este caso en lugar de cerrar y abrir reubicamos la cabeza lectora al principio del fichero
fseek($file,0);
$leng = filesize("nombres.txt");
$contenido_fread_all = fread($file, $leng);


?>

<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="estilo.css" type="text/css">
</head>
<body>
<div class="bloque_texto">
<h2 class="texto">Visualizando con la función file_get_contents</h2>
<?php echo $contenido_get_file_content ?>
<hr />
<h3>Si queremos perservar los saltos de línea podemos poner &ltpre&gt</h3>
<?php echo "<pre>$contenido_get_file_content </pre>" ?>
</div>
<div class="bloque_texto">
<h2 class="texto">Visualizando con la función file</h2>
<h4>Como es un arrayLo mostraremos con la función var_dump()</h4>
    <?php var_dump($contenido_file) ?>
</div>

<div class="bloque_texto">

    <h2 class="texto">Visualizando con la fgetc(), mostrando una línea por carácter</h2>
<?php echo "$contenido_fgetc" ?>
</div>
<div class="bloque_texto">

    <h2 class="texto">Visualizando con la fgetss(), mostrando una línea por fila</h2>
<?php echo "$contenido_fgetss" ?>
</div>
<div class="bloque_texto">

    <h2 class="texto">Visualizando con la fgets(), mostrando una línea por fila</h2>
<?php echo "$contenido_fgets" ?>
</div>
<div class="bloque_texto">

    <h2 class="texto">Visualizando con la fread(), leyendo 100 bytes</h2>
<?php echo "$contenido_fread_100" ?>
</div>
<div class="bloque_texto">

    <h2 class="texto">Visualizando con la fread(), leyendo todo el fichero </h2>
<?php echo "$contenido_fread_all" ?>
</div>


</form>
</body>
</html>

